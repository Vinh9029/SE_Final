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

include_once '../../database/db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$product_id = isset($data['product_id']) ? (int)$data['product_id'] : 0;
$quantity = isset($data['quantity']) ? (int)$data['quantity'] : 0;
$size_id = isset($data['size_id']) ? (int)$data['size_id'] : null;

if ($product_id <= 0 || $quantity < 0) {
    echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
    exit();
}

$user_id = $_SESSION['user_id'];

if ($quantity == 0) {
    // Xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE FROM cart_items WHERE user_id = ? AND product_id = ?" . ($size_id ? " AND size_id = ?" : "");
    $stmt = $conn->prepare($sql);
    if ($size_id) {
        $stmt->bind_param('iii', $user_id, $product_id, $size_id);
    } else {
        $stmt->bind_param('ii', $user_id, $product_id);
    }
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Đã xóa sản phẩm khỏi giỏ hàng']);
    exit();
} else {
    // Kiểm tra tồn kho nếu cần
    $sql = "SELECT product_id FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();

    if (!$product) {
        echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
        exit();
    }

    // Cập nhật số lượng
    $sql = "UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?" . ($size_id ? " AND size_id = ?" : "");
    $stmt = $conn->prepare($sql);
    if ($size_id) {
        $stmt->bind_param('iiii', $quantity, $user_id, $product_id, $size_id);
    } else {
        $stmt->bind_param('iii', $quantity, $user_id, $product_id);
    }
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Đã cập nhật số lượng']);
    exit();
}
?>
