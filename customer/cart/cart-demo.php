<?php
// Demo data - Dữ liệu mẫu để xem giao diện
$cart_items = [
    [
        'product_id' => 1,
        'name' => 'Áo thun nam cổ tròn',
        'price' => 150000,
        'quantity' => 2,
        'image' => 'uploads/products/ao-thun-nam.jpg'
    ],
    [
        'product_id' => 2,
        'name' => 'Quần jean nữ skinny',
        'price' => 300000,
        'quantity' => 1,
        'image' => 'uploads/products/quan-jean-nu.jpg'
    ],
    [
        'product_id' => 3,
        'name' => 'Giày sneaker trắng',
        'price' => 450000,
        'quantity' => 1,
        'image' => 'uploads/products/giay-sneaker.jpg'
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
        .quantity-btn:hover {
            transform: scale(1.1);
        }
        .cart-item {
            transition: all 0.3s ease;
        }
        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header giả lập -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <i class="fas fa-store text-orange-500 text-2xl"></i>
                    <h1 class="text-2xl font-bold text-orange-600">Cửa hàng</h1>
                </div>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">
                        <i class="fas fa-home mr-1"></i>Trang chủ
                    </a>
                    <a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">
                        <i class="fas fa-box mr-1"></i>Sản phẩm
                    </a>
                    <a href="#" class="bg-orange-600 text-white px-4 py-2 rounded-full hover:bg-orange-700 transition-colors">
                        <i class="fas fa-shopping-cart mr-2"></i>Giỏ hàng (<?php echo count($cart_items); ?>)
                    </a>
                    <a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">
                        <i class="fas fa-user mr-1"></i>Đăng nhập
                    </a>
                </div>
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
                    <?php if (empty($cart_items)): ?>
                        <!-- Empty Cart -->
                        <div class="text-center py-16">
                            <i class="fas fa-shopping-cart text-gray-300 text-8xl mb-6"></i>
                            <h2 class="text-2xl font-bold text-gray-600 mb-4">Giỏ hàng trống</h2>
                            <p class="text-gray-500 mb-8">Hãy thêm một số sản phẩm vào giỏ hàng của bạn</p>
                            <a href="#" class="btn-primary text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300">
                                <i class="fas fa-store mr-2"></i>Tiếp tục mua sắm
                            </a>
                        </div>
                    <?php else: ?>
                        <!-- Cart Items List -->
                        <div class="space-y-4" id="cart-items">
                            <?php foreach ($cart_items as $item): ?>
                                <div class="cart-item flex items-center gap-4 p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors" data-product-id="<?php echo $item['product_id']; ?>">
                                    <div class="w-20 h-20 bg-white rounded-xl overflow-hidden shadow-md flex items-center justify-center">
                                        <i class="fas fa-box text-gray-400 text-2xl"></i>
                                    </div>

                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg text-gray-800 mb-1"><?php echo $item['name']; ?></h3>
                                        <p class="text-orange-600 font-bold text-xl"><?php echo number_format($item['price']); ?>đ</p>
                                        <p class="text-sm text-gray-500">Mã SP: #<?php echo $item['product_id']; ?></p>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center gap-2">
                                            <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200" onclick="updateQuantity(<?php echo $item['product_id']; ?>, -1)">
                                                <i class="fas fa-minus text-sm"></i>
                                            </button>
                                            <input type="number" value="<?php echo $item['quantity']; ?>" class="quantity-input w-20 text-center border-2 border-gray-300 rounded-lg py-2 font-bold" readonly>
                                            <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200" onclick="updateQuantity(<?php echo $item['product_id']; ?>, 1)">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="text-right min-w-32">
                                        <p class="text-orange-600 font-bold text-lg subtotal mb-2" data-price="<?php echo $item['price']; ?>">
                                            <?php echo number_format($item['price'] * $item['quantity']); ?>đ
                                        </p>
                                        <button class="remove-btn text-red-500 hover:text-red-700 transition-colors" onclick="removeItem(<?php echo $item['product_id']; ?>)">
                                            <i class="fas fa-trash mr-1"></i>Xóa
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Cart Summary -->
                        <div class="mt-8 bg-gray-50 rounded-2xl p-6">
                            <div class="flex justify-between items-center text-lg font-bold">
                                <span>Tổng số sản phẩm:</span>
                                <span><?php echo count($cart_items); ?> sản phẩm</span>
                            </div>
                            <div class="flex justify-between items-center text-2xl font-bold text-orange-600 mt-2">
                                <span>Tổng tiền:</span>
                                <span id="final-total"><?php echo number_format($total); ?>đ</span>
                            </div>
                        </div>

                        <!-- Cart Actions -->
                        <div class="mt-8 flex flex-col lg:flex-row gap-4 justify-between items-center">
                            <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Tiếp tục mua sắm
                            </a>

                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold transition-colors" onclick="clearCart()">
                                    <i class="fas fa-trash mr-2"></i>Xóa tất cả
                                </button>

                                <a href="#" class="btn-primary text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300">
                                    <i class="fas fa-credit-card mr-2"></i>Thanh toán
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Demo Info -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6">
                <div class="flex items-start gap-3">
                    <i class="fas fa-info-circle text-blue-500 text-xl mt-1"></i>
                    <div>
                        <h3 class="font-bold text-blue-800 mb-2">Đây là phiên bản Demo</h3>
                        <ul class="text-blue-700 space-y-1 text-sm">
                            <li>• Dữ liệu mẫu để xem giao diện</li>
                            <li>• Tất cả chức năng JavaScript hoạt động</li>
                            <li>• Để sử dụng thật, cần tích hợp database</li>
                            <li>• File gốc: cart.php (đã có đầy đủ code PHP)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer giả lập -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center items-center gap-3 mb-4">
                <i class="fas fa-store text-orange-400 text-2xl"></i>
                <h2 class="text-xl font-bold">Cửa hàng</h2>
            </div>
            <p class="mb-4">&copy; 2024 Cửa hàng. Tất cả quyền được bảo lưu.</p>
            <div class="flex justify-center gap-6">
                <a href="#" class="text-gray-300 hover:text-orange-400 transition-colors">
                    <i class="fas fa-phone mr-1"></i>Liên hệ
                </a>
                <a href="#" class="text-gray-300 hover:text-orange-400 transition-colors">
                    <i class="fas fa-info-circle mr-1"></i>Giới thiệu
                </a>
                <a href="#" class="text-gray-300 hover:text-orange-400 transition-colors">
                    <i class="fas fa-question-circle mr-1"></i>Hỗ trợ
                </a>
            </div>
        </div>
    </footer>

    <script>
        // Update quantity
        function updateQuantity(productId, change) {
            const item = document.querySelector(`[data-product-id="${productId}"]`);
            const quantityInput = item.querySelector('.quantity-input');
            const currentQuantity = parseInt(quantityInput.value);
            const newQuantity = currentQuantity + change;

            if (newQuantity < 1) {
                alert('Số lượng không thể nhỏ hơn 1');
                return;
            }

            quantityInput.value = newQuantity;
            updateSubtotal(productId, newQuantity);
            updateCartTotal();

            // Hiệu ứng animation
            quantityInput.style.transform = 'scale(1.1)';
            setTimeout(() => {
                quantityInput.style.transform = 'scale(1)';
            }, 200);
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
            document.getElementById('final-total').textContent = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
        }

        // Remove item
        function removeItem(productId) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                const item = document.querySelector(`[data-product-id="${productId}"]`);
                item.style.transform = 'translateX(100%)';
                item.style.opacity = '0';

                setTimeout(() => {
                    item.remove();
                    updateCartTotal();

                    // Check if cart is empty
                    const cartItems = document.querySelectorAll('.cart-item');
                    if (cartItems.length === 0) {
                        location.reload();
                    }
                }, 300);
            }
        }

        // Clear cart
        function clearCart() {
            if (confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng?')) {
                const cartItems = document.querySelectorAll('.cart-item');
                cartItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.transform = 'translateX(100%)';
                        item.style.opacity = '0';
                    }, index * 100);
                });

                setTimeout(() => {
                    location.reload();
                }, cartItems.length * 100 + 300);
            }
        }

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate cart items on load
            const cartItems = document.querySelectorAll('.cart-item');
            cartItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    item.style.transition = 'all 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Add hover effects to buttons
            const buttons = document.querySelectorAll('button, a');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
