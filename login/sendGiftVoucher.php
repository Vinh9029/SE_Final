<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendGiftVoucher($to, $username) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_gmail@gmail.com'; // Thay bằng Gmail của bạn
        $mail->Password   = 'your_app_password';    // Thay bằng App password Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('your_gmail@gmail.com', 'Old Favour Coffee');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = 'Chúc mừng đăng ký thành công - Nhận ngay voucher 20%!';
        $mail->Body    = "<div style='font-family:Segoe UI,Arial,sans-serif;padding:24px;background:#fff;border-radius:12px;'>"
            . "<h2 style='color:#fc466b;'>Chào mừng bạn, $username!</h2>"
            . "<p>Cảm ơn bạn đã đăng ký tài khoản tại <b>Old Favour Coffee</b>.</p>"
            . "<div style='margin:18px 0;padding:18px;background:#ffe4e6;border-radius:8px;text-align:center;'>"
            . "<span style='font-size:1.3rem;color:#d97706;font-weight:bold;'>Voucher giảm giá 20%</span><br>"
            . "<span style='font-size:1.1rem;color:#fc466b;'>Mã: <b>WELCOME20</b></span><br>"
            . "<span style='color:#555;'>Áp dụng cho đơn hàng đầu tiên tại cửa hàng hoặc website.</span>"
            . "</div>"
            . "<p>Chúc bạn có trải nghiệm tuyệt vời cùng chúng tôi!</p>"
            . "<hr style='margin:18px 0;border:none;border-top:1px solid #eee;'>"
            . "<small style='color:#888;'>Nếu bạn có bất kỳ thắc mắc nào, hãy liên hệ với chúng tôi qua email hoặc hotline.</small>"
            . "</div>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Ví dụ sử dụng:
// sendGiftVoucher('user_email@gmail.com', 'Tên người dùng');
?>
