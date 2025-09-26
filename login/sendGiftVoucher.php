<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendGiftVoucher($email, $username) {
    $voucherCode = 'WELCOME-' . strtoupper(substr(md5($email . time()), 0, 8));
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bearastrikingresemblance@gmail.com';
        $mail->Password   = 'umqa zhvh tqzk kduq';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('bearastrikingresemblance@gmail.com', 'Old Favour Coffee');
        $mail->addAddress($email);
        #Fix Vietnamese characters issue
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->isHTML(true);
        $mail->Subject = '🎁 Chào mừng bạn đến với The Old Favour Coffee!';
        $mail->Body = "<div style='font-family:Segoe UI,Arial,sans-serif;padding:24px;background:#f9fafb;border-radius:12px;max-width:600px;margin:auto;border:1px solid #eee;'>"
            . "<div style='text-align:center;margin-bottom:20px;'>"
            . "<img src='/photos/banner.jpg' alt='Old Favour Coffee' style='width:80px;margin-bottom:10px;'>"
            . "<h2 style='color:#fc466b;margin:0;'>Chào mừng $username!</h2>"
            . "<p style='color:#555;margin:6px 0;'>Cảm ơn bạn đã đăng ký tài khoản tại Old Favour Coffee.</p>"
            . "</div>"
            . "<div style='margin:20px auto;padding:20px;background:#e0ffe0;border:2px dashed #4ade80;border-radius:10px;text-align:center;max-width:300px;'>"
            . "<span style='font-size:1.3rem;color:#16a34a;font-weight:bold;letter-spacing:2px;'>Mã voucher: $voucherCode</span>"
            . "<div style='margin-top:8px;color:#555;font-size:0.95rem;'>Giảm 10% cho đơn hàng đầu tiên!</div>"
            . "</div>"
            . "<p style='color:#333;text-align:center;margin-top:20px;font-size:0.95rem;'>Hãy sử dụng mã này khi thanh toán để nhận ưu đãi.</p>"
            . "<hr style='margin:24px 0;border:none;border-top:1px solid #eee;'>"
            . "<small style='color:#888;display:block;text-align:center;line-height:1.6;'>Đây là email tự động từ hệ thống <b>The Old Favour Coffee</b>. Nếu bạn không đăng ký tài khoản, vui lòng bỏ qua email này.</small>"
            . "</div>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
