<?php
// checkout.php - Giao diện thanh toán đồng bộ màu sắc, layout với toàn site
// Chỉ xử lý front-end, chưa kết nối backend
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán - Old Favour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .checkout-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #ee5a24 0%, #ff6b6b 100%);
        }

        .card {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px 0 rgba(102, 126, 234, 0.08);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <?php include '../../header.php'; ?>
    <main class="flex-1 checkout-gradient py-10">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row gap-8">
            <!-- Card: Thông tin thanh toán -->
            <div class="card flex-1 p-8 mb-8 lg:mb-0">
                <h2 class="text-2xl font-bold text-pink-600 mb-6 flex items-center gap-2"><i
                        class="fa fa-credit-card"></i> Thông tin thanh toán</h2>
                <form id="checkout-form">
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-pink-600 mb-4 flex items-center gap-2">
                            <i class="fas fa-user text-orange-500"></i>
                            Thông tin khách hàng
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Họ và tên *</label>
                                <input type="text" name="full_name" value="<?php echo $user_info['name']; ?>" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại *</label>
                                <input type="tel" name="phone" value="<?php echo $user_info['phone']; ?>" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" value="<?php echo $user_info['email']; ?>" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-pink-600 mb-4 flex items-center gap-2">
                            <i class="fas fa-store text-orange-500"></i>
                            Phương thức nhận hàng
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nhận tại quầy -->
                            <div class="delivery-method border-2 border-gray-200 rounded-2xl p-4 cursor-pointer transition hover:border-pink-400"
                                onclick="selectDelivery('pickup')">
                                <label class="flex items-center gap-3">
                                    <input type="radio" name="delivery_method" value="pickup" class="accent-pink-600"
                                        checked onclick="showAddress(false)">
                                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-store text-gray-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Nhận tại quầy</h3>
                                        <p class="text-sm text-gray-600">Đến quán nhận trực tiếp</p>
                                    </div>
                                </label>
                            </div>
                            <!-- Giao tận nơi -->
                            <div class="delivery-method border-2 border-gray-200 rounded-2xl p-4 cursor-pointer transition hover:border-pink-400"
                                onclick="selectDelivery('delivery')">
                                <label class="flex items-center gap-3">
                                    <input type="radio" name="delivery_method" value="delivery" class="accent-pink-600"
                                        onclick="showAddress(true)">
                                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-truck text-orange-500 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Giao tận nơi</h3>
                                        <p class="text-sm text-gray-600">Giao hàng đến địa chỉ của bạn</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Địa chỉ giao hàng -->
                    <div id="address-card" class="mb-6">
                        <!-- Shipping Information -->
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-pink-600 mb-4 flex items-center gap-2">
                                <i class="fas fa-truck text-orange-500"></i>
                                Địa chỉ giao hàng
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ *</label>
                                    <input type="text" name="address" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        placeholder="123 Đường ABC, Phường XYZ">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tỉnh/Thành phố *</label>
                                    <select name="city" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                        <option value="">Chọn tỉnh/thành phố</option>
                                        <option value="Hà Nội">Hà Nội</option>
                                        <option value="TP.HCM" selected>TP.HCM</option>
                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Cần Thơ">Cần Thơ</option>
                                        <option value="Hải Phòng">Hải Phòng</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Quận/Huyện *</label>
                                    <select name="district" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                        <option value="">Chọn quận/huyện</option>
                                        <option value="Quận 1" selected>Quận 1</option>
                                        <option value="Quận 3">Quận 3</option>
                                        <option value="Quận 7">Quận 7</option>
                                        <option value="Thủ Đức">Thủ Đức</option>
                                        <option value="Bình Thạnh">Bình Thạnh</option>
                                    </select>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú</label>
                                    <textarea name="notes" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        placeholder="Ghi chú về đơn hàng..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Payment Methods -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2 text-pink-600">
                            <i class="fas fa-money-bill-wave text-orange-500"></i>
                            Phương thức thanh toán
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Cash Payment -->
                            <div class="payment-method border-2 border-gray-200 rounded-2xl p-4 cursor-pointer"
                                onclick="selectPayment('cash')">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-money-bill-alt text-green-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Tiền mặt</h3>
                                        <p class="text-sm text-gray-600">Thanh toán khi nhận hàng</p>
                                    </div>
                                </div>
                            </div>

                            <!-- VNPay Payment -->
                            <div class="payment-method border-2 border-gray-200 rounded-2xl p-4 cursor-pointer"
                                onclick="selectPayment('vnpay')">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-qrcode text-blue-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">VNPay QR</h3>
                                        <p class="text-sm text-gray-600">Quét mã QR để thanh toán</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="payment_method" id="payment_method" required>
                    </div>
                    <button type="submit"
                        class="btn-primary text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 w-full mt-4"><i
                            class="fa fa-check mr-2"></i>Xác nhận thanh toán</button>

                </form>
            </div>
            <!-- Card: Đơn hàng -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-2xl p-6 sticky top-6">
                    <h2 class="text-2xl font-bold text-pink-600 mb-6 flex items-center gap-2"><i
                            class="fa fa-receipt"></i> Đơn hàng của bạn</h2>
                    <div class="space-y-4 mb-8" id="order-items">
                        <?php include '../cart/cart-item_checkout.php'; ?>
                    </div>
                    <div class="bg-gray-50 rounded-xl shadow p-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Tổng số lượng món:</span>
                        <span class="font-bold">3</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Tổng tiền:</span>
                        <span class="font-bold">93,000đ</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Phí giao hàng:</span>
                        <span class="font-bold">15,000đ</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Tổng thanh toán:</span>
                        <span class="font-bold text-pink-600">108,000đ</span>
                    </div>
                    <div class="flex justify-between mt-2">
                        <span class="text-gray-500 text-sm">Thời gian giao dự kiến:</span>
                        <span class="text-sm text-gray-700 font-semibold">30-45 phút</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?php include '../../footer.php'; ?>
    </main>
    <script>
        // Ẩn/hiện địa chỉ giao hàng
        function showAddress(show) {
            document.getElementById('address-card').style.display = show ? 'block' : 'none';
        }
        // Mặc định hiển thị địa chỉ giao hàng
        showAddress(false);
    </script>
</body>

</html>