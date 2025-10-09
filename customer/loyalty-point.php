<?php
// Removed session_start() to avoid "session already active" notice
include_once __DIR__ . '/../database/db_connection.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index.php');
    exit;
}

// Fetch loyalty points
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT SUM(points) AS total_points FROM loyalty_points WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_points);
$stmt->fetch();
$stmt->close();
$total_points = $total_points ?? 0;

// Calculate progress (assume max 5000 for full bar)
$progress = min(($total_points / 5000) * 100, 100);
?>
<div class="w-full mb-2">
  <div class="flex justify-between items-center text-sm font-bold mb-1">
    <span>Điểm tích lũy</span>
    <span class="text-yellow-500"><?php echo $total_points; ?> ⭐</span>
  </div>
  <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
    <div class="h-3 bg-yellow-400 rounded-full transition-all animate-pulse" style="width: <?php echo $progress; ?>%"></div>
  </div>
</div>
