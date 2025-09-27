<?php
include_once '../../database/db_connection.php';
$sql = "SELECT p.product_id, p.name, c.name AS category, p.price, p.is_signature, p.created_at FROM products p LEFT JOIN categories c ON p.category_id = c.category_id ORDER BY p.created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách sản phẩm | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    th.sortable { cursor: pointer; user-select: none; }
    th.sortable:hover { background: #ffe4b5; }
    th.sorted-asc:after { content: ' \25B2'; color: #fc466b; }
    th.sorted-desc:after { content: ' \25BC'; color: #fc466b; }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-yellow-50 to-white min-h-screen">
  <div class="max-w-7xl mx-auto py-10">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2"><i class="fa fa-coffee text-pink-500"></i> Danh sách sản phẩm</h1>
      <a href="products/add.php" class="btn-orange bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-xl font-bold shadow transition flex items-center gap-2"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
    </div>
    <div class="bg-white rounded-xl shadow p-8">
      <h2 class="text-2xl font-bold mb-6 text-orange-600 flex items-center gap-2"><i class="fa fa-coffee"></i> Danh sách sản phẩm</h2>
      <a href="add.php" class="mb-4 inline-block px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 font-semibold"><i class="fa fa-plus mr-1"></i> Thêm sản phẩm</a>
      <table id="productTable" class="min-w-full table-auto border-collapse">
        <thead>
          <tr class="bg-orange-100 text-orange-700">
            <th class="px-4 py-2 sortable" data-sort="product_id">ID</th>
            <th class="px-4 py-2 sortable" data-sort="name">Tên sản phẩm</th>
            <th class="px-4 py-2 sortable" data-sort="category">Danh mục</th>
            <th class="px-4 py-2 sortable" data-sort="price">Giá</th>
            <th class="px-4 py-2 sortable" data-sort="is_signature">Signature</th>
            <th class="px-4 py-2 sortable" data-sort="created_at">Ngày tạo</th>
            <th class="px-4 py-2">Sửa</th>
            <th class="px-4 py-2">Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
          <tr class="border-b">
            <td class="px-4 py-2" data-value="<?= $row['product_id'] ?>"><?= $row['product_id'] ?></td>
            <td class="px-4 py-2" data-value="<?= htmlspecialchars($row['name']) ?>"><?= htmlspecialchars($row['name']) ?></td>
            <td class="px-4 py-2" data-value="<?= htmlspecialchars($row['category']) ?>"><?= htmlspecialchars($row['category']) ?></td>
            <td class="px-4 py-2" data-value="<?= $row['price'] ?>"><?= number_format($row['price'], 0, ',', '.') ?>đ</td>
            <td class="px-4 py-2" data-value="<?= $row['is_signature'] ?>"><?= $row['is_signature'] ? '<span class="text-orange-600 font-bold">✔</span>' : '' ?></td>
            <td class="px-4 py-2" data-value="<?= $row['created_at'] ?>"><?= $row['created_at'] ?></td>
            <td class="px-4 py-2"><a href="edit.php?id=<?= $row['product_id'] ?>" class="text-orange-500 hover:underline">Sửa</a></td>
            <td class="px-4 py-2"><a href="delete.php?id=<?= $row['product_id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</a></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    // Table sorting
    document.querySelectorAll('th.sortable').forEach(function(th) {
      th.addEventListener('click', function() {
        const table = document.getElementById('productTable');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const idx = Array.from(th.parentNode.children).indexOf(th);
        const sortKey = th.getAttribute('data-sort');
        let asc = !th.classList.contains('sorted-asc');
        // Remove sort classes from all headers
        table.querySelectorAll('th').forEach(h => h.classList.remove('sorted-asc', 'sorted-desc'));
        th.classList.add(asc ? 'sorted-asc' : 'sorted-desc');
        // Sort rows
        rows.sort(function(a, b) {
          let va = a.children[idx].getAttribute('data-value');
          let vb = b.children[idx].getAttribute('data-value');
          // Numeric sort for price, id
          if (['product_id', 'price', 'is_signature'].includes(sortKey)) {
            va = parseFloat(va) || 0;
            vb = parseFloat(vb) || 0;
          }
          return asc ? (va > vb ? 1 : va < vb ? -1 : 0) : (va < vb ? 1 : va > vb ? -1 : 0);
        });
        // Re-append sorted rows
        rows.forEach(r => tbody.appendChild(r));
      });
    });
  </script>
</body>
</html>
