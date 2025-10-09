<?php
include_once __DIR__ . "/../config.php";

$user_id = $_SESSION['user_id'];

// Lấy avatar từ trường avatar_image hoặc random/avatar upload
$stmt = $conn->prepare("SELECT avatar_image FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($avatar_image_db);
$stmt->fetch();
$stmt->close();

$avatar_src = '';
$frame_src = '';
if ($avatar_image_db && file_exists(__DIR__ . '/../' . $avatar_image_db)) {
    $avatar_src = '../' . $avatar_image_db;
} elseif (file_exists("./Photos/upload_avatar/{$user_id}.png")) {
    $avatar_src = "./Photos/upload_avatar/{$user_id}.png";
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

// Chọn frame theo level
switch ($level) {
    case 'Diamond':
        $frame_src = '../customer/Photos/frame/diamond.png';
        break;
    case 'Platinum':
        $frame_src = '../customer/Photos/frame/platinum.png';
        break;
    case 'Gold':
        $frame_src = '../customer/Photos/frame/gold.png';
        break;
    case 'Silver':
        $frame_src = '../customer/Photos/frame/silver.png';
        break;
    default:
        $frame_src = '../customer/Photos/frame/bronze.png';
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

// Progress bar tính theo từng mốc level
$level_points = [0, 100, 300, 600, 1000, 5000];
$level_index = 0;
for ($i = 0; $i < count($level_points) - 1; $i++) {
    if ($total_points >= $level_points[$i] && $total_points < $level_points[$i+1]) {
        $level_index = $i;
        break;
    }
    if ($total_points >= 1000) $level_index = 4;
}
$min = $level_points[$level_index];
$max = $level_points[$level_index+1];
$progress = min(100, max(0, (($total_points - $min) / ($max - $min)) * 100));
?>
<style>
  @layer utilities {
    .border-frame {
      border: 10px solid transparent;
      border-image: url('<?php echo $frame_src; ?>') 30 round;
    }
  }
</style>
<div class="mb-4 flex flex-col items-center">
  <div class="relative w-36 h-36 rounded-full border-8 shadow-lg overflow-hidden group">
    <img src="<?php echo $avatar_src; ?>" alt="Avatar" class="w-full h-full object-cover rounded-full border-frame" />
    <div class="absolute top-1 right-1 text-2xl"><?php echo $level_icon; ?></div>
    <form id="avatar-upload-form" enctype="multipart/form-data" method="post" class="absolute bottom-2 left-1/2 -translate-x-1/2 hidden group-hover:flex flex-col items-center z-10">
      <label class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-lg text-xs font-bold cursor-pointer flex items-center gap-1">
        <i class="fa fa-upload"></i> Upload image
        <input type="file" name="avatar_image" accept="image/*" class="hidden" onchange="this.form.submit()" />
      </label>
    </form>
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
      <div class="h-3 bg-gradient-to-r from-pink-400 to-yellow-400 rounded-full transition-all" style="width: <?php echo $progress; ?>%"></div>
    </div>
    <div class="flex justify-between text-xs text-gray-400 mt-1">
      <span><?php echo $min; ?> ⭐</span>
      <span><?php echo $max; ?> ⭐</span>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php
// Handle avatar upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar_image'])) {
    $file = $_FILES['avatar_image'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/Photos/upload_avatar/';
        if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $target = $upload_dir . $user_id . '.png';
        if (move_uploaded_file($file['tmp_name'], $target)) {
            // Lưu đường dẫn vào DB
            $avatar_path = 'customer/Photos/upload_avatar/' . $user_id . '.png';
            $stmt = $conn->prepare("UPDATE users SET avatar_image = ? WHERE user_id = ?");
            $stmt->bind_param("si", $avatar_path, $user_id);
            $stmt->execute();
            $stmt->close();
            echo '<script>window.location.reload();</script>';
        } else {
            echo '<div class="text-red-500 text-sm mt-2">Lỗi upload ảnh đại diện.</div>';
        }
    } else {
        echo '<div class="text-red-500 text-sm mt-2">Lỗi upload ảnh đại diện.</div>';
    }
}
?>
