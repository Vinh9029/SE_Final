<div class="max-w-7xl mx-auto py-8">
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2"><i class="fa fa-users text-blue-500"></i> Danh sách khách hàng</h1>
  </div>
  <div class="bg-white rounded-2xl shadow-xl p-6">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-blue-100 text-blue-700">
          <th class="px-4 py-2 rounded-tl-xl">ID</th>
          <th class="px-4 py-2">Tên khách hàng</th>
          <th class="px-4 py-2">Email</th>
          <th class="px-4 py-2">Số điện thoại</th>
          <th class="px-4 py-2">Ngày đăng ký</th>
          <th class="px-4 py-2 rounded-tr-xl">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-blue-50 transition">
          <td class="px-4 py-2 font-bold">KH001</td>
          <td class="px-4 py-2">Nguyễn Văn A</td>
          <td class="px-4 py-2">nguyenvana@email.com</td>
          <td class="px-4 py-2">0901234567</td>
          <td class="px-4 py-2">21/09/2024</td>
          <td class="px-4 py-2 flex gap-2">
            <a href="orders/detail.php" data-page="customers/detail.php?id=KH001" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded font-bold shadow transition flex items-center gap-1"><i class="fa fa-eye"></i> Xem</a>
          </td>
        </tr>
        <tr class="hover:bg-blue-50 transition">
          <td class="px-4 py-2 font-bold">KH002</td>
          <td class="px-4 py-2">Trần Thị B</td>
          <td class="px-4 py-2">tranthib@email.com</td>
          <td class="px-4 py-2">0909876543</td>
          <td class="px-4 py-2">20/09/2024</td>
          <td class="px-4 py-2 flex gap-2">
            <a href="#" data-page="customers/detail.php?id=KH002" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded font-bold shadow transition flex items-center gap-1"><i class="fa fa-eye"></i> Xem</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
