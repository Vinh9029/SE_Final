<?php
// Dữ liệu sản phẩm mẫu
$products = [
    'coffee' => [
        ['name' => 'Đen đá/nóng', 'price' => '20.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Sữa đá/nóng', 'price' => '25.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Bạc xỉu', 'price' => '25.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Cold Brew (ủ lạnh)', 'price' => '40.000đ', 'img' => '../Photos/login_background.jpg'],
        ['name' => 'Cà phê muối', 'price' => '35.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Cappuccino', 'price' => '45.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Latte', 'price' => '45.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Espresso', 'price' => '30.000đ', 'img' => '../Photos/login_background.jpg'],
    ],
    'tea_milk' => [
        ['name' => 'Trà đào cam sả', 'price' => '35.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Trà hoa cúc mật ong', 'price' => '30.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Trà sen nhãn', 'price' => '35.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Trà sữa Oolong', 'price' => '40.000đ', 'img' => '../Photos/login_background.jpg'],
        ['name' => 'Trà sữa Matcha', 'price' => '40.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Trà sữa Hồng Trà', 'price' => '35.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Hồng trà sữa trân châu đường nâu', 'price' => '45.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Trà dâu tằm thanh long', 'price' => '45.000đ', 'img' => '../Photos/test2.jpg'],
    ],
    'signature' => [
        ['name' => 'The Old Flavour Coffee', 'price' => '45.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Soda chanh dây mật ong', 'price' => '35.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Sinh tố xoài', 'price' => '40.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Sinh tố chuối cacao', 'price' => '40.000đ', 'img' => '../Photos/login_background.jpg'],
        ['name' => 'Sinh tố dâu', 'price' => '40.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Chocolate đá xay', 'price' => '50.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Soda việt quất bạc hà', 'price' => '45.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Nước ép cam tươi', 'price' => '35.000đ', 'img' => '../Photos/login_background.jpg'],
    ],
    'food' => [
        ['name' => 'Croissant bơ', 'price' => '30.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Croissant phô mai jambon', 'price' => '40.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Tiramisu', 'price' => '45.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Mousse chanh dây', 'price' => '45.000đ', 'img' => '../Photos/login_background.jpg'],
        ['name' => 'Cheesecake việt quất', 'price' => '50.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Bánh su kem (3 cái)', 'price' => '30.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Set bánh ngọt mini (mix 3 loại)', 'price' => '60.000đ', 'img' => '../Photos/test2.jpg'],
        ['name' => 'Red Velvet Cake', 'price' => '55.000đ', 'img' => '../Photos/login_background.jpg'],
        ['name' => 'Brownie Socola', 'price' => '50.000đ', 'img' => '../Photos/banner.jpg'],
        ['name' => 'Bánh flan caramel', 'price' => '25.000đ', 'img' => '../Photos/test1.jpg'],
        ['name' => 'Bánh apple pie mini', 'price' => '45.000đ', 'img' => '../Photos/test2.jpg'],
    ],
];
$cat = $_GET['cat'] ?? 'coffee';
$sort = $_GET['sort'] ?? 'default';
$cat_names = [
    'coffee' => 'Cà phê',
    'tea_milk' => 'Trà & Sữa',
    'signature' => 'Nước đặc biệt (Signature)',
    'food' => 'Đồ ăn kèm',
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực đơn | Old Favour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .btn-orange { background: #FF7A00; }
        .btn-orange:hover { background: #ff9800; }
        .footer-bg { background: #3d2c1a; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-3 px-6">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="../Photos/logo.png" alt="Logo" class="h-12 w-12 object-cover rounded-full shadow" />
                <span class="text-2xl font-bold text-pink-600 tracking-wide select-none"><a href="../index.php">Old Favour</a></span>
            </div>
            <!-- Navigation -->
            <nav class="flex-1 flex justify-center">
                <ul class="flex items-center gap-4 md:gap-6 text-base">
                    <li><a href="../index.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Trang chủ</a></li>
                    <li><a href="menu.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Thực đơn</a></li>
                    <li><a href="menu.php?cat=coffee" class="text-gray-700 hover:text-pink-600 font-medium transition">Cà phê</a></li>
                    <li><a href="menu.php?cat=tea_milk" class="text-gray-700 hover:text-pink-600 font-medium transition">Trà & Sữa</a></li>
                    <li><a href="menu.php?cat=signature" class="text-gray-700 hover:text-pink-600 font-medium transition">Nước đặc biệt</a></li>
                    <li><a href="menu.php?cat=food" class="text-gray-700 hover:text-pink-600 font-medium transition">Đồ ăn kèm</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-pink-600 font-medium transition">Khuyến mãi</a></li>
                    <li><a href="../aboutUs.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Về chúng tôi</a></li>
                    <li><a href="../contactUS.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Liên hệ</a></li>
                </ul>
            </nav>
            <!-- Search + Login -->
            <div class="flex items-center gap-4">
                <form action="#" method="get" class="relative hidden md:block">
                    <input type="text" name="search" placeholder="Tìm kiếm..." class="border rounded-full px-3 py-1 pl-8 focus:outline-none focus:ring-2 focus:ring-pink-200 text-sm bg-gray-50" />
                    <span class="absolute left-2 top-1.5 text-gray-400"><i class="fa fa-search"></i></span>
                </form>
                <a href="../user.php" class="text-gray-700 hover:text-pink-600 font-medium transition flex items-center gap-1">
                    <i class="fa fa-user-circle text-lg"></i>
                    <span>Đăng nhập</span>
                </a>
            </div>
        </div>
    </header>
    <!-- Hero Banner Slider -->
    <section class="relative h-64 md:h-80 w-full flex items-center justify-center mb-10">
        <div id="hero-slider" class="relative w-full h-full overflow-hidden rounded-xl">
            <img src="../Photos/banner.jpg" class="hero-slide absolute inset-0 w-full h-full object-cover brightness-75 opacity-100 transition-opacity duration-700" style="z-index:2;" />
            <img src="../Photos/test1.jpg" class="hero-slide absolute inset-0 w-full h-full object-cover brightness-75 opacity-0 transition-opacity duration-700" style="z-index:1;" />
            <img src="../Photos/test2.jpg" class="hero-slide absolute inset-0 w-full h-full object-cover brightness-75 opacity-0 transition-opacity duration-700" style="z-index:0;" />
            <button onclick="prevHeroSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-orange-500 text-orange-600 hover:text-white rounded-full p-2 shadow z-10"><i class="fa fa-chevron-left"></i></button>
            <button onclick="nextHeroSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-orange-500 text-orange-600 hover:text-white rounded-full p-2 shadow z-10"><i class="fa fa-chevron-right"></i></button>
            <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2 z-10">
                <span class="hero-dot w-3 h-3 rounded-full bg-orange-500"></span>
                <span class="hero-dot w-3 h-3 rounded-full bg-gray-300"></span>
                <span class="hero-dot w-3 h-3 rounded-full bg-gray-300"></span>
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow-lg text-center">Hạnh phúc trong từng tách cà phê!</h1>
            </div>
        </div>
    </section>
    <script>
    // Hero slider JS
    let heroCurrent = 0;
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroDots = document.querySelectorAll('.hero-dot');
    function showHeroSlide(idx) {
        heroSlides.forEach((img, i) => {
            img.style.opacity = i === idx ? '1' : '0';
        });
        heroDots.forEach((dot, i) => {
            dot.className = 'hero-dot w-3 h-3 rounded-full ' + (i === idx ? 'bg-orange-500' : 'bg-gray-300');
        });
        heroCurrent = idx;
    }
    function nextHeroSlide() {
        showHeroSlide((heroCurrent + 1) % heroSlides.length);
    }
    function prevHeroSlide() {
        showHeroSlide((heroCurrent - 1 + heroSlides.length) % heroSlides.length);
    }
    document.querySelectorAll('.hero-dot').forEach((dot, i) => {
        dot.onclick = () => showHeroSlide(i);
    });
    setInterval(nextHeroSlide, 5000);
    showHeroSlide(0);
    </script>
    <!-- Menu Tabs/Filter -->
    <div class="max-w-6xl mx-auto px-2">
        <div class="flex flex-wrap justify-between items-center gap-2 mb-8">
            <div class="flex flex-wrap gap-2">
                <?php foreach ($cat_names as $key => $label): ?>
                    <a href="?cat=<?php echo htmlspecialchars($key); ?><?php echo isset($_GET['sort']) ? '&sort='.htmlspecialchars($_GET['sort']) : ''; ?>" class="px-6 py-2 rounded-t-xl font-bold text-lg text-gray-700 <?php echo ($cat==$key)?'bg-pink-500 text-white shadow-lg':'bg-pink-100 hover:bg-pink-200 shadow'; ?> transition duration-200">
                        <?php echo htmlspecialchars($label); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="flex items-center gap-2">
                <label for="sort-select" class="font-bold text-lg text-gray-700 flex items-center gap-1" aria-label="Sắp xếp theo">
                    <i class="fa fa-sort text-gray-500"></i> Sắp xếp:
                </label>
                <select id="sort-select" class="border rounded px-3 py-2 text-base font-semibold focus:outline-none focus:ring-2 focus:ring-orange-200 bg-white shadow" onchange="onSortChange(this.value)">
                    <option value="default" <?php echo ($sort=='default')?'selected':''; ?>>Mặc định</option>
                    <option value="name_asc" <?php echo ($sort=='name_asc')?'selected':''; ?>>Tên A-Z</option>
                    <option value="name_desc" <?php echo ($sort=='name_desc')?'selected':''; ?>>Tên Z-A</option>
                    <option value="price_asc" <?php echo ($sort=='price_asc')?'selected':''; ?>>Giá thấp đến cao</option>
                    <option value="price_desc" <?php echo ($sort=='price_desc')?'selected':''; ?>>Giá cao xuống thấp</option>
                </select>
            </div>
        </div>
        <script>
        function onSortChange(val) {
            // JS sort: fallback reload
            const url = new URL(window.location.href);
            url.searchParams.set('sort', val);
            window.location.href = url.toString();
        }
        </script>
        <!-- Grid sản phẩm -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php foreach ($products[$cat] as $item): ?>
            <div class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center hover:scale-105 hover:shadow-pink-300 transition duration-200">
                <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>" class="w-32 h-32 object-cover rounded-xl mb-4 shadow bg-gray-100 border-2 border-pink-100" />
                <div class="font-extrabold text-pink-600 text-xl text-center mb-1"><?php echo $item['name']; ?></div>
                <div class="text-orange-600 font-bold text-lg mb-2 text-center"><?php echo $item['price']; ?></div>
                <button class="btn-orange hover:bg-orange-600 text-white px-6 py-2 rounded-xl font-bold text-base mt-2 shadow transition duration-200">Đặt món</button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer-bg text-gray-200 pt-10 pb-4 mt-10">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Logo + slogan + liên hệ -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <img src="../Photos/logo.png" alt="Logo" class="h-12 w-12 object-cover rounded-full shadow" />
                    <span class="text-xl font-bold text-pink-400">Old Favour</span>
                </div>
                <div class="mb-2 text-pink-200 italic">Hạnh phúc trong từng tách cà phê!</div>
                <div class="text-sm flex flex-col gap-1">
                    <span><i class="fa fa-map-marker-alt text-pink-400 mr-2"></i>123 Main St, Ho Chi Minh City</span>
                    <span><i class="fa fa-phone-alt text-pink-400 mr-2"></i>(123) 456-7890</span>
                    <span><i class="fa fa-envelope text-pink-400 mr-2"></i>info@oldfavourcoffee.com</span>
                </div>
            </div>
            <!-- Liên kết nhanh -->
            <div>
                <div class="font-semibold text-lg mb-2 text-pink-300">Liên kết nhanh</div>
                <ul class="space-y-1 text-sm">
                    <li><a href="../user.php" class="hover:text-pink-400 transition">Trang chủ</a></li>
                    <li><a href="menu.php" class="hover:text-pink-400 transition">Thực đơn</a></li>
                    <li><a href="#" class="hover:text-pink-400 transition">Khuyến mãi</a></li>
                    <li><a href="../contactUS.php" class="hover:text-pink-400 transition">Liên hệ</a></li>
                    <li><a href="../registerAccount.php" class="hover:text-pink-400 transition">Đăng ký</a></li>
                </ul>
            </div>
            <!-- Mạng xã hội + đối tác giao hàng -->
            <div>
                <div class="font-semibold text-lg mb-2 text-pink-300">Kết nối với chúng tôi</div>
                <div class="flex gap-3 mb-3">
                    <a href="#" class="hover:text-pink-400 text-2xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-pink-400 text-2xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-pink-400 text-2xl"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="font-semibold text-sm mb-1 text-pink-200">Đối tác giao hàng</div>
                <div class="flex gap-3 items-center">
                    <img src="../Photos/grab.jpg" alt="Grab" class="h-8 w-auto max-w-[60px] bg-white rounded p-1 object-contain shadow" />
                    <img src="../Photos/shopee_food.png" alt="ShopeeFood" class="h-8 w-auto max-w-[60px] bg-white rounded p-1 object-contain shadow" />
                    <img src="../Photos/baemin.png" alt="Baemin" class="h-8 w-auto max-w-[60px] bg-white rounded p-1 object-contain shadow" />
                </div>
            </div>
            <!-- Newsletter + bản đồ nhỏ -->
            <div>
                <div class="font-semibold text-lg mb-2 text-pink-300">Nhận ưu đãi & tin mới</div>
                <form class="flex mb-3">
                    <input type="email" placeholder="Nhập email của bạn" class="rounded-l px-3 py-2 w-full text-gray-800 focus:outline-none" required />
                    <button type="submit" class="btn-orange hover:bg-orange-600 text-white px-4 rounded-r">Gửi</button>
                </form>
                <div class="font-semibold text-sm mb-1 text-pink-200">Địa chỉ quán</div>
                <iframe src="https://www.google.com/maps?q=10.762622,106.660172&z=15&output=embed" width="120%" height="200" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 mt-8">
            &copy; 2025 Old Favour Coffee. All rights reserved.
        </div>
    </footer>
</body>
</html>
