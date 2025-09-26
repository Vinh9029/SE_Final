<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once __DIR__ . '/../database/db_connection.php';
include_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendOtpMail($to, $otp) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_gmail@gmail.com'; // Thay bằng Gmail của bạn
        $mail->Password   = 'your_app_password';    // Thay bằng App password Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('your_gmail@gmail.com', 'Coffee Shop');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = 'Mã OTP xác thực';
        $mail->Body    = "Mã OTP của bạn là: <b>$otp</b>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

$reset_error = '';
$reset_success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $otp = rand(100000, 999999);
        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_otp'] = $otp;
        if (sendOtpMail($email, $otp)) {
            $reset_success = "<div style='display:flex;flex-direction:column;align-items:center;gap:10px;'>"
                . "<i class='fa-solid fa-circle-check' style='font-size:2.2rem;color:#4ade80;'></i>"
                . "<span style='font-weight:600;color:#16a34a;'>Mã OTP đã được gửi đến email của bạn!</span>"
                . "<span style='color:#555;'>Vui lòng kiểm tra hộp thư và nhập mã OTP để tiếp tục.</span>"
                . "</div>";
        } else {
            $reset_error = "<div style='display:flex;flex-direction:column;align-items:center;gap:10px;'>"
                . "<i class='fa-solid fa-triangle-exclamation' style='font-size:2.2rem;color:#fc466b;'></i>"
                . "<span style='font-weight:600;color:#fc466b;'>Gửi email thất bại!</span>"
                . "<span style='color:#555;'>Vui lòng thử lại hoặc kiểm tra kết nối.</span>"
                . "</div>";
        }
    } else {
        $reset_error = "Email không tồn tại trong hệ thống.";
    }
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['otp'])) {
    $otp = trim($_POST['otp']);
    if (isset($_SESSION['reset_otp']) && $otp == $_SESSION['reset_otp']) {
        $_SESSION['otp_verified'] = true;
        echo '<div id="successModal" style="position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.3);display:flex;align-items:center;justify-content:center;z-index:9999;">
                <div style="background:#fff;border-radius:16px;padding:32px 24px;box-shadow:0 8px 32px 0 rgba(31,38,135,0.18);display:flex;flex-direction:column;align-items:center;">
                    <i class="fa-solid fa-circle-check" style="font-size:3rem;color:#4ade80;margin-bottom:12px;"></i>
                    <div style="font-size:1.2rem;font-weight:600;color:#16a34a;margin-bottom:8px;">Xác thực OTP thành công!</div>
                    <div style="color:#555;margin-bottom:18px;">Đang chuyển hướng đến đổi mật khẩu...</div>
                    <div class="loader" style="width:40px;height:40px;border:4px solid #f3f3f3;border-top:4px solid #fc466b;border-radius:50%;animation:spin 1s linear infinite;"></div>
                </div>
            </div>
            <style>@keyframes spin{0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}</style>';
        echo '<script>setTimeout(function(){window.location.href="updatePassword.php";}, 1800);</script>';
        exit;
    } else {
        $reset_error = "Mã OTP không đúng hoặc đã hết hạn.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Coffee Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            background: url('../Photos/login_background.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
        }

        .reset-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.32);
            padding: 40px 32px 32px 32px;
            width: 350px;
            max-width: 95vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .reset-header {
            color: #fc466b;
            margin-bottom: 18px;
            font-size: 2rem;
            font-weight: 600;
        }

        .profile-icon {
            font-size: 3rem;
            color: #fc466b;
            margin-bottom: 2px;
        }

        .input-group {
            width: 100%;
            margin-bottom: 18px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #fc466b;
            font-size: 1.2rem;
            z-index: 2;
        }

        .input-group input {
            width: 100%;
            padding: 12px 12px 12px 44px;
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.25);
            color: #222;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
        }

        .input-group input::placeholder {
            color: #888;
        }

        .reset-btn {
            width: 100%;
            background: #fc466b;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }

        .reset-btn:hover {
            background: #3f5efb;
        }

        .back-link {
            margin-top: 16px;
            text-align: center;
            color: #fff;
            font-size: 1rem;
        }

        .back-link a {
            color: #fc466b;
            text-decoration: underline;
            margin-left: 6px;
            cursor: pointer;
            transition: color 0.2s;
        }

        .back-link a:hover {
            color: #3f5efb;
        }
    </style>
</head>

<body>
    <div style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
        <div class="reset-container">
            <div class="profile-icon" style="cursor:pointer;" onclick="window.location.href='<?php echo $base_url; ?>/login/index.php'">
                <img src="../Photos/logo.png" alt="Logo" style="width:210px; height:100px; object-fit:cover;" />
            </div>
            <div class="reset-header">Reset Password</div>
            <form method="post" autocomplete="off">
                <div class="input-group">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <button type="submit" class="reset-btn">Gửi mã OTP</button>
                <?php if ($reset_error): ?>
                    <div class="error-message show"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($reset_error); ?></div>
                <?php endif; ?>
                <?php if ($reset_success): ?>
                    <div class="success-message show"><i class="fa-solid fa-circle-check"></i> <?php echo htmlspecialchars($reset_success); ?></div>
                    <div class="input-group" style="margin-top:18px;">
                        <i class="fa-solid fa-key"></i>
                        <input type="text" name="otp" placeholder="Nhập mã OTP" maxlength="6" required>
                    </div>
                    <button type="submit" class="reset-btn">Xác thực OTP</button>
                <?php endif; ?>
            </form>
            <div class="back-link">
                <span>Remembered your password?</span>
                <a href="<?php echo $base_url; ?>/login/index.php">Login</a>
            </div>
        </div>
    </div>
</body>

</html>