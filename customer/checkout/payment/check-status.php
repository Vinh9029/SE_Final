<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
    exit();
}

$order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

if ($order_id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Mã đơn hàng không hợp lệ']);
    exit();
}

try {
    require_once '../../../includes/config/database.php';

    // Kiểm tra quyền truy cập đơn hàng
    $stmt = $conn->prepare("SELECT order_status, payment_status FROM orders WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $order_id, $_SESSION['user_id']);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();

    if (!$order) {
        echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy đơn hàng']);
        exit();
    }

    echo json_encode([
        'status' => $order['order_status'],
        'payment_status' => $order['payment_status']
    ]);

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
}
?>
