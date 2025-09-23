<div class="flex flex-col items-center justify-center h-full py-20">
  <div class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center">
    <i class="fa fa-sign-out-alt text-red-500 text-5xl mb-4 animate-bounce"></i>
    <div class="font-bold text-xl text-gray-800 mb-2">Bạn có chắc muốn đăng xuất?</div>
    <div class="text-gray-500 mb-6">Sau khi đăng xuất, bạn sẽ cần đăng nhập lại để sử dụng các dịch vụ.</div>
    <a href="../user.php" class="btn-orange hover:bg-orange-600 text-white px-8 py-3 rounded-xl font-bold shadow transition mb-2">Đăng xuất</a>
    <a href="account.php" class="text-pink-600 hover:underline font-semibold">Quay lại tài khoản</a>
  </div>
</div>
<style>
@keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
.animate-bounce { animation: bounce 0.7s infinite; }
</style>
