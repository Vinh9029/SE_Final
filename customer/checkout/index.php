<?php
session_start();
require_once '../../includes/config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: ../account.php');
    exit();
}

// Lấy thông tin user
$user_id = $_SESSION['user_id'];

// Lấy thông tin giỏ hàng
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
    // Fallback to session
    $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total = isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0;
}

// Nếu giỏ hàng trống, chuyển về trang chủ
if (empty($cart_items)) {
    header('Location: ../cart/');
    exit();
}

// Lấy thông tin user để điền sẵn form
$user_info = [];
try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user_info = $stmt->get_result()->fetch_assoc();
} catch (Exception $e) {
    // Use default values
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán - Cửa hàng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .checkout-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ee5a24 0%, #ff6b6b 100%);
        }
        .btn-success {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #45a049 0%, #4CAF50 100%);
        }
        .payment-method {
            transition: all 0.3s ease;
        }
        .payment-method:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .payment-method.active {
            border: 3px solid #ff6b6b;
            background: #fff5f5;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <?php include '../includes/header.php'; ?>

    <!-- Checkout Section -->
    <div class="checkout-container min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Checkout Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-orange-500 to-red-500 p-6">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-credit-card text-white text-2xl"></i>
                                <h1 class="text-2xl font-bold text-white">Thông tin thanh toán</h1>
                            </div>
                        </div>

                        <form id="checkout-form" class="p-6">
                            <!-- Customer Information -->
                            <div class="mb-8">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <i class="fas fa-user text-orange-500"></i>
                                    Thông tin khách hàng
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Họ và tên *</label>
                                        <input type="text" name="full_name" value="<?php echo $user_info['name'] ?? ''; ?>" required
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại *</label>
                                        <input type="tel" name="phone" value="<?php echo $user_info['phone'] ?? ''; ?>" required
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                        <input type="email" name="email" value="<?php echo $user_info['email'] ?? ''; ?>" required
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Information -->
                            <div class="mb-8">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <i class="fas fa-truck text-orange-500"></i>
                                    Địa chỉ giao hàng
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ *</label>
                                        <input type="text" name="address" required
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tỉnh/Thành phố *</label>
                                        <select name="city" required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                            <option value="">Chọn tỉnh/thành phố</option>
                                            <option value="Hà Nội">Hà Nội</option>
                                            <option value="TP.HCM">TP.HCM</option>
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

                            <!-- Payment Methods -->
                            <div class="mb-8">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <i class="fas fa-money-bill-wave text-orange-500"></i>
                                    Phương thức thanh toán
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Cash Payment -->
                                    <div class="payment-method border-2 border-gray-200 rounded-2xl p-4 cursor-pointer" onclick="selectPayment('cash')">
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
                                    <div class="payment-method border-2 border-gray-200 rounded-2xl p-4 cursor-pointer" onclick="selectPayment('vnpay')">
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

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="btn-primary text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300">
                                    <i class="fas fa-shopping-cart mr-2"></i>
                                    Đặt hàng ngay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-2xl p-6 sticky top-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                            <i class="fas fa-receipt text-orange-500"></i>
                            Đơn hàng
                        </h2>

                        <!-- Order Items -->
                        <div class="space-y-4 mb-6">
                            <?php foreach ($cart_items as $item): ?>
                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                        <i class="fas fa-box text-gray-400"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-sm"><?php echo $item['name']; ?></h4>
                                        <p class="text-xs text-gray-600">SL: <?php echo $item['quantity']; ?></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-orange-600"><?php echo number_format($item['price'] * $item['quantity']); ?>đ</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Order Total -->
                        <div class="border-t pt-4">
                            <div class="flex justify-between items-center text-lg font-bold">
                                <span>Tổng cộng:</span>
                                <span class="text-orange-600" id="order-total"><?php echo number_format($total); ?>đ</span>
                            </div>
                        </div>

                        <!-- Discount Code -->
                        <div class="mt-4">
                            <input type="text" placeholder="Nhập mã giảm giá" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                            <button class="w-full mt-2 bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium transition-colors">
                                Áp dụng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

    <script>
        // Select payment method
        function selectPayment(method) {
            // Remove active class from all payment methods
            document.querySelectorAll('.payment-method').forEach(pm => {
                pm.classList.remove('active');
            });

            // Add active class to selected method
            event.currentTarget.classList.add('active');

            // Set payment method value
            document.getElementById('payment_method').value = method;

            // Show different content based on payment method
            if (method === 'vnpay') {
                showVNPayInfo();
            } else {
                hideVNPayInfo();
            }
        }

        function showVNPayInfo() {
            // You can add VNPay specific information here
            console.log('VNPay payment selected');
        }

        function hideVNPayInfo() {
            // Hide VNPay specific information
            console.log('Cash payment selected');
        }

        // Form submission
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const paymentMethod = document.getElementById('payment_method').value;
            if (!paymentMethod) {
                alert('Vui lòng chọn phương thức thanh toán');
                return;
            }

            // Submit form data
            const formData = new FormData(this);

            fetch('process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (paymentMethod === 'vnpay') {
                        // Redirect to VNPay
                        window.location.href = data.payment_url;
                    } else {
                        // Show success message for cash payment
                        alert('Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng.');
                        window.location.href = '../orders/';
                    }
                } else {
                    alert('Có lỗi xảy ra: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi xử lý đơn hàng');
            });
        });

        // Auto-fill district based on city
        document.querySelector('[name="city"]').addEventListener('change', function() {
            const districtSelect = document.querySelector('[name="district"]');
            const districts = {
                'Hà Nội': ['Ba Đình', 'Hoàn Kiếm', 'Tây Hồ', 'Cầu Giấy', 'Đống Đa'],
                'TP.HCM': ['Quận 1', 'Quận 3', 'Quận 7', 'Thủ Đức', 'Bình Thạnh'],
                'Đà Nẵng': ['Hải Châu', 'Thanh Khê', 'Sơn Trà', 'Ngũ Hành Sơn'],
                'Cần Thơ': ['Ninh Kiều', 'Bình Thủy', 'Cái Răng', 'Ô Môn'],
                'Hải Phòng': ['Hồng Bàng', 'Ngô Quyền', 'Lê Chân', 'Hải An']
            };

            districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
            if (districts[this.value]) {
                districts[this.value].forEach(district => {
                    districtSelect.innerHTML += `<option value="${district}">${district}</option>`;
                });
            }
        });
    </script>
</body>
</html>
