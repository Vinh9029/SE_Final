<?php
session_start();
include_once __DIR__ . '/../../database/db_connection.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login/index.php');
    exit;
}
?>
<!-- cart-item.php - Demo danh sách sản phẩm giỏ hàng, dùng cho cả cart và checkout -->
<div class="cart-item cart-item-anim flex items-center gap-4 p-4 bg-gray-50 rounded-2xl"
    data-product-id="1">
    <div class="w-20 h-20 bg-white rounded-xl overflow-hidden shadow-md">
        <img src="../../Photos/test1.jpg" alt="Cà phê sữa đá"
            class="w-full h-full object-cover">
    </div>
    <div class="flex-1">
        <h3 class="font-bold text-lg text-gray-800">Cà phê sữa đá</h3>
        <p class="text-orange-600 font-bold text-xl">29,000đ</p>
        <!-- Ghi chú cho món -->
        <input type="text"
            class="note-input mt-2 w-full border border-gray-300 rounded px-2 py-1 text-sm"
            placeholder="Ghi chú cho món này (ví dụ: Ít đá, Không đường, Thêm sữa...)">
    </div>
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-2">
            <button
                class="quantity-btn bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors"><i
                    class="fas fa-minus text-sm"></i></button>
            <input type="number" value="2"
                class="quantity-input w-16 text-center border-2 border-gray-300 rounded-lg py-1"
                readonly>
            <button
                class="quantity-btn bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors"><i
                    class="fas fa-plus text-sm"></i></button>
        </div>
    </div>
    <div class="text-right">
        <p class="text-orange-600 font-bold text-lg subtotal" data-price="29000">58,000đ</p>
        <button class="remove-btn text-red-500 hover:text-red-700 mt-2"><i
                class="fas fa-trash mr-1"></i>Xóa</button>
    </div>
</div>
<div class="cart-item cart-item-anim flex items-center gap-4 p-4 bg-gray-50 rounded-2xl"
    data-product-id="2">
    <div class="w-20 h-20 bg-white rounded-xl overflow-hidden shadow-md">
        <img src="../../Photos/test2.jpg" alt="Bánh ngọt Pháp"
            class="w-full h-full object-cover">
    </div>
    <div class="flex-1">
        <h3 class="font-bold text-lg text-gray-800">Bánh ngọt Pháp</h3>
        <p class="text-orange-600 font-bold text-xl">35,000đ</p>
        <!-- Ghi chú cho món -->
        <input type="text"
            class="note-input mt-2 w-full border border-gray-300 rounded px-2 py-1 text-sm"
            placeholder="Ghi chú cho món này (ví dụ: Ít đá, Không đường, Thêm sữa...)">
    </div>
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-2">
            <button
                class="quantity-btn bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors"><i
                    class="fas fa-minus text-sm"></i></button>
            <input type="number" value="1"
                class="quantity-input w-16 text-center border-2 border-gray-300 rounded-lg py-1"
                readonly>
            <button
                class="quantity-btn bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors"><i
                    class="fas fa-plus text-sm"></i></button>
        </div>
    </div>
    <div class="text-right">
        <p class="text-orange-600 font-bold text-lg subtotal" data-price="35000">35,000đ</p>
        <button class="remove-btn text-red-500 hover:text-red-700 mt-2"><i
                class="fas fa-trash mr-1"></i>Xóa</button>
    </div>
</div>
<?php
// Sau khi thanh toán thành công:
echo '<div id="successModal" style="position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.3);display:flex;align-items:center;justify-content:center;z-index:9999;">
        <div style="background:#fff;border-radius:16px;padding:32px 24px;box-shadow:0 8px 32px 0 rgba(31,38,135,0.18);display:flex;flex-direction:column;align-items:center;">
            <i class="fa-solid fa-circle-check" style="font-size:3rem;color:#4ade80;margin-bottom:12px;"></i>
            <div style="font-size:1.2rem;font-weight:600;color:#16a34a;margin-bottom:8px;">Thanh toán thành công!</div>
            <div style="color:#555;margin-bottom:18px;">Đang chuyển hướng về trang chủ...</div>
            <div class="loader" style="width:40px;height:40px;border:4px solid #f3f3f3;border-top:4px solid #fc466b;border-radius:50%;animation:spin 1s linear infinite;"></div>
        </div>
    </div>
    <style>@keyframes spin{0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}</style>';
echo '<script>setTimeout(function(){window.location.href="../../index.php";}, 1800);</script>';
exit;
?>
