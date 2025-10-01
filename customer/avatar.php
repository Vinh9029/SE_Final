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
?>
<div class="relative mb-4">
  <img src="<?php echo $avatar_src; ?>" alt="Avatar" class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-yellow-400 ring-4 ring-pink-200 transition duration-300 hover:ring-yellow-400" />
</div>
