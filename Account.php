<?php include 'header.php'; ?>
<main class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Profile Card (Left) -->
        <aside class="md:col-span-1 bg-white rounded-2xl shadow-lg flex flex-col items-center p-6 gap-3">
            <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-pink-200 shadow">
                <img src="Photos/login_background1.jpg" alt="Avatar" class="w-full h-full object-cover" />
            </div>
            <div class="text-xl font-bold text-pink-600">Nguyễn Văn A</div>
            <div class="text-gray-500 text-sm mb-1">Thành viên Vàng</div>
            <div class="flex items-center gap-2 text-yellow-400 mb-2">
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>
            </div>
            <div class="bg-pink-50 text-pink-600 rounded-full px-4 py-1 text-xs font-semibold">Reward: 1,250 điểm</div>
        </aside>
        <!-- Main Info (Center) -->
        <section class="md:col-span-2 bg-white rounded-2xl shadow-lg p-8 flex flex-col gap-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-2xl font-bold text-gray-800">Thông tin cá nhân</h2>
                <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded transition flex items-center gap-2 text-sm font-semibold"><i class="fa fa-edit"></i> Chỉnh sửa</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Tên hiển thị:</span> Nguyễn Văn A</div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Nickname:</span> CoffeeLover</div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Email:</span> nguyenvana@email.com</div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Số điện thoại:</span> 0909.xxx.xxx</div>
                </div>
                <div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Ngày sinh:</span> 01/01/2000</div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Địa chỉ:</span> 123 Đường Trà Sữa, Tây Ninh</div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Ngày tham gia:</span> 12/09/2023</div>
                    <div class="mb-2"><span class="font-semibold text-gray-600">Điểm thưởng:</span> 1,250</div>
                </div>
            </div>
        </section>
        <!-- Quick Access (Right) -->
        <aside class="md:col-span-1 flex flex-col gap-4">
            <div class="bg-white rounded-2xl shadow-lg p-5 flex flex-col gap-3">
                <div class="font-bold text-pink-600 mb-2">Truy cập nhanh</div>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-pink-600 transition"><i class="fa fa-history w-5"></i> Lịch sử đặt hàng</a>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-pink-600 transition"><i class="fa fa-ticket-alt w-5"></i> Voucher / Mã khuyến mãi</a>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-pink-600 transition"><i class="fa fa-gift w-5"></i> Điểm thưởng & Cấp độ</a>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-pink-600 transition"><i class="fa fa-map-marker-alt w-5"></i> Địa chỉ giao hàng</a>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-pink-600 transition"><i class="fa fa-key w-5"></i> Đổi mật khẩu</a>
                <hr class="my-2">
                <a href="#" class="flex items-center gap-2 text-red-500 hover:text-red-700 transition font-semibold"><i class="fa fa-sign-out-alt w-5"></i> Đăng xuất</a>
            </div>
        </aside>
    </div>
</main>
<?php include 'footer.php'; ?>
