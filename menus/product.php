<?php
include_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../database/db_connection.php';
require_once __DIR__ . '/helper.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : null;
if (!$slug) { die('Không tìm thấy sản phẩm!'); }
// Lấy sản phẩm theo slug
$stmt = $conn->query("SELECT p.*, c.name as category_name, c.description as category_desc FROM products p JOIN categories c ON p.category_id = c.category_id");
$products = $stmt->fetch_all(MYSQLI_ASSOC);
$product = null;
foreach ($products as $p) {
    if (generateSlug($p['name']) === $slug) {
        $product = $p;
        break;
    }
}
if (!$product) { die('Sản phẩm không tồn tại!'); }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Chi tiết sản phẩm | Old Favour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .btn-orange { background: #FF7A00; }
        .btn-orange:hover { background: #ff9800; }
        .footer-bg { background: #3d2c1a; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <?php include_once __DIR__ . '/../includes/header.php'; ?>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="text-lg font-extrabold flex items-center mb-6" aria-label="Breadcrumb">
            <a href="../index.php" class="text-pink-500 hover:text-pink-600">Trang chủ</a>
            <span class="mx-2 text-pink-300 font-bold">/</span>
            <a href="menus.php?cat=<?php echo generateSlug($product['category_name']); ?>" class="text-pink-500 hover:text-pink-600"><?php echo $product['category_name']; ?></a>
            <span class="mx-2 text-pink-300 font-bold">/</span>
            <span class="text-pink-600"><?php echo $product['name']; ?></span>
        </nav>
        <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col md:flex-row gap-8 items-center">
            <div class="flex-shrink-0">
                <img src="<?php echo $product['image'] ?: '../Photos/placeholder.png'; ?>" alt="<?php echo $product['name']; ?>" class="w-64 h-64 object-cover rounded-xl shadow bg-gray-100 border-2 border-pink-100" />
            </div>
            <div class="flex-1 flex flex-col justify-center">
                <h1 class="font-extrabold text-pink-600 text-3xl mb-2"><?php echo $product['name']; ?></h1>
                <div class="text-orange-600 font-bold text-2xl mb-4"><?php echo number_format($product['price'], 0, ',', '.'); ?> đ</div>
                <div class="mb-4 text-gray-700 text-base leading-relaxed"><?php echo $product['description'] ?: '<span class="italic text-gray-400">Chưa có mô tả cho sản phẩm này.</span>'; ?></div>
                <div class="flex gap-4 mt-6">
                    <button class="btn-orange hover:bg-orange-600 text-white px-8 py-3 rounded-xl font-bold text-lg shadow transition duration-200"><i class="fa fa-shopping-cart mr-2"></i>Đặt món ngay</button>
                    <a href="menus.php?cat=<?php echo generateSlug($product['category_name']); ?>" class="bg-gray-100 hover:bg-pink-100 text-pink-600 px-6 py-3 rounded-xl font-bold text-lg shadow transition duration-200"><i class="fa fa-arrow-left mr-2"></i>Quay lại menu</a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
