<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ']);
    exit();
}

// Validate required fields
$required_fields = ['full_name', 'phone', 'email', 'address', 'city', 'district', 'payment_method'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin']);
        exit();
    }
}

try {
    require_once '../../includes/config/database.php';
    require_once '../../includes/config/vnpay_config.php';

    $user_id = $_SESSION['user_id'];
    $payment_method = $_POST['payment_method'];

    // Lấy thông tin giỏ hàng
    $cart_items = [];
    $total = 0;

    $stmt = $conn->prepare("SELECT c.*, p.name, p.price, p.stock FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
        $total += $row['price'] * $row['quantity'];
    }

    if (empty($cart_items)) {
        echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống']);
        exit();
    }

    // Kiểm tra tồn kho
    foreach ($cart_items as $item) {
        if ($item['stock'] < $item['quantity']) {
            echo json_encode(['success' => false, 'message' => 'Sản phẩm "' . $item['name'] . '" không đủ số lượng trong kho']);
            exit();
        }
    }

    // Tạo đơn hàng
    $conn->begin_transaction();

    try {
        // Insert order
        $stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount, payment_method, payment_status, order_status, shipping_address, customer_info) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $payment_status = $payment_method === 'cash' ? 'pending' : 'pending';
        $order_status = 'pending';
        $shipping_address = $_POST['address'] . ', ' . $_POST['district'] . ', ' . $_POST['city'];
        $customer_info = json_encode([
            'name' => $_POST['full_name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'notes' => $_POST['notes'] ?? ''
        ]);

        $stmt->bind_param("idsssss", $user_id, $total, $payment_method, $payment_status, $order_status, $shipping_address, $customer_info);
        $stmt->execute();
        $order_id = $conn->insert_id;

        // Insert order items
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cart_items as $item) {
            $stmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
            $stmt->execute();

            // Update product stock
            $update_stmt = $conn->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
            $update_stmt->bind_param("ii", $item['quantity'], $item['product_id']);
            $update_stmt->execute();
        }

        // Clear cart
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $conn->commit();

        // Handle different payment methods
        if ($payment_method === 'vnpay') {
            // Create VNPay payment URL
            $vnpay_url = createVNPayPayment($order_id, $total);

            echo json_encode([
                'success' => true,
                'message' => 'Chuyển hướng đến VNPay',
                'payment_url' => $vnpay_url
            ]);
        } else {
            // Cash payment - send confirmation email or notification
            echo json_encode([
                'success' => true,
                'message' => 'Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng.',
                'order_id' => $order_id
            ]);
        }

    } catch (Exception $e) {
        $conn->rollback();
        throw $e;
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
}

// VNPay payment function
function createVNPayPayment($order_id, $amount) {
    $vnp_TmnCode = VNP_TMN_CODE;
    $vnp_HashSecret = VNP_HASH_SECRET;
    $vnp_Url = VNP_URL;
    $vnp_Returnurl = VNP_RETURN_URL;

    $vnp_TxnRef = $order_id;
    $vnp_OrderInfo = "Thanh toan don hang #" . $order_id;
    $vnp_OrderType = "billpayment";
    $vnp_Amount = $amount * 100; // VNPay uses smallest currency unit
    $vnp_Locale = "vn";
    $vnp_BankCode = "";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    return $vnp_Url;
}
?>
