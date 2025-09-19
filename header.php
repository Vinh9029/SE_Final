<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between py-3 px-6">
        <!-- Logo + Tên quán -->
        <div class="flex items-center gap-2">
            <img src="Photos/logo.png" alt="Logo" class="h-12 w-12 object-cover rounded-full shadow" />
            <span class="text-2xl font-bold text-pink-600 tracking-wide select-none"><a href="index.php">Old Favour</span>
        </div>
        <!-- Menu điều hướng -->
        <nav class="flex-1 flex justify-center">
            <ul class="flex items-center gap-6">
                <li><a href="index.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Trang chủ</a></li>
                <li class="relative group">
                    <a href="menus/menu.php" class="text-gray-700 hover:text-pink-600 font-medium transition flex items-center gap-1">
                        Thực đơn <i class="fa fa-chevron-down text-xs"></i>
                    </a>
                    <ul class="absolute left-0 top-full mt-2 w-48 bg-white rounded shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                        <li><a href="menus/menu.php?cat=coffee" class="block px-4 py-2 text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition">Cà phê</a></li>
                        <li><a href="menus/menu.php?cat=tea_milk" class="block px-4 py-2 text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition">Trà & Sữa</a></li>
                        <li><a href="menus/menu.php?cat=signature" class="block px-4 py-2 text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition">Nước đặc biệt</a></li>
                        <li><a href="menus/menu.php?cat=food" class="block px-4 py-2 text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition">Đồ ăn kèm</a></li>
                    </ul>
                </li>
                <li><a href="#" class="text-gray-700 hover:text-pink-600 font-medium transition">Khuyến mãi</a></li>
                <li><a href="aboutUs.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Về chúng tôi</a></li>
                <li><a href="contactUS.php" class="text-gray-700 hover:text-pink-600 font-medium transition">Liên hệ</a></li>
            </ul>
        </nav>
        <!-- Search | Cart | Login -->
        <div class="flex items-center gap-4">
            <!-- Search bar -->
            <form action="#" method="get" class="relative hidden md:block">
                <input type="text" name="search" placeholder="Tìm kiếm..." class="border rounded-full px-3 py-1 pl-8 focus:outline-none focus:ring-2 focus:ring-pink-200 text-sm bg-gray-50" />
                <span class="absolute left-2 top-1.5 text-gray-400"><i class="fa fa-search"></i></span>
            </form>
            <!-- Cart icon -->
            <a href="#" class="relative text-gray-700 hover:text-pink-600 text-xl transition">
                <i class="fa fa-shopping-cart"></i>
                <!-- Badge số lượng (nếu có) -->
                <!-- <span class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs rounded-full px-1">2</span> -->
            </a>
            <!-- Login -->
            <a href="user.php" class="text-gray-700 hover:text-pink-600 font-medium transition flex items-center gap-1">
                <i class="fa fa-user-circle text-lg"></i>
                <span>Đăng nhập</span>
            </a>
        </div>
    </div>
</header>
