<?php include 'header.php'; ?>
<main class="bg-gray-50 min-h-screen">
    <!-- Banner lớn đầu trang -->
    <section class="w-full bg-gradient-to-r from-pink-500 to-yellow-300 py-10 mb-8 rounded-b-3xl shadow-xl">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 flex items-center justify-center gap-3 drop-shadow-lg">
                <span>Tháng 9 – Ưu đãi cho học sinh, sinh viên</span>
                <span class="bg-white text-pink-500 px-6 py-2 rounded-full font-bold text-2xl shadow-lg border-2 border-pink-300">-15%</span>
            </h1>
            <div class="text-white text-lg font-semibold drop-shadow">Áp dụng từ 20/9 – 30/9</div>
        </div>
    </section>
    <!-- Danh sách khuyến mãi -->
    <section class="max-w-6xl mx-auto px-2">
        <h2 class="text-2xl font-extrabold text-pink-600 mb-8 text-center">Chương trình khuyến mãi nổi bật</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Combo hấp dẫn -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex flex-col items-center relative hover:scale-105 hover:shadow-yellow-300 transition duration-200 border-2 border-yellow-300">
                <span class="absolute top-6 left-6 bg-gradient-to-r from-yellow-400 to-yellow-200 text-yellow-900 text-xs font-extrabold px-4 py-1 rounded-full shadow border border-yellow-400">🎁 Combo</span>
                <img src="Photos/test1.jpg" alt="Combo" class="w-28 h-28 object-cover rounded-2xl mb-4 shadow border-2 border-yellow-300" />
                <div class="font-extrabold text-xl text-yellow-700 mb-2 text-center">Cà phê + bánh ngọt</div>
                <div class="text-gray-800 font-semibold mb-2 text-center">Tiết kiệm hơn khi mua combo!</div>
                <div class="text-sm text-orange-700 font-bold mb-3">Áp dụng từ 20/9 – 30/9</div>
                <a href="menus/menu.php" class="btn-orange hover:bg-orange-600 text-white px-6 py-2 rounded-xl font-extrabold text-base shadow transition mb-2">Đặt món</a>
                <a href="promotion.php" class="bg-yellow-400 hover:bg-yellow-500 text-yellow-900 font-extrabold px-5 py-2 rounded-xl shadow border border-yellow-500 transition">Xem Menu ngay</a>
            </div>
            <!-- Ngày đặc biệt -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex flex-col items-center relative hover:scale-105 hover:shadow-green-300 transition duration-200 border-2 border-green-400">
                <span class="absolute top-6 left-6 bg-gradient-to-r from-green-400 to-green-200 text-white text-xs font-bold px-4 py-1 rounded-full shadow">🎉 Birthday</span>
                <img src="Photos/test2.jpg" alt="Birthday" class="w-28 h-28 object-cover rounded-2xl mb-4 shadow border-2 border-green-200" />
                <div class="font-extrabold text-xl text-green-700 mb-2 text-center">Giảm giá sinh nhật khách hàng</div>
                <div class="text-gray-800 font-semibold mb-2 text-center">Nhận ưu đãi đặc biệt trong tháng sinh nhật!</div>
                <div class="text-sm text-orange-700 font-bold mb-3">Áp dụng toàn năm</div>
                <a href="menus/menu.php" class="btn-orange hover:bg-orange-600 text-white px-6 py-2 rounded-xl font-extrabold text-base shadow transition mb-2">Đặt món</a>
                <a href="promotion.php" class="bg-green-400 hover:bg-green-500 text-white font-extrabold px-5 py-2 rounded-xl shadow border border-green-500 transition">Xem Menu ngay</a>
            </div>
            <!-- Flash sale -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex flex-col items-center relative hover:scale-105 hover:shadow-orange-400 transition duration-200 border-2 border-orange-400">
                <span class="absolute top-6 left-6 bg-gradient-to-r from-orange-500 to-red-400 text-orange-900 text-xs font-extrabold px-4 py-1 rounded-full shadow border border-orange-500">🔥 Flash Sale</span>
                <img src="Photos/banner.jpg" alt="Flash Sale" class="w-28 h-28 object-cover rounded-2xl mb-4 shadow border-2 border-orange-400" />
                <div class="font-extrabold text-xl text-orange-700 mb-2 text-center">Giảm giá theo khung giờ</div>
                <div class="text-gray-800 font-semibold mb-2 text-center">8h–11h sáng, giảm đến 30%</div>
                <div class="text-sm text-orange-700 font-bold mb-3">Chỉ áp dụng hôm nay</div>
                <div class="mb-2 text-center">
                    <span class="font-bold text-pink-500">Kết thúc sau:</span>
                    <span id="flashCountdown" class="font-bold text-red-500 ml-2">--:--:--</span>
                </div>
                <a href="menus/menu.php" class="btn-orange hover:bg-orange-600 text-white px-6 py-2 rounded-xl font-extrabold text-base shadow transition mb-2">Đặt món</a>
                <a href="promotion.php" class="bg-orange-500 hover:bg-orange-600 text-white font-extrabold px-5 py-2 rounded-xl shadow border border-orange-600 transition">Xem Menu ngay</a>
            </div>
            <!-- Tích điểm thành viên -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 flex flex-col items-center relative hover:scale-105 hover:shadow-pink-300 transition duration-200">
                <span class="absolute top-6 left-6 bg-gradient-to-r from-blue-500 to-pink-300 text-white text-xs font-bold px-4 py-1 rounded-full shadow">💳 Thành viên</span>
                <img src="Photos/login_background.jpg" alt="Tích điểm" class="w-28 h-28 object-cover rounded-2xl mb-4 shadow border-2 border-pink-100" />
                <div class="font-extrabold text-xl text-pink-600 mb-2 text-center">Mua 10 tặng 1</div>
                <div class="text-gray-700 mb-2 text-center">Tham gia thành viên để nhận ưu đãi tích điểm!</div>
                <div class="text-sm text-orange-600 font-bold mb-3">Áp dụng liên tục</div>
                <a href="menus/menu.php" class="btn-orange hover:bg-orange-600 text-white px-6 py-2 rounded-xl font-bold text-base shadow transition">Xem Menu ngay</a>
            </div>
        </div>
    </section>
    <!-- Mini game khuyến mãi -->
    <section class="max-w-4xl mx-auto mt-16 mb-12">
        <h2 class="text-2xl font-extrabold text-pink-600 mb-6 flex items-center gap-2 justify-center"><i class="fa fa-gamepad text-pink-500"></i> Vòng quay may mắn</h2>
        <div class="bg-white rounded-3xl shadow-2xl p-10 flex flex-col items-center hover:shadow-pink-300 transition">
            <div class="mb-6 text-lg font-semibold text-gray-700 text-center">Quay để nhận mã giảm giá <span class="text-pink-500 font-bold">10%–30%</span>!</div>
            <button class="btn-orange hover:bg-orange-600 text-white px-8 py-4 rounded-full font-extrabold text-xl shadow-lg transition mb-4">Quay ngay</button>
            <div class="text-sm text-gray-500">*Tính năng sẽ được cập nhật sớm!</div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
<script>
// Countdown timer cho Flash Sale (giả lập đến 11:00 hôm nay)
function updateCountdown() {
    const now = new Date();
    const end = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 11, 0, 0);
    let diff = end - now;
    if (diff < 0) diff = 0;
    const h = String(Math.floor(diff/3600000)).padStart(2,'0');
    const m = String(Math.floor((diff%3600000)/60000)).padStart(2,'0');
    const s = String(Math.floor((diff%60000)/1000)).padStart(2,'0');
    document.getElementById('flashCountdown').textContent = `${h}:${m}:${s}`;
}
setInterval(updateCountdown, 1000);
updateCountdown();
</script>
