<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start();
// include_once __DIR__ . '/database/db_connection.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Flavour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <?php include 'includes/header.php'; ?>
    <!-- Body Content -->
    <main class="bg-gray-50">
        <!-- Slider quảng cáo -->
        <div class="w-full max-w-5xl mx-auto mt-6 rounded-xl overflow-hidden shadow-lg relative">
            <div id="slider" class="relative h-64 md:h-80">
                <img src="Photos/banner.jpg" class="slider-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-100" style="z-index:2;" />
                <img src="Photos/test1.jpg" class="slider-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0" style="z-index:1;" />
                <img src="Photos/test2.jpg" class="slider-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0" style="z-index:0;" />
                <button onclick="prevSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-pink-500 text-pink-600 hover:text-white rounded-full p-2 shadow z-10"><i class="fa fa-chevron-left"></i></button>
                <button onclick="nextSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-pink-500 text-pink-600 hover:text-white rounded-full p-2 shadow z-10"><i class="fa fa-chevron-right"></i></button>
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2 z-10">
                    <span class="slider-dot w-3 h-3 rounded-full bg-pink-500"></span>
                    <span class="slider-dot w-3 h-3 rounded-full bg-gray-300"></span>
                    <span class="slider-dot w-3 h-3 rounded-full bg-gray-300"></span>
                </div>
            </div>
        </div>
        <!-- Giới thiệu ngắn -->
        <section class="max-w-4xl mx-auto mt-10 text-center">
            <h2 class="text-2xl font-bold text-pink-600 mb-2">Chào mừng đến với Old Flavour Coffee</h2>
            <p class="text-gray-700 text-lg">Nơi bạn tận hưởng hương vị cà phê nguyên bản, không gian ấm cúng và dịch vụ tận tâm.</p>
        </section>
        <!-- Menu nổi bật (Best sellers) -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Menu nổi bật</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/test1.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Cà phê sữa đá</div>
                    <div class="text-gray-500 text-sm">Đậm đà, truyền thống</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/background.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Bánh ngọt Pháp</div>
                    <div class="text-gray-500 text-sm">Ngọt ngào, mềm mịn</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/banner.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Trà đào cam sả</div>
                    <div class="text-gray-500 text-sm">Thanh mát, giải nhiệt</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/login_background.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Sandwich gà nướng</div>
                    <div class="text-gray-500 text-sm">Bổ dưỡng, tiện lợi</div>
                </div>
            </div>
        </section>
        <!-- Danh mục menu -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Danh mục menu</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer">
                    <i class="fa fa-coffee text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Cà phê</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer">
                    <i class="fa fa-mug-hot text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Trà & Sữa</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer">
                    <i class="fa fa-wine-glass-alt text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Nước đặc biệt</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer">
                    <i class="fa fa-birthday-cake text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Đồ ăn kèm</div>
                </div>
            </div>
        </section>
        <!-- Khuyến mãi & Ưu đãi -->
        <?php include 'pages/promotion.php'; ?>
        <!-- Combo gợi ý -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Combo gợi ý</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
                    <img src="Photos/test1.jpg" class="w-20 h-20 object-cover rounded-lg" />
                    <div>
                        <div class="font-bold text-pink-600">Combo Sáng Năng Lượng</div>
                        <div class="text-gray-600 text-sm">Cà phê sữa đá + Bánh mặn</div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
                    <img src="Photos/test2.jpg" class="w-20 h-20 object-cover rounded-lg" />
                    <div>
                        <div class="font-bold text-pink-600">Combo Trà & Bánh</div>
                        <div class="text-gray-600 text-sm">Trà đào cam sả + Bánh ngọt</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Đánh giá khách hàng -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Khách hàng nói gì về chúng tôi?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-16 h-16 object-cover rounded-full mb-2" />
                    <div class="font-semibold">Nguyễn Văn A</div>
                    <div class="text-gray-500 text-sm text-center">“Không gian rất chill, cà phê ngon, nhân viên thân thiện!”</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-16 h-16 object-cover rounded-full mb-2" />
                    <div class="font-semibold">Trần Thị B</div>
                    <div class="text-gray-500 text-sm text-center">“Bánh ngọt mềm, trà đào thơm, giá hợp lý!”</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <img src="https://randomuser.me/api/portraits/men/65.jpg" class="w-16 h-16 object-cover rounded-full mb-2" />
                    <div class="font-semibold">Lê Minh C</div>
                    <div class="text-gray-500 text-sm text-center">“Combo bữa sáng tiện lợi, rất thích!”</div>
                </div>
            </div>
        </section>
        <?php include 'includes/chat-zalo.php'; ?>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script>
    // Dropdown for menu
    function toggleDropdown(id) {
        var el = document.getElementById(id);
        if (el.classList.contains('opacity-0')) {
            el.classList.remove('opacity-0', 'invisible');
            el.classList.add('opacity-100', 'visible');
        } else {
            el.classList.remove('opacity-100', 'visible');
            el.classList.add('opacity-0', 'invisible');
        }
    }
    // Close dropdown when clicking outside
    window.addEventListener('click', function(e) {
        var menu = document.getElementById('menuDropdown');
        if (menu && !menu.contains(e.target) && !e.target.closest('[onclick*="toggleDropdown"]')) {
            menu.classList.remove('opacity-100', 'visible');
            menu.classList.add('opacity-0', 'invisible');
        }
    });
    // Slider JS
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slider-img');
    const dots = document.querySelectorAll('.slider-dot');
    function showSlide(idx) {
        slides.forEach((img, i) => {
            img.style.opacity = i === idx ? '1' : '0';
        });
        dots.forEach((dot, i) => {
            dot.className = 'slider-dot w-3 h-3 rounded-full ' + (i === idx ? 'bg-pink-500' : 'bg-gray-300');
        });
        currentSlide = idx;
    }
    function nextSlide() {
        let idx = (currentSlide + 1) % slides.length;
        showSlide(idx);
    }
    function prevSlide() {
        let idx = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(idx);
    }
    document.querySelectorAll('.slider-dot').forEach((dot, i) => {
        dot.onclick = () => showSlide(i);
    });
    setInterval(nextSlide, 5000);
    showSlide(0);
    </script>
</body>
</html>