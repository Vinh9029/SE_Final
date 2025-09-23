<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
    exit();
}

$order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

if ($order_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Mã đơn hàng không hợp lệ']);
    exit();
}

try {
    require_once '../../../includes/config/database.php';

    // Kiểm tra quyền truy cập đơn hàng
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $order_id, $_SESSION['user_id']);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();

    if (!$order) {
        echo json_encode(['success' => false, 'message' => 'Không tìm thấy đơn hàng']);
        exit();
    }

    // Kiểm tra trạng thái thanh toán
    if ($order['payment_status'] === 'completed' || $order['payment_status'] === 'paid') {
        // Cập nhật trạng thái đơn hàng
        $update_stmt = $conn->prepare("UPDATE orders SET order_status = 'confirmed', updated_at = NOW() WHERE id = ?");
        $update_stmt->bind_param("i", $order_id);
        $update_stmt->execute();

        echo json_encode([
            'success' => true,
            'message' => 'Thanh toán thành công',
            'order_status' => 'confirmed'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Thanh toán chưa hoàn thành',
            'order_status' => $order['order_status']
        ]);
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
}
?>
