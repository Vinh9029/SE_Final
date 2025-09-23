<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tài khoản khách hàng | Old Favour Coffee</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<?php include '../header.php'; ?>
<main class="bg-gradient-to-br from-pink-50 via-yellow-50 to-white min-h-screen py-10">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8">
    <!-- Sidebar trái -->
    <aside class="md:col-span-3 col-span-12 bg-white rounded-3xl shadow-2xl p-6 flex flex-col items-center sticky top-24 h-fit">
      <div class="relative mb-4">
        <img src="../Photos/logo.png" alt="Avatar" class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-yellow-400 ring-4 ring-pink-200 transition duration-300 hover:ring-yellow-400" />
        <span class="absolute bottom-2 right-2 bg-yellow-400 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">Vàng</span>
      </div>
      <div class="font-extrabold text-xl text-gray-800 mb-1">Nguyễn Văn A</div>
      <div class="text-gray-500 text-sm mb-2">nguyenvana@gmail.com</div>
      <?php include 'loyalty-point.php'; ?>
      <div class="flex items-center gap-2 mt-2 mb-4">
        <span class="font-bold text-yellow-500 text-lg">🟡 Vàng</span>
        <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full font-bold">Hạng thành viên</span>
      </div>
      <nav class="w-full mt-4">
        <ul class="flex flex-col gap-2">
          <li><a href="#" data-page="profile.php" class="block px-4 py-2 rounded-xl font-semibold text-gray-700 bg-gradient-to-r from-pink-50 to-white hover:from-pink-100 hover:to-yellow-50 hover:text-pink-600 transition flex items-center group"><i class="fa fa-user mr-2 text-pink-500 group-hover:animate-bounce"></i> Thông tin cá nhân</a></li>
          <li><a href="#" data-page="orders.php" class="block px-4 py-2 rounded-xl font-semibold text-gray-700 bg-gradient-to-r from-orange-50 to-white hover:from-orange-100 hover:to-yellow-50 hover:text-orange-600 transition flex items-center group"><i class="fa fa-box mr-2 text-orange-500 group-hover:animate-bounce"></i> Đơn hàng</a></li>
          <li><a href="#" data-page="settings.php" class="block px-4 py-2 rounded-xl font-semibold text-gray-700 bg-gradient-to-r from-yellow-50 to-white hover:from-yellow-100 hover:to-pink-50 hover:text-yellow-600 transition flex items-center group"><i class="fa fa-cog mr-2 text-yellow-500 group-hover:animate-bounce"></i> Cài đặt tài khoản</a></li>
          <li><a href="logout.php" class="block px-4 py-2 rounded-xl font-semibold text-gray-700 bg-gradient-to-r from-red-50 to-white hover:from-red-100 hover:to-pink-50 hover:text-red-600 transition flex items-center group"><i class="fa fa-sign-out-alt mr-2 text-red-500 group-hover:animate-bounce"></i> Đăng xuất</a></li>
        </ul>
      </nav>
    </aside>
    <!-- Content phải -->
    <section class="md:col-span-9 col-span-12 bg-white rounded-3xl shadow-2xl p-8 min-h-[500px]" id="account-content">
      <div class="flex flex-col items-center justify-center h-full">
        <div class="animate-pulse w-24 h-24 bg-pink-100 rounded-full mb-6"></div>
        <div class="text-center text-gray-400 mt-10">
          <i class="fa fa-info-circle text-4xl mb-4"></i>
          <div class="font-bold text-lg">Chọn mục bên trái để xem chi tiết tài khoản</div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php include '../footer.php'; ?>
<script>
// AJAX load content khi click menu sidebar
const menuLinks = document.querySelectorAll('aside nav a[data-page]');
const content = document.getElementById('account-content');
menuLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    menuLinks.forEach(l => l.classList.remove('bg-pink-200', 'text-pink-600'));
    this.classList.add('bg-pink-200', 'text-pink-600');
    content.innerHTML = `<div class='flex flex-col items-center justify-center h-full'><div class='animate-pulse w-24 h-24 bg-pink-100 rounded-full mb-6'></div><div class='text-center text-gray-400 mt-10'><i class='fa fa-spinner fa-spin text-4xl mb-4'></i><div class='font-bold text-lg'>Đang tải...</div></div></div>`;
    fetch(this.getAttribute('data-page'))
      .then(res => res.text())
      .then(html => {
        setTimeout(() => { content.innerHTML = html; }, 400);
        window.scrollTo({ top: content.offsetTop - 80, behavior: 'smooth' });
      });
  });
});
</script>
<style>
@keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
.group-hover\:animate-bounce:hover i { animation: bounce 0.6s; }
</style>
