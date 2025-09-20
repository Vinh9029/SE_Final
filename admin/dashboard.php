<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Old Favour Coffee</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-gray-50 via-yellow-50 to-white min-h-screen">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-2xl flex flex-col py-8 px-4 gap-4 sticky top-0 h-screen">
      <div class="flex items-center gap-2 mb-8">
        <img src="../Photos/logo.png" alt="Logo" class="h-12 w-12 object-cover rounded-full shadow" />
        <span class="text-xl font-bold text-pink-600">Admin Panel</span>
      </div>
      <nav class="flex-1">
        <ul class="flex flex-col gap-2">
          <li><a href="../index.php" class="block px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-pink-100 hover:text-pink-600 transition flex items-center"><i class="fa fa-tachometer-alt mr-2 text-pink-500"></i> Dashboard</a></li>
          <li><a href="products/list.php" class="block px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-orange-100 hover:text-orange-600 transition flex items-center"><i class="fa fa-coffee mr-2 text-orange-500"></i> Quản lý sản phẩm</a></li>
          <li><a href="../orders/list.php" class="block px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 transition flex items-center"><i class="fa fa-receipt mr-2 text-yellow-500"></i> Quản lý đơn hàng</a></li>
          <li><a href="../customers/list.php" class="block px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition flex items-center"><i class="fa fa-users mr-2 text-blue-500"></i> Quản lý khách hàng</a></li>
          <li><a href="../reports/sales.php" class="block px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-green-100 hover:text-green-600 transition flex items-center"><i class="fa fa-chart-line mr-2 text-green-500"></i> Báo cáo doanh số</a></li>
          <li><a href="../reports/revenue.php" class="block px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-purple-100 hover:text-purple-600 transition flex items-center"><i class="fa fa-coins mr-2 text-purple-500"></i> Báo cáo doanh thu</a></li>
        </ul>
      </nav>
      <div class="mt-auto">
        <a href="../../index.php" class="block px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-red-100 hover:text-red-600 transition flex items-center"><i class="fa fa-sign-out-alt mr-2 text-red-500"></i> Đăng xuất</a>
      </div>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-10">
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa fa-tachometer-alt text-pink-500"></i> Dashboard Admin</h1>
        <p class="text-gray-500">Chào mừng bạn đến với khu vực quản trị Old Favour Coffee.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
        <div class="bg-pink-50 rounded-2xl shadow p-6 flex flex-col items-center">
          <i class="fa fa-coffee text-3xl text-pink-500 mb-2"></i>
          <div class="font-bold text-lg text-pink-600">Sản phẩm</div>
          <div class="text-2xl font-extrabold text-gray-800">120</div>
        </div>
        <div class="bg-orange-50 rounded-2xl shadow p-6 flex flex-col items-center">
          <i class="fa fa-receipt text-3xl text-orange-500 mb-2"></i>
          <div class="font-bold text-lg text-orange-600">Đơn hàng</div>
          <div class="text-2xl font-extrabold text-gray-800">350</div>
        </div>
        <div class="bg-blue-50 rounded-2xl shadow p-6 flex flex-col items-center">
          <i class="fa fa-users text-3xl text-blue-500 mb-2"></i>
          <div class="font-bold text-lg text-blue-600">Khách hàng</div>
          <div class="text-2xl font-extrabold text-gray-800">80</div>
        </div>
        <div class="bg-green-50 rounded-2xl shadow p-6 flex flex-col items-center">
          <i class="fa fa-coins text-3xl text-green-500 mb-2"></i>
          <div class="font-bold text-lg text-green-600">Doanh thu tháng</div>
          <div class="text-2xl font-extrabold text-gray-800">120,000,000đ</div>
        </div>
      </div>
      <div class="bg-white rounded-2xl shadow p-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2"><i class="fa fa-chart-line text-pink-500"></i> Thống kê nhanh</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div>
            <div class="font-semibold text-gray-600 mb-2">Đơn hàng theo ngày</div>
            <div class="h-32 bg-gradient-to-r from-pink-100 to-orange-100 rounded-xl flex items-center justify-center text-gray-400">[Biểu đồ]</div>
          </div>
          <div>
            <div class="font-semibold text-gray-600 mb-2">Doanh thu theo ngày</div>
            <div class="h-32 bg-gradient-to-r from-green-100 to-yellow-100 rounded-xl flex items-center justify-center text-gray-400">[Biểu đồ]</div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
