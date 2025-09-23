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

try {
    // Kết nối database
    require_once '../../includes/config/database.php';

    $user_id = $_SESSION['user_id'];

    // Xóa tất cả sản phẩm trong giỏ hàng
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode([
            'success' => true,
            'message' => 'Đã xóa tất cả sản phẩm khỏi giỏ hàng'
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'message' => 'Giỏ hàng đã trống'
        ]);
    }

} catch (Exception $e) {
    // Fallback to session if database not available
    $_SESSION['cart'] = [];
    $_SESSION['cart_total'] = 0;

    echo json_encode([
        'success' => true,
        'message' => 'Đã xóa tất cả sản phẩm khỏi giỏ hàng'
    ]);
}
?>
