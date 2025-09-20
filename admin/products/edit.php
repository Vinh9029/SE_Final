<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa sản phẩm | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-gray-50 via-yellow-50 to-white min-h-screen">
  <div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2"><i class="fa fa-edit text-yellow-500"></i> Sửa sản phẩm</h1>
    <form class="bg-white rounded-2xl shadow p-8 flex flex-col gap-6">
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Tên sản phẩm</label>
        <input type="text" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200" value="Cà phê sữa đá" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Giá</label>
        <input type="number" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200" value="25000" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Loại sản phẩm</label>
        <select class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200">
          <option selected>Cà phê</option>
          <option>Trà & Sữa</option>
          <option>Nước đặc biệt</option>
          <option>Đồ ăn kèm</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Ảnh sản phẩm</label>
        <input type="file" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-200" />
        <img src="../../Photos/test1.jpg" class="h-16 w-16 object-cover rounded shadow mt-2" />
      </div>
      <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-xl font-bold shadow transition w-fit flex items-center gap-2"><i class="fa fa-save"></i> Lưu thay đổi</button>
      <a href="#" data-page="products/list.php" class="text-pink-600 hover:underline font-semibold">Quay lại danh sách</a>
    </form>
  </div>
</body>
</html>
