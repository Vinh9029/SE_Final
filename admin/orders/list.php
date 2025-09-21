<div class="max-w-7xl mx-auto py-8">
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2"><i class="fa fa-receipt text-yellow-500"></i> Danh sách đơn hàng</h1>
  </div>
  <div class="bg-white rounded-2xl shadow-xl p-6">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-yellow-100 text-yellow-700">
          <th class="px-4 py-2 rounded-tl-xl">Mã đơn</th>
          <th class="px-4 py-2">Khách hàng</th>
          <th class="px-4 py-2">Ngày đặt</th>
          <th class="px-4 py-2">Tổng tiền</th>
          <th class="px-4 py-2">Trạng thái</th>
          <th class="px-4 py-2 rounded-tr-xl">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-yellow-50 transition">
          <td class="px-4 py-2 font-bold">DH001</td>
          <td class="px-4 py-2">Nguyễn Văn A</td>
          <td class="px-4 py-2">21/09/2025</td>
          <td class="px-4 py-2 text-orange-600 font-bold">120.000đ</td>
          <td class="px-4 py-2"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full font-bold">Đã giao</span></td>
          <td class="px-4 py-2 flex gap-2">
            <a href="#" data-page="orders/detail.php?id=DH001" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded font-bold shadow transition flex items-center gap-1"><i class="fa fa-eye"></i> Xem</a>
          </td>
        </tr>
        <tr class="hover:bg-yellow-50 transition">
          <td class="px-4 py-2 font-bold">DH002</td>
          <td class="px-4 py-2">Trần Thị B</td>
          <td class="px-4 py-2">20/09/2025</td>
          <td class="px-4 py-2 text-orange-600 font-bold">75.000đ</td>
          <td class="px-4 py-2"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full font-bold">Đang xử lý</span></td>
          <td class="px-4 py-2 flex gap-2">
            <a href="#" data-page="orders/detail.php?id=DH002" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded font-bold shadow transition flex items-center gap-1"><i class="fa fa-eye"></i> Xem</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
