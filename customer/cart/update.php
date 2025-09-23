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

$data = json_decode(file_get_contents('php://input'), true);
$product_id = isset($data['product_id']) ? (int)$data['product_id'] : 0;
$quantity = isset($data['quantity']) ? (int)$data['quantity'] : 0;

if ($product_id <= 0 || $quantity < 0) {
    echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
    exit();
}

try {
    // Kết nối database
    require_once '../../includes/config/database.php';

    $user_id = $_SESSION['user_id'];

    if ($quantity == 0) {
        // Xóa sản phẩm khỏi giỏ hàng
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Đã xóa sản phẩm khỏi giỏ hàng']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng']);
        }
    } else {
        // Kiểm tra sản phẩm có tồn tại và đủ số lượng không
        $stmt = $conn->prepare("SELECT stock FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $product = $stmt->get_result()->fetch_assoc();

        if (!$product) {
            echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
            exit();
        }

        if ($product['stock'] < $quantity) {
            echo json_encode(['success' => false, 'message' => 'Sản phẩm không đủ số lượng trong kho']);
            exit();
        }

        // Cập nhật số lượng
        $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("iii", $quantity, $user_id, $product_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Đã cập nhật số lượng sản phẩm']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng']);
        }
    }

    // Lấy tổng số lượng sản phẩm trong giỏ hàng
    $stmt = $conn->prepare("SELECT SUM(quantity) as total FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_total = $stmt->get_result()->fetch_assoc()['total'] ?? 0;

    echo json_encode([
        'success' => true,
        'cart_total' => $cart_total
    ]);

} catch (Exception $e) {
    // Fallback to session if database not available
    if ($quantity == 0) {
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
            $_SESSION['cart_total'] = array_sum($_SESSION['cart']);
            echo json_encode([
                'success' => true,
                'message' => 'Đã xóa sản phẩm khỏi giỏ hàng',
                'cart_total' => array_sum($_SESSION['cart'])
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng']);
        }
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
        $_SESSION['cart_total'] = array_sum($_SESSION['cart']);
        echo json_encode([
            'success' => true,
            'message' => 'Đã cập nhật số lượng sản phẩm',
            'cart_total' => array_sum($_SESSION['cart'])
        ]);
    }
}
?>
