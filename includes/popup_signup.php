<!-- Popup Signup -->
<div class="popup show" id="signupPopup">
    <div class="bg-white rounded-xl p-8 max-w-md mx-4 text-center">
        <img src="/SE_Final-Cart-Checkout/Photos/10_discount.jpg" alt="Voucher 10%" class="mx-auto mb-4 rounded-lg shadow">
        <h3 class="text-2xl font-bold mb-4 text-4B2E05">Nhận Voucher 10%</h3>
        <p class="mb-4">Đăng ký tài khoản ngay để nhận ưu đãi lần đầu!</p>
        <a href="/SE_Final-Cart-Checkout/login/registerAccount.php" class="cta-button text-white px-6 py-3 rounded-full font-semibold w-full inline-block mb-2">Đăng Ký</a>
        <div class="flex justify-center">
            <button onclick="document.getElementById('signupPopup').classList.remove('show');" class="mt-4 text-gray-500 underline text-center">Đóng</button>
        </div>
    </div>
</div>
<?php
// Nếu muốn xử lý backend cho popup signup, hãy thêm code tại đây
?>
