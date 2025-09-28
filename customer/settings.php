<?php
session_start();
include_once __DIR__ . '/../database/db_connection.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$message = '';
$message_type = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'] ?? '';
    $new_email = trim($_POST['new_email'] ?? '');
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Fetch current hash
    $stmt = $conn->prepare("SELECT password, email FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hash, $current_email);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($current_password, $hash)) {
        $message = 'Mật khẩu hiện tại không đúng.';
        $message_type = 'error';
    } else {
        $updated = false;
        if (!empty($new_email)) {
            // Change email
            if ($new_email === $current_email) {
                $message = 'Email mới giống email hiện tại.';
                $message_type = 'error';
            } else {
                // Check uniqueness
                $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
                $stmt->bind_param("s", $new_email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $message = 'Email đã được sử dụng.';
                    $message_type = 'error';
                } else {
                    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE user_id = ?");
                    $stmt->bind_param("si", $new_email, $user_id);
                    if ($stmt->execute()) {
                        $message = 'Cập nhật email thành công!';
                        $message_type = 'success';
                        $updated = true;
                    } else {
                        $message = 'Có lỗi khi cập nhật email.';
                        $message_type = 'error';
                    }
                }
                $stmt->close();
            }
        }
        if (!empty($new_password)) {
            // Change password
            if ($new_password !== $confirm_password) {
                $message = 'Mật khẩu mới và xác nhận không khớp.';
                $message_type = 'error';
            } elseif (strlen($new_password) < 8) {
                $message = 'Mật khẩu mới phải ít nhất 8 ký tự.';
                $message_type = 'error';
            } elseif (!preg_match('/[A-Z]/', $new_password)) {
                $message = 'Mật khẩu mới phải chứa ít nhất một chữ hoa.';
                $message_type = 'error';
            } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $new_password)) {
                $message = 'Mật khẩu mới phải chứa ít nhất một ký tự đặc biệt.';
                $message_type = 'error';
            } else {
                $new_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                $stmt->bind_param("si", $new_hash, $user_id);
                if ($stmt->execute()) {
                    if ($updated) {
                        $message .= ' Và cập nhật mật khẩu thành công!';
                    } else {
                        $message = 'Cập nhật mật khẩu thành công!';
                        $message_type = 'success';
                    }
                } else {
                    $message = 'Có lỗi khi cập nhật mật khẩu.';
                    $message_type = 'error';
                }
                $stmt->close();
            }
        }
        if (empty($new_email) && empty($new_password)) {
            $message = 'Vui lòng nhập thông tin cần thay đổi.';
            $message_type = 'error';
        }
    }
}
?>
<div class="bg-yellow-50 rounded-3xl shadow-xl p-8 max-w-2xl mx-auto">
  <div class="font-bold text-2xl text-yellow-600 mb-4 flex items-center gap-2"><i class="fa fa-cog text-yellow-500"></i> Cài đặt tài khoản</div>
  <?php if ($message): ?>
    <div class="mb-4 p-4 rounded-xl <?php echo $message_type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
      <?php echo htmlspecialchars($message); ?>
    </div>
  <?php endif; ?>
  <form method="post" class="flex flex-col gap-6">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Email mới (để trống nếu không đổi)</label>
      <input type="email" name="new_email" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200" placeholder="Nhập email mới" />
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Mật khẩu hiện tại</label>
      <input type="password" name="current_password" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200" placeholder="Nhập mật khẩu hiện tại" required />
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Mật khẩu mới (để trống nếu không đổi)</label>
      <input type="password" name="new_password" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200" placeholder="Nhập mật khẩu mới" />
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Xác nhận mật khẩu mới</label>
      <input type="password" name="confirm_password" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200" placeholder="Xác nhận mật khẩu mới" />
    </div>
    <button type="submit" class="btn-orange hover:bg-orange-600 text-white px-8 py-3 rounded-xl font-bold shadow transition w-fit">Lưu thay đổi</button>
  </form>
</div>
