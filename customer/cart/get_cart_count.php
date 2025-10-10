<?php
session_start();
header('Content-Type: application/json');
$count = 0;
if (isset($_SESSION['user_id'])) {
    include_once __DIR__ . '/../../database/db_connection.php';
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT SUM(quantity) AS total FROM cart_items WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $count = $result['total'] ?? 0;
}
echo json_encode(['count' => (int)$count]);
?>
