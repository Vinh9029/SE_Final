<div class="max-w-5xl mx-auto py-8">
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2"><i class="fa fa-chart-line text-green-500"></i> Báo cáo thống kê doanh số</h1>
  </div>
  <div class="bg-white rounded-2xl shadow-xl p-8">
    <div class="mb-6">
      <label class="block text-sm font-semibold text-gray-700 mb-1">Chọn khoảng thời gian</label>
      <input type="date" class="border rounded px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-green-200 mr-2" />
      <span class="mx-2">-</span>
      <input type="date" class="border rounded px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-green-200" />
      <button class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-xl font-bold shadow transition ml-4">Lọc</button>
    </div>
    <div class="mb-8">
      <h2 class="text-lg font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa fa-chart-bar text-green-500"></i> Biểu đồ doanh số</h2>
      <div class="h-48 bg-gradient-to-r from-green-100 to-yellow-100 rounded-xl flex items-center justify-center text-gray-400">[Biểu đồ doanh số - demo]</div>
    </div>
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-green-100 text-green-700">
          <th class="px-4 py-2 rounded-tl-xl">Ngày</th>
          <th class="px-4 py-2">Số đơn hàng</th>
          <th class="px-4 py-2">Tổng doanh số</th>
          <th class="px-4 py-2 rounded-tr-xl">Tăng trưởng</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-green-50 transition">
          <td class="px-4 py-2 font-bold">20/09/2025</td>
          <td class="px-4 py-2">35</td>
          <td class="px-4 py-2 text-green-600 font-bold">8,750,000đ</td>
          <td class="px-4 py-2"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full font-bold">+5%</span></td>
        </tr>
        <tr class="hover:bg-green-50 transition">
          <td class="px-4 py-2 font-bold">19/09/2025</td>
          <td class="px-4 py-2">30</td>
          <td class="px-4 py-2 text-green-600 font-bold">7,500,000đ</td>
          <td class="px-4 py-2"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full font-bold">-2%</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
