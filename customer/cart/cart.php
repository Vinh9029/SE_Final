<?php
// cart1.php - Giao diện giỏ hàng mới đồng bộ màu sắc toàn site
// Chỉ xử lý front-end, chưa kết nối backend
// Copy logic lấy dữ liệu từ cart.php nếu cần tích hợp backend

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - Old Favour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .cart-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #ee5a24 0%, #ff6b6b 100%);
        }

        .cart-item-anim {
            transition: box-shadow 0.2s, background 0.2s;
        }

        .cart-item-anim:hover {
            box-shadow: 0 8px 32px 0 rgba(255, 107, 107, 0.15);
            background: #fdf6f6;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <?php include '../../header.php'; ?>
    <main class="flex-1 cart-gradient py-12">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-orange-500 to-red-500 p-6">
                    <div class="flex items-center justify-between text-pink-600">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-shopping-cart text-pink text-2xl"></i>
                            <h1 class="text-2xl font-bold text-pink">Giỏ hàng của bạn</h1>
                        </div>
                        <div class="text-white">
                            <span class="text-lg">Tổng cộng: </span>
                            <span class="text-2xl font-bold" id="cart-total">0đ</span>
                        </div>
                    </div>
                </div>
                <!-- Cart Items (Demo dữ liệu tĩnh, thay bằng PHP khi tích hợp backend) -->
                <div class="p-6">
                    <!-- Cart Table Header -->
                    <div class="mb-2 px-2">
                        <div class="grid grid-cols-12 items-center text-gray-500 font-semibold text-sm py-2 border-b border-gray-200">
                            <div class="col-span-5">Sản phẩm</div>
                            <div class="col-span-2 text-center">Đơn giá</div>
                            <div class="col-span-2 text-center">Số lượng</div>
                            <div class="col-span-2 text-center">Thành tiền</div>
                            <div class="col-span-1 text-center"></div>
                        </div>
                    </div>
                    <!-- Cart Items -->
                    <div class="space-y-4 mb-8" id="cart-items">
                        <?php include 'cart_item.php'; ?>
                    </div>
                    <!-- Voucher Section -->
                    <div class="mb-6 flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
                        <div class="flex flex-col gap-2 w-full md:w-1/2">
                            <label for="voucher-input" class="font-semibold text-gray-700">Nhập mã giảm giá</label>
                            <div class="flex gap-2">
                                <input id="voucher-input" type="text"
                                    class="border border-gray-300 rounded-lg px-3 py-2 flex-1" placeholder="Nhập mã...">
                                <button id="apply-voucher-btn"
                                    class="btn-primary text-white px-4 py-2 rounded-lg font-bold">Áp dụng</button>
                            </div>
                            <div id="voucher-success" class="hidden text-green-600 font-semibold mt-2 animate-bounce">🎉
                                Giảm giá đã được áp dụng!</div>
                            <div class="text-gray-500 text-sm mt-1">Hoặc chọn mã có sẵn:</div>
                            <div class="flex gap-2 mt-1">
                                <button
                                    class="voucher-btn bg-pink-100 hover:bg-pink-200 text-pink-600 px-3 py-1 rounded-full font-semibold"
                                    data-voucher="GIAM10">GIAM10</button>
                                <button
                                    class="voucher-btn bg-pink-100 hover:bg-pink-200 text-pink-600 px-3 py-1 rounded-full font-semibold"
                                    data-voucher="FREESHIP">FREESHIP</button>
                            </div>
                        </div>
                        <!-- Tóm tắt đơn hàng -->
                        <div class="w-full md:w-1/2 bg-gray-50 rounded-xl shadow p-4 mb-8">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-700">Tổng số lượng món:</span>
                                <span id="order-total-qty" class="font-bold">0</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-700">Tổng tiền:</span>
                                <span id="order-total-before" class="font-bold">0đ</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-700">Giảm giá:</span>
                                <span id="order-discount" class="font-bold text-green-600">0đ</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-700">Phí giao hàng:</span>
                                <span id="order-shipping" class="font-bold">15,000đ</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-700">Tổng thanh toán:</span>
                                <span id="order-total-after" class="font-bold text-pink-600">0đ</span>
                            </div>
                        </div>
                    </div <!-- Cart Actions -->
                    <div class="mt-8 flex flex-col lg:flex-row gap-4 justify-between items-center">
                        <a href="../products.php"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold transition-colors"><i
                                class="fas fa-arrow-left mr-2"></i>Tiếp tục mua sắm</a>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button
                                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold transition-colors"><i
                                    class="fas fa-trash mr-2"></i>Xóa tất cả</button>
                            <a href="../checkout/"
                                class="btn-primary text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300"><i
                                    class="fas fa-credit-card mr-2"></i>Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php include '../../footer.php'; ?>
    </main>
    <script>
        // --- VOUCHER & ĐƠN HÀNG ---
        const VOUCHERS = {
            'GIAM10': {
                type: 'percent',
                value: 10,
                label: 'Giảm 10%'
            },
            'FREESHIP': {
                type: 'shipping',
                value: 15000,
                label: 'Miễn phí giao hàng'
            }
        };
        let appliedVoucher = null;
        const SHIPPING_FEE = 15000;

        function updateCartTotal() {
            const subtotals = document.querySelectorAll('.subtotal');
            let total = 0;
            let totalQty = 0;
            subtotals.forEach(subtotal => {
                const price = parseFloat(subtotal.dataset.price);
                const quantity = parseInt(subtotal.closest('.cart-item').querySelector('.quantity-input')
                    .value);
                total += price * quantity;
                totalQty += quantity;
            });
            // Tính giảm giá
            let discount = 0;
            let shipping = SHIPPING_FEE;
            if (appliedVoucher) {
                if (appliedVoucher.type === 'percent') {
                    discount = Math.round(total * appliedVoucher.value / 100);
                } else if (appliedVoucher.type === 'shipping') {
                    shipping = 0;
                }
            }
            const totalAfter = total - discount + shipping;
            // Cập nhật UI
            document.getElementById('cart-total').textContent = new Intl.NumberFormat('vi-VN').format(totalAfter) + 'đ';
            document.getElementById('order-total-qty').textContent = totalQty;
            document.getElementById('order-total-before').textContent = new Intl.NumberFormat('vi-VN').format(total) +
                'đ';
            document.getElementById('order-discount').textContent = '-' + new Intl.NumberFormat('vi-VN').format(
                discount) + 'đ';
            document.getElementById('order-shipping').textContent = shipping === 0 ? 'Miễn phí' : new Intl.NumberFormat(
                'vi-VN').format(shipping) + 'đ';
            document.getElementById('order-total-after').textContent = new Intl.NumberFormat('vi-VN').format(
                totalAfter) + 'đ';
        }
        updateCartTotal();

        // Áp dụng voucher
        document.getElementById('apply-voucher-btn').onclick = function () {
            const code = document.getElementById('voucher-input').value.trim().toUpperCase();
            if (VOUCHERS[code]) {
                appliedVoucher = VOUCHERS[code];
                document.getElementById('voucher-success').classList.remove('hidden');
                setTimeout(() => document.getElementById('voucher-success').classList.add('hidden'), 2000);
            } else {
                appliedVoucher = null;
                alert('Mã không hợp lệ hoặc đã hết hạn!');
            }
            updateCartTotal();
        };
        // Chọn voucher có sẵn
        document.querySelectorAll('.voucher-btn').forEach(btn => {
            btn.onclick = function () {
                document.getElementById('voucher-input').value = btn.dataset.voucher;
                document.getElementById('apply-voucher-btn').click();
            };
        });
        // Tự động cập nhật khi thay đổi số lượng (demo)
        document.querySelectorAll('.quantity-btn').forEach(btn => {
            btn.onclick = function () {
                const input = btn.parentElement.querySelector('.quantity-input');
                let val = parseInt(input.value);
                if (btn.innerHTML.includes('minus')) val = Math.max(1, val - 1);
                else val = val + 1;
                input.value = val;
                updateCartTotal();
            };
        });
    </script>
</body>

</html>