<?php
// Demo data - Dữ liệu mẫu đơn giản
$cart_items = [
    [
        'product_id' => 1,
        'name' => 'Áo thun nam',
        'price' => 150000,
        'quantity' => 2,
        'image' => 'uploads/products/ao-thun-nam.jpg'
    ],
    [
        'product_id' => 2,
        'name' => 'Quần jean nữ',
        'price' => 300000,
        'quantity' => 1,
        'image' => 'uploads/products/quan-jean-nu.jpg'
    ]
];
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .cart-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ee5a24 0%, #ff6b6b 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-orange-600">Cửa hàng</h1>
                <a href="#" class="bg-orange-600 text-white px-4 py-2 rounded-full">
                    <i class="fas fa-shopping-cart mr-2"></i>Giỏ hàng (<?php echo count($cart_items); ?>)
                </a>
            </div>
        </div>
    </nav>

    <!-- Cart Section -->
    <div class="cart-container min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-orange-500 to-red-500 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-shopping-cart text-white text-2xl"></i>
                            <h1 class="text-2xl font-bold text-white">Giỏ hàng của bạn</h1>
                        </div>
                        <div class="text-white">
                            <span class="text-lg">Tổng cộng: </span>
                            <span class="text-2xl font-bold" id="cart-total"><?php echo number_format($total); ?>đ</span>
                        </div>
                    </div>
                </div>

                <!-- Cart Items -->
                <div class="p-6">
                    <div class="space-y-4" id="cart-items">
                        <?php foreach ($cart_items as $item): ?>
                            <div class="cart-item flex items-center gap-4 p-4 bg-gray-50 rounded-2xl" data-product-id="<?php echo $item['product_id']; ?>">
                                <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-gray-400"></i>
                                </div>

                                <div class="flex-1">
                                    <h3 class="font-bold text-lg"><?php echo $item['name']; ?></h3>
                                    <p class="text-orange-600 font-bold"><?php echo number_format($item['price']); ?>đ</p>
                                </div>

                                <div class="flex items-center gap-2">
                                    <button class="bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full" onclick="updateQuantity(<?php echo $item['product_id']; ?>, -1)">
                                        <i class="fas fa-minus text-sm"></i>
                                    </button>
                                    <input type="number" value="<?php echo $item['quantity']; ?>" class="w-16 text-center border rounded" readonly>
                                    <button class="bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full" onclick="updateQuantity(<?php echo $item['product_id']; ?>, 1)">
                                        <i class="fas fa-plus text-sm"></i>
                                    </button>
                                </div>

                                <div class="text-right">
                                    <p class="text-orange-600 font-bold subtotal" data-price="<?php echo $item['price']; ?>">
                                        <?php echo number_format($item['price'] * $item['quantity']); ?>đ
                                    </p>
                                    <button class="text-red-500 hover:text-red-700 mt-2" onclick="removeItem(<?php echo $item['product_id']; ?>)">
                                        <i class="fas fa-trash mr-1"></i>Xóa
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Cart Actions -->
                    <div class="mt-8 flex justify-between items-center">
                        <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full">
                            <i class="fas fa-arrow-left mr-2"></i>Tiếp tục mua sắm
                        </a>

                        <div class="flex gap-4">
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full" onclick="clearCart()">
                                <i class="fas fa-trash mr-2"></i>Xóa tất cả
                            </button>

                            <a href="#" class="btn-primary text-white px-8 py-3 rounded-full">
                                <i class="fas fa-credit-card mr-2"></i>Thanh toán
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateQuantity(productId, change) {
            const item = document.querySelector(`[data-product-id="${productId}"]`);
            const quantityInput = item.querySelector('input[type="number"]');
            const currentQuantity = parseInt(quantityInput.value);
            const newQuantity = currentQuantity + change;

            if (newQuantity < 1) return;

            quantityInput.value = newQuantity;
            updateSubtotal(productId, newQuantity);
            updateCartTotal();
        }

        function updateSubtotal(productId, quantity) {
            const item = document.querySelector(`[data-product-id="${productId}"]`);
            const price = parseFloat(item.querySelector('.subtotal').dataset.price);
            const subtotal = price * quantity;
            item.querySelector('.subtotal').textContent = new Intl.NumberFormat('vi-VN').format(subtotal) + 'đ';
        }

        function updateCartTotal() {
            const subtotals = document.querySelectorAll('.subtotal');
            let total = 0;

            subtotals.forEach(subtotal => {
                const price = parseFloat(subtotal.dataset.price);
                const quantity = parseInt(subtotal.closest('.cart-item').querySelector('input[type="number"]').value);
                total += price * quantity;
            });

            document.getElementById('cart-total').textContent = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
        }

        function removeItem(productId) {
            if (confirm('Xóa sản phẩm này?')) {
                const item = document.querySelector(`[data-product-id="${productId}"]`);
                item.remove();
                updateCartTotal();
            }
        }

        function clearCart() {
            if (confirm('Xóa tất cả sản phẩm?')) {
                document.querySelectorAll('.cart-item').forEach(item => item.remove());
                updateCartTotal();
            }
        }
    </script>
</body>
</html>
