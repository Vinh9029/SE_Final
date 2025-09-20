<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xóa sản phẩm | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-gray-50 via-yellow-50 to-white min-h-screen">
  <div class="max-w-xl mx-auto py-20">
    <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center">
      <i class="fa fa-trash text-red-500 text-5xl mb-4 animate-bounce"></i>
      <div class="font-bold text-xl text-gray-800 mb-2">Bạn có chắc muốn xóa sản phẩm này?</div>
      <div class="text-gray-500 mb-6">Hành động này không thể hoàn tác.</div>
      <form method="post" class="w-full flex flex-col gap-4">
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl font-bold shadow transition mb-2 flex items-center gap-2"><i class="fa fa-trash"></i> Xác nhận xóa</button>
        <a href="list.php" class="text-pink-600 hover:underline font-semibold">Quay lại danh sách</a>
      </form>
    </div>
  </div>
  <style>
    @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
    .animate-bounce { animation: bounce 0.7s infinite; }
  </style>
</body>
</html>
