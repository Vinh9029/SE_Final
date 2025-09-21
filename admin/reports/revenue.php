<div class="max-w-5xl mx-auto py-8">
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2"><i class="fa fa-coins text-purple-500"></i> Báo cáo doanh thu</h1>
  </div>
  <div class="bg-white rounded-2xl shadow-xl p-8">
    <div class="mb-6">
      <label class="block text-sm font-semibold text-gray-700 mb-1">Chọn tháng/năm</label>
      <select class="border rounded px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-purple-200 mr-2">
        <option>Tháng 9/2025</option>
        <option>Tháng 8/2025</option>
        <option>Tháng 7/2025</option>
      </select>
      <button class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-2 rounded-xl font-bold shadow transition ml-4">Xem báo cáo</button>
    </div>
    <div class="mb-8">
      <h2 class="text-lg font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa fa-chart-pie text-purple-500"></i> Biểu đồ doanh thu</h2>
      <div class="h-48 bg-gradient-to-r from-purple-100 to-yellow-100 rounded-xl flex items-center justify-center text-gray-400">[Biểu đồ doanh thu - demo]</div>
    </div>
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-purple-100 text-purple-700">
          <th class="px-4 py-2 rounded-tl-xl">Tháng</th>
          <th class="px-4 py-2">Tổng doanh thu</th>
          <th class="px-4 py-2">Số đơn hàng</th>
          <th class="px-4 py-2">Khách hàng mới</th>
          <th class="px-4 py-2 rounded-tr-xl">Tăng trưởng</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-purple-50 transition">
          <td class="px-4 py-2 font-bold">9/2025</td>
          <td class="px-4 py-2 text-purple-600 font-bold">120,000,000đ</td>
          <td class="px-4 py-2">350</td>
          <td class="px-4 py-2">15</td>
          <td class="px-4 py-2"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full font-bold">+8%</span></td>
        </tr>
        <tr class="hover:bg-purple-50 transition">
          <td class="px-4 py-2 font-bold">8/2025</td>
          <td class="px-4 py-2 text-purple-600 font-bold">110,000,000đ</td>
          <td class="px-4 py-2">320</td>
          <td class="px-4 py-2">10</td>
          <td class="px-4 py-2"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full font-bold">-3%</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
