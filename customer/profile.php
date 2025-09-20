<div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
  <!-- Info & Edit Form -->
  <div class="bg-pink-50 rounded-3xl shadow-xl p-8 flex-1 w-full">
    <div class="font-bold text-2xl text-pink-600 mb-4 flex items-center gap-2"><i class="fa fa-user text-pink-500"></i> Thông tin cá nhân</div>
    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Họ tên</label>
        <input type="text" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-pink-200" value="Nguyễn Văn A" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-pink-200" value="nguyenvana@gmail.com" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Số điện thoại</label>
        <input type="text" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-pink-200" value="0901234567" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Ngày sinh</label>
        <input type="date" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-pink-200" value="2000-01-01" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Giới tính</label>
        <select class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-pink-200">
          <option>Nam</option>
          <option>Nữ</option>
          <option>Khác</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Địa chỉ</label>
        <input type="text" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-pink-200" value="123 Main St, HCM" />
      </div>
    </form>
    <button type="submit" class="mt-6 btn-orange hover:bg-orange-600 text-white px-8 py-3 rounded-xl font-bold shadow transition w-fit">Lưu thay đổi</button>
  </div>
</div>
