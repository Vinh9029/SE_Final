<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách sản phẩm | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-gray-50 via-yellow-50 to-white min-h-screen">
  <div class="max-w-7xl mx-auto py-10">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2"><i class="fa fa-coffee text-pink-500"></i> Danh sách sản phẩm</h1>
      <a href="add.php" class="btn-orange bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-xl font-bold shadow transition flex items-center gap-2"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
    </div>
    <div class="bg-white rounded-2xl shadow p-6">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-pink-100 text-pink-700">
            <th class="px-4 py-2 rounded-tl-xl">ID</th>
            <th class="px-4 py-2">Tên sản phẩm</th>
            <th class="px-4 py-2">Giá</th>
            <th class="px-4 py-2">Loại</th>
            <th class="px-4 py-2">Ảnh</th>
            <th class="px-4 py-2 rounded-tr-xl">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <!-- Demo row -->
          <tr class="hover:bg-pink-50">
            <td class="px-4 py-2 font-bold">1</td>
            <td class="px-4 py-2">Cà phê sữa đá</td>
            <td class="px-4 py-2 text-orange-600 font-bold">25.000đ</td>
            <td class="px-4 py-2">Cà phê</td>
            <td class="px-4 py-2"><img src="../../Photos/test1.jpg" class="h-12 w-12 object-cover rounded shadow" /></td>
            <td class="px-4 py-2 flex gap-2">
              <a href="edit.php?id=1" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded font-bold"><i class="fa fa-edit"></i> Sửa</a>
              <a href="delete.php?id=1" class="bg-red-100 hover:bg-red-200 text-red-600 px-3 py-1 rounded font-bold"><i class="fa fa-trash"></i> Xóa</a>
            </td>
          </tr>
          <!-- Thêm các dòng sản phẩm khác ở đây -->
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
