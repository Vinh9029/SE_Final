<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Favour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-3 px-6">
            <!-- Logo + Brand -->
            <div class="flex items-center gap-2">
                <img src="Photos/logo.png" alt="Logo" class="h-12 w-12 object-cover rounded-full shadow" />
                <span class="text-2xl font-bold text-pink-600 tracking-wide select-none">Old Favour</span>
            </div>
            <!-- Navigation Bar -->
            <nav class="flex items-center gap-6">
                <a href="index.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Trang chủ</a>
                <!-- Dropdown Menu -->
                <div class="relative group" tabindex="0">
                    <button type="button" class="flex items-center gap-1 text-gray-700 hover:text-pink-600 font-medium transition focus:outline-none" onclick="toggleDropdown('menuDropdown')">
                        Thực đơn <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>
                    <div id="menuDropdown" class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-lg opacity-0 invisible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-200 z-40">
                        <div class="py-2 px-4 border-b text-xs text-gray-500 font-semibold">Đồ uống</div>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Cà phê phin</a>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Cà phê pha máy</a>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Trà & Trà sữa</a>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Sinh tố & Nước ép</a>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Nước ngọt đóng chai</a>
                        <div class="py-2 px-4 border-b text-xs text-gray-500 font-semibold">Đồ ăn nhẹ</div>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Bánh ngọt</a>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Bánh mặn & Sandwich</a>
                        <a href="#" class="block px-4 py-2 hover:bg-pink-50 text-gray-700">Đồ ăn vặt</a>
                    </div>
                </div>
                <a href="#" class="text-gray-700 hover:text-pink-600 font-medium transition">Khuyến mãi</a>
                <a href="#" class="text-gray-700 hover:text-pink-600 font-medium transition">Liên hệ</a>
            </nav>
            <!-- Search, Cart, User -->
            <div class="flex items-center gap-4">
                <!-- Search Bar -->
                <form class="relative hidden md:block">
                    <input type="text" placeholder="Tìm kiếm..." class="pl-10 pr-3 py-2 rounded-full border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-100 outline-none text-sm w-48 transition" />
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fa fa-search"></i></span>
                </form>
                <!-- Cart Icon -->
                <a href="#" class="relative text-gray-700 hover:text-pink-600 text-xl">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs rounded-full px-1.5 py-0.5 font-bold">0</span>
                </a>
                <!-- User/Login -->
                <div class="relative group">
                    <a href="index.php" class="flex items-center gap-2 text-gray-700 hover:text-pink-600 font-medium transition focus:outline-none">
                        <i class="fa fa-user-circle text-2xl"></i>
                        <span>Đăng nhập</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
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
            <h2 class="text-2xl font-bold text-pink-600 mb-2">Chào mừng đến với Old Favour Coffee</h2>
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
                    <img src="Photos/test2.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
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
                    <div class="font-semibold">Đồ uống</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer">
                    <i class="fa fa-birthday-cake text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Bánh ngọt</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer">
                    <i class="fa fa-bread-slice text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Bánh mặn & Sandwich</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer">
                    <i class="fa fa-ice-cream text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Đồ ăn vặt</div>
                </div>
            </div>
        </section>
        <!-- Khuyến mãi & Ưu đãi -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Khuyến mãi & Ưu đãi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-r from-pink-400 to-yellow-300 rounded-xl shadow p-6 text-white flex flex-col justify-between">
                    <div class="text-lg font-bold mb-2">Mua 2 tặng 1 - Cà phê phin</div>
                    <div class="text-sm">Áp dụng đến hết 30/09/2025</div>
                </div>
                <div class="bg-gradient-to-r from-pink-400 to-blue-400 rounded-xl shadow p-6 text-white flex flex-col justify-between">
                    <div class="text-lg font-bold mb-2">Giảm 20% cho hóa đơn trên 200K</div>
                    <div class="text-sm">Chỉ áp dụng tại cửa hàng</div>
                </div>
            </div>
        </section>
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
        <!-- Bản đồ + thông tin quán -->
        <!-- <section class="max-w-5xl mx-auto mt-12 mb-10">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Liên hệ & Địa chỉ</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <iframe src="https://www.google.com/maps?q=10.762622,106.660172&z=15&output=embed" width="100%" height="250" style="border:0; border-radius:12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="font-bold text-lg text-pink-600 mb-2">Old Favour Coffee</div>
                    <div class="text-gray-700 mb-1"><i class="fa fa-map-marker-alt mr-2 text-pink-500"></i>123 Main St, Ho Chi Minh City</div>
                    <div class="text-gray-700 mb-1"><i class="fa fa-phone-alt mr-2 text-pink-500"></i>(123) 456-7890</div>
                    <div class="text-gray-700 mb-1"><i class="fa fa-envelope mr-2 text-pink-500"></i>info@oldfavourcoffee.com</div>
                    <div class="text-gray-700"><i class="fa fa-clock mr-2 text-pink-500"></i>Mon-Sat: 7am - 8pm | Sun: 8am - 6pm</div>
                </div>
            </div>
        </section> -->
    </main>
    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-200 pt-10 pb-4 mt-10">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Cột 1: Logo + slogan + liên hệ -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <img src="Photos/logo.png" alt="Logo" class="h-12 w-12 object-cover rounded-full shadow" />
                    <span class="text-xl font-bold text-pink-400">Old Favour</span>
                </div>
                <div class="mb-2 text-pink-200 italic">Hạnh phúc trong từng tách cà phê!</div>
                <div class="text-sm flex flex-col gap-1">
                    <span><i class="fa fa-map-marker-alt text-pink-400 mr-2"></i>123 Main St, Ho Chi Minh City</span>
                    <span><i class="fa fa-phone-alt text-pink-400 mr-2"></i>(123) 456-7890</span>
                    <span><i class="fa fa-envelope text-pink-400 mr-2"></i>info@oldfavourcoffee.com</span>
                </div>
            </div>
            <!-- Cột 2: Liên kết nhanh -->
            <div>
                <div class="font-semibold text-lg mb-2 text-pink-300">Liên kết nhanh</div>
                <ul class="space-y-1 text-sm">
                    <li><a href="index.php" class="hover:text-pink-400 transition">Trang chủ</a></li>
                    <li><a href="#" class="hover:text-pink-400 transition">Thực đơn</a></li>
                    <li><a href="#" class="hover:text-pink-400 transition">Khuyến mãi</a></li>
                    <li><a href="#" class="hover:text-pink-400 transition">Liên hệ</a></li>
                    <li><a href="registerAccount.php" class="hover:text-pink-400 transition">Đăng ký</a></li>
                </ul>
            </div>
            <!-- Cột 3: Mạng xã hội + đối tác giao hàng -->
            <div>
                <div class="font-semibold text-lg mb-2 text-pink-300">Kết nối với chúng tôi</div>
                <div class="flex gap-3 mb-3">
                    <a href="#" class="hover:text-pink-400 text-2xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-pink-400 text-2xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-pink-400 text-2xl"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="font-semibold text-sm mb-1 text-pink-200">Đối tác giao hàng</div>
                <div class="flex gap-3 items-center">
                    <img src="Photos/grab.jpg" alt="Grab" class="h-8 w-auto max-w-[60px] bg-white rounded p-1 object-contain shadow" />
                    <img src="Photos/shopee_food.png" alt="ShopeeFood" class="h-8 w-auto max-w-[60px] bg-white rounded p-1 object-contain shadow" />
                    <img src="Photos/baemin.png" alt="Baemin" class="h-8 w-auto max-w-[60px] bg-white rounded p-1 object-contain shadow" />
                </div>
            </div>
            <!-- Cột 4: Newsletter + bản đồ nhỏ -->
            <div>
                <div class="font-semibold text-lg mb-2 text-pink-300">Nhận ưu đãi & tin mới</div>
                <form class="flex mb-3">
                    <input type="email" placeholder="Nhập email của bạn" class="rounded-l px-3 py-2 w-full text-gray-800 focus:outline-none" required />
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 rounded-r">Gửi</button>
                </form>
                <div class="font-semibold text-sm mb-1 text-pink-200">Địa chỉ quán</div>
                <iframe src="https://www.google.com/maps?q=10.762622,106.660172&z=15&output=embed" width="120%" height="200" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 mt-8">
            &copy; 2025 Old Favour Coffee. All rights reserved.
        </div>
    </footer>
    <?php include 'chat-zalo.php'; ?>
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