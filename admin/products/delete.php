<?php
include_once '../../database/db_connection.php';

// Create logs directory if not exists
$logDir = '../../logs/';
if (!file_exists($logDir)) {
    mkdir($logDir, 0777, true);
}

$product = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $conn->prepare("SELECT name, image FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
    if (!$product) {
        header('Location: list.php?error=invalid');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $product) {
    $id = (int)$_GET['id'];
    // Delete image file if exists
    if ($product['image'] && file_exists('../../' . $product['image'])) {
        if (!unlink('../../' . $product['image'])) {
            $logMessage = date('Y-m-d H:i:s') . ' Image unlink error for product_id: ' . $id . ' | Image: ' . $product['image'] . PHP_EOL;
            file_put_contents('../../logs/crud_errors.log', $logMessage, FILE_APPEND | LOCK_EX);
        }
    }
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
        if ($isAjax) {
            echo json_encode(['success' => true, 'message' => 'Xóa sản phẩm thành công!', 'redirect' => 'products/list.php']);
            exit;
        } else {
            header('Location: list.php?success=deleted');
            exit;
        }
    } else {
        // Log error
        $logMessage = date('Y-m-d H:i:s') . ' Delete product error: ' . $conn->error . ' | product_id: ' . $id . PHP_EOL;
        file_put_contents('../../logs/crud_errors.log', $logMessage, FILE_APPEND | LOCK_EX);
        $error = "Lỗi xóa sản phẩm: " . $conn->error;
    }
    $stmt->close();
}

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
if ($isAjax && isset($error)) {
    echo json_encode(['success' => false, 'message' => $error]);
    exit;
}
?>
<div class="max-w-xl mx-auto py-20">
  <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center">
    <i class="fa fa-trash text-red-500 text-5xl mb-4 animate-bounce"></i>
    <?php if ($product): ?>
      <div class="font-bold text-xl text-gray-800 mb-2">Bạn có chắc muốn xóa sản phẩm "<span class="text-red-600"><?= htmlspecialchars($product['name']) ?></span>"?</div>
    <?php else: ?>
      <div class="font-bold text-xl text-gray-800 mb-2">Sản phẩm không tồn tại.</div>
    <?php endif; ?>
    <div class="text-gray-500 mb-6">Hành động này không thể hoàn tác.</div>
    <?php if (isset($error)): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>
    <?php if ($product): ?>
    <form method="post" class="w-full flex flex-col gap-4">
      <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl font-bold shadow transition mb-2 flex items-center gap-2"><i class="fa fa-trash"></i> Xác nhận xóa</button>
      <a href="#" data-page="products/list.php" class="text-pink-600 hover:underline font-semibold">Quay lại danh sách</a>
    </form>
    <?php endif; ?>
  </div>
</div>
<style>
  @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
  .animate-bounce { animation: bounce 0.7s infinite; }
</style>
