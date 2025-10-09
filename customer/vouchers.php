<?php
// vouchers.php - Hiển thị danh sách voucher của user
session_start();
include_once __DIR__ . '/../database/db_connection.php';
if (!isset($_SESSION['user_id'])) {
    echo '<div class="text-red-500">Bạn chưa đăng nhập.</div>';
    exit;
}
$user_id = $_SESSION['user_id'];
// Lấy danh sách voucher của user (chuẩn với bảng vouchers)
$sql = "SELECT code, discount_percent, is_used, created_at, expires_at FROM vouchers WHERE user_id = ? ORDER BY expires_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<div class="mb-6">
    <h2 class="text-2xl font-bold text-green-600 flex items-center gap-2 mb-4"><i class="fa fa-ticket-alt"></i> Voucher của tôi</h2>
    <?php if ($result->num_rows === 0): ?>
        <div class="text-gray-500 text-center py-8">Bạn chưa có voucher nào.</div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="bg-gradient-to-r from-green-50 to-yellow-50 rounded-2xl shadow p-6 flex flex-col gap-2 border border-green-200">
                    <div class="flex items-center gap-2">
                        <span class="text-lg font-bold text-green-700">Voucher</span>
                        <span class="ml-auto px-3 py-1 rounded-full text-xs font-semibold <?php echo ($row['is_used'] ? 'bg-gray-200 text-gray-500' : 'bg-green-200 text-green-700'); ?>">
                            <?php echo ($row['is_used'] ? 'Đã dùng' : (strtotime($row['expires_at']) < time() ? 'Hết hạn' : 'Còn hạn')); ?>
                        </span>
                    </div>
                    <div class="text-gray-700 text-sm">Mã: <span class="font-mono text-pink-600 text-base"><?php echo htmlspecialchars($row['code']); ?></span></div>
                    <div class="text-yellow-600 font-bold text-lg">Giảm <?php echo htmlspecialchars($row['discount_percent']); ?>%</div>
                    <div class="text-xs text-gray-500">HSD: <?php echo $row['expires_at'] ? date('d/m/Y', strtotime($row['expires_at'])) : 'Không giới hạn'; ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>