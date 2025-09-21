<!-- <?php
session_start();
require_once '../../includes/config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: ../account.php');
    exit();
}

// Lấy thông tin user
$user_id = $_SESSION['user_id'];

// Lấy giỏ hàng từ database (hoặc session nếu chưa có database)
$cart_items = [];
$total = 0;

try {
    $stmt = $conn->prepare("SELECT c.*, p.name, p.price, p.image FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
        $total += $row['price'] * $row['quantity'];
    }
} catch (Exception $e) {
    // Nếu chưa có bảng cart, lấy từ session
    $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total = isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0;
}
?> -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - Cửa hàng</title>
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
    <?php include '../includes/header.php'; ?>

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
                    <?php if (empty($cart_items)): ?>
                        <!-- Empty Cart -->
                        <div class="text-center py-16">
                            <i class="fas fa-shopping-cart text-gray-300 text-8xl mb-6"></i>
                            <h2 class="text-2xl font-bold text-gray-600 mb-4">Giỏ hàng trống</h2>
                            <p class="text-gray-500 mb-8">Hãy thêm một số sản phẩm vào giỏ hàng của bạn</p>
                            <a href="../products.php" class="btn-primary text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300">
                                <i class="fas fa-store mr-2"></i>Tiếp tục mua sắm
                            </a>
                        </div>
                    <?php else: ?>
                        <!-- Cart Items List -->
                        <div class="space-y-4" id="cart-items">
                            <?php foreach ($cart_items as $item): ?>
                                <div class="cart-item flex items-center gap-4 p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors" data-product-id="<?php echo $item['product_id']; ?>">
                                    <div class="w-20 h-20 bg-white rounded-xl overflow-hidden shadow-md">
                                        <img src="../../<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="w-full h-full object-cover">
                                    </div>

                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg text-gray-800"><?php echo $item['name']; ?></h3>
                                        <p class="text-orange-600 font-bold text-xl"><?php echo number_format($item['price']); ?>đ</p>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center gap-2">
                                            <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors" onclick="updateQuantity(<?php echo $item['product_id']; ?>, -1)">
                                                <i class="fas fa-minus text-sm"></i>
                                            </button>
                                            <input type="number" value="<?php echo $item['quantity']; ?>" class="quantity-input w-16 text-center border-2 border-gray-300 rounded-lg py-1" readonly>
                                            <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center transition-colors" onclick="updateQuantity(<?php echo $item['product_id']; ?>, 1)">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-orange-600 font-bold text-lg subtotal" data-price="<?php echo $item['price']; ?>">
                                            <?php echo number_format($item['price'] * $item['quantity']); ?>đ
                                        </p>
                                        <button class="remove-btn text-red-500 hover:text-red-700 mt-2" onclick="removeItem(<?php echo $item['product_id']; ?>)">
                                            <i class="fas fa-trash mr-1"></i>Xóa
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Cart Actions -->
                        <div class="mt-8 flex flex-col lg:flex-row gap-4 justify-between items-center">
                            <a href="../products.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Tiếp tục mua sắm
                            </a>

                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold transition-colors" onclick="clearCart()">
                                    <i class="fas fa-trash mr-2"></i>Xóa tất cả
                                </button>

                                <a href="../checkout/" class="btn-primary text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300">
                                    <i class="fas fa-credit-card mr-2"></i>Thanh toán
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

    <script>
        // Update quantity
        function updateQuantity(productId, change) {
            const item = document.querySelector(`[data-product-id="${productId}"]`);
            const quantityInput = item.querySelector('.quantity-input');
            const currentQuantity = parseInt(quantityInput.value);
            const newQuantity = currentQuantity + change;

            if (newQuantity < 1) return;

            // Gửi request AJAX để cập nhật
            fetch('update.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: newQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    quantityInput.value = newQuantity;
                    updateSubtotal(productId, newQuantity);
                    updateCartTotal();
                }
            });
        }

        // Update subtotal for an item
        function updateSubtotal(productId, quantity) {
            const item = document.querySelector(`[data-product-id="${productId}"]`);
            const price = parseFloat(item.querySelector('.subtotal').dataset.price);
            const subtotal = price * quantity;
            item.querySelector('.subtotal').textContent = new Intl.NumberFormat('vi-VN').format(subtotal) + 'đ';
        }

        // Update cart total
        function updateCartTotal() {
            const subtotals = document.querySelectorAll('.subtotal');
            let total = 0;

            subtotals.forEach(subtotal => {
                const price = parseFloat(subtotal.dataset.price);
                const quantity = parseInt(subtotal.closest('.cart-item').querySelector('.quantity-input').value);
                total += price * quantity;
            });

            document.getElementById('cart-total').textContent = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
        }

        // Remove item
        function removeItem(productId) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                fetch('remove.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const item = document.querySelector(`[data-product-id="${productId}"]`);
                        item.remove();
                        updateCartTotal();

                        // Check if cart is empty
                        const cartItems = document.querySelectorAll('.cart-item');
                        if (cartItems.length === 0) {
                            location.reload();
                        }
                    }
                });
            }
        }

        // Clear cart
        function clearCart() {
            if (confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm?')) {
                fetch('clear.php', {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
            }
        }
    </script>
</body>
</html>
