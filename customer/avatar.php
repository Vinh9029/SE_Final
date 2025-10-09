<?php
include_once __DIR__ . "/../config.php";

$user_id = $_SESSION['user_id'];
$uploaded_path = "./Photos/upload_avatar/{$user_id}.png";
if (file_exists($uploaded_path)) {
    $avatar_src = $uploaded_path;
} else {
    $random = rand(1, 12);
    $avatar_src = "../customer/Photos/avatar/avatar{$random}.jpg";
}

// Fetch loyalty points
$stmt = $conn->prepare("SELECT SUM(points) AS total_points FROM loyalty_points WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_points);
$stmt->fetch();
$stmt->close();
$total_points = $total_points ?? 0;

// Determine user level based on points
if ($total_points >= 1000) {
    $level = 'Diamond';
    $level_icon = '💎';
    $border_color = 'border-blue-500';
} elseif ($total_points >= 600) {
    $level = 'Platinum';
    $level_icon = '✨';
    $border_color = 'border-white';
} elseif ($total_points >= 300) {
    $level = 'Gold';
    $level_icon = '🟡';
    $border_color = 'border-yellow-400';
} elseif ($total_points >= 100) {
    $level = 'Silver';
    $level_icon = '⚪';
    $border_color = 'border-gray-400';
} else {
    $level = 'Bronze';
    $level_icon = '🟤';
    $border_color = 'border-yellow-800';
}

// Calculate points needed for next level and next level name
if ($total_points < 100) {
    $next_level = 'Silver';
    $points_to_next = 100 - $total_points;
} elseif ($total_points < 300) {
    $next_level = 'Gold';
    $points_to_next = 300 - $total_points;
} elseif ($total_points < 600) {
    $next_level = 'Platinum';
    $points_to_next = 600 - $total_points;
} elseif ($total_points < 1000) {
    $next_level = 'Diamond';
    $points_to_next = 1000 - $total_points;
} else {
    $next_level = null;
    $points_to_next = 0;
}

// Calculate progress (assume max 5000 for full bar)
$progress = min(($total_points / 5000) * 100, 100);
?>
<div class="mb-4 flex flex-col items-center">
  <div class="relative w-36 h-36 rounded-full border-8 <?php echo $border_color; ?> shadow-lg overflow-hidden">
    <img src="<?php echo $avatar_src; ?>" alt="Avatar" class="w-full h-full object-cover rounded-full" />
    <div class="absolute top-1 right-1 text-2xl"><?php echo $level_icon; ?></div>
  </div>
  <div class="mt-2 text-center">
    <div class="font-bold text-lg"><?php echo htmlspecialchars($level); ?> Level <?php echo $level_icon; ?></div>
    <div class="text-yellow-500 font-semibold"><?php echo $total_points; ?> ⭐ Điểm tích lũy</div>
  </div>
  <?php if ($next_level): ?>
  <div class="w-full max-w-xs mt-3">
    <div class="text-sm mb-1 font-semibold text-gray-700">
      Còn <?php echo $points_to_next; ?> điểm để lên <?php echo $next_level; ?>!
    </div>
    <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
      <div class="h-3 bg-yellow-400 rounded-full transition-all" style="width: <?php echo $progress; ?>%"></div>
    </div>
  </div>
  <?php endif; ?>
</div>
