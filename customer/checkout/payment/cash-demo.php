<?php
// Demo data
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : rand(1000, 9999);
$amount = 1200000; // 1,200,000 VND
$customer_info = [
    'name' => 'Nguyễn Văn A',
    'phone' => '0123456789',
    'email' => 'nguyenvana@example.com'
];
$shipping_address = '123 Đường ABC, Quận 1, TP.HCM';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền mặt - Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .payment-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-success {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #45a049 0%, #4CAF50 100%);
        }
        .order-card {
            transition: all 0.3s ease;
        }
        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <i class="fas fa-store text-orange-500 text-2xl"></i>
                    <h1 class="text-2xl font-bold text-orange-600">Cửa hàng</h1>
                </div>
                <div class="flex items-center gap-4">
                    <a href="../checkout-demo.php" class="text-gray-600 hover:text-orange-600">
                        <i class="fas fa-arrow-left mr-1"></i>Quay lại
                    </a>
                    <span class="bg-green-600 text-white px-4 py-2 rounded-full">
                        <i class="fas fa-check-circle mr-2"></i>Cash Demo
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Payment Section -->
    <div class="payment-container min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Success Message -->
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-8">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-2xl"></i>
                        <div>
                            <h2 class="font-bold text-lg">Đặt hàng thành công!</h2>
                            <p>Đơn hàng của bạn đã được tiếp nhận và đang chờ xác nhận.</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Order Details -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                            <!-- Header -->
                            <div class="bg-gradient-to-r from-green-500 to-blue-500 p-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-receipt text-white text-2xl"></i>
                                        <h1 class="text-2xl font-bold text-white">Đơn hàng #<?php echo $order_id; ?></h1>
                                    </div>
                                    <div class="text-white">
                                        <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm">
                                            <i class="fas fa-clock mr-1"></i>Chờ xác nhận
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <!-- Customer Info -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                        <i class="fas fa-user text-green-500"></i>
                                        Thông tin khách hàng
                                    </h3>
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <p class="text-sm text-gray-600">Họ và tên</p>
                                                <p class="font-medium"><?php echo $customer_info['name']; ?></p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Số điện thoại</p>
                                                <p class="font-medium"><?php echo $customer_info['phone']; ?></p>
                                            </div>
                                            <div class="md:col-span-2">
                                                <p class="text-sm text-gray-600">Email</p>
                                                <p class="font-medium"><?php echo $customer_info['email']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipping Info -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                        <i class="fas fa-truck text-blue-500"></i>
                                        Địa chỉ giao hàng
                                    </h3>
                                    <div class="bg-blue-50 rounded-xl p-4">
                                        <p class="font-medium"><?php echo $shipping_address; ?></p>
                                        <div class="mt-3 pt-3 border-t border-blue-200">
                                            <p class="text-sm text-gray-600">Ghi chú:</p>
                                            <p class="text-sm">Giao hàng trong giờ hành chính</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Info -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                        <i class="fas fa-money-bill-wave text-orange-500"></i>
                                        Phương thức thanh toán
                                    </h3>
                                    <div class="bg-orange-50 rounded-xl p-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-money-bill-alt text-green-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">Tiền mặt</p>
                                                <p class="text-sm text-gray-600">Thanh toán khi nhận hàng</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Next Steps -->
                                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
                                    <h4 class="font-bold text-yellow-800 mb-2">Các bước tiếp theo:</h4>
                                    <ul class="text-yellow-700 space-y-1 text-sm">
                                        <li>• Chúng tôi sẽ gọi điện xác nhận đơn hàng trong 30 phút</li>
                                        <li>• Thời gian giao hàng: 1-3 ngày làm việc</li>
                                        <li>• Vui lòng chuẩn bị tiền mặt khi nhận hàng</li>
                                        <li>• Kiểm tra kỹ sản phẩm trước khi thanh toán</li>
                                    </ul>
                                </div>

                                <!-- Demo Info -->
                                <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-4">
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-info-circle text-blue-500 text-xl mt-1"></i>
                                        <div>
                                            <h4 class="font-bold text-blue-800 mb-2">Đây là phiên bản Demo</h4>
                                            <ul class="text-blue-700 space-y-1 text-sm">
                                                <li>• Đơn hàng giả lập để xem giao diện</li>
                                                <li>• Không lưu vào database</li>
                                                <li>• Để sử dụng thật, cần tích hợp database</li>
                                                <li>• Xem README.md để biết cách cấu hình</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-3xl shadow-2xl p-6 sticky top-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <i class="fas fa-shopping-bag text-orange-500"></i>
                                Tóm tắt đơn hàng
                            </h2>

                            <!-- Order Items -->
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                                        <i class="fas fa-box text-gray-400"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-sm">Áo thun nam cổ tròn</h4>
                                        <p class="text-xs text-gray-600">SL: 2</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-sm">300,000đ</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                                        <i class="fas fa-box text-gray-400"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-sm">Quần jean nữ skinny</h4>
                                        <p class="text-xs text-gray-600">SL: 1</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-sm">300,000đ</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                                        <i class="fas fa-box text-gray-400"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-sm">Giày sneaker trắng</h4>
                                        <p class="text-xs text-gray-600">SL: 1</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-sm">450,000đ</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Total -->
                            <div class="border-t pt-4">
                                <div class="flex justify-between items-center text-lg font-bold">
                                    <span>Tổng cộng:</span>
                                    <span class="text-orange-600"><?php echo number_format($amount); ?>đ</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-600 mt-1">
                                    <span>Phí vận chuyển:</span>
                                    <span>Miễn phí</span>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="mt-6 space-y-3">
                                <a href="../orders/" class="w-full btn-success text-white py-3 rounded-xl font-bold text-center block">
                                    <i class="fas fa-list mr-2"></i>
                                    Xem đơn hàng
                                </a>

                                <a href="../../products.php" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 py-3 rounded-xl font-bold text-center block transition-colors">
                                    <i class="fas fa-store mr-2"></i>
                                    Tiếp tục mua sắm
                                </a>

                                <button onclick="printOrder()" class="w-full bg-blue-200 hover:bg-blue-300 text-blue-700 py-3 rounded-xl font-bold transition-colors">
                                    <i class="fas fa-print mr-2"></i>
                                    In đơn hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Timeline -->
                <div class="mt-8 bg-white rounded-3xl shadow-2xl p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tiến trình đơn hàng</h2>

                    <div class="relative">
                        <!-- Timeline Line -->
                        <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gray-300"></div>

                        <!-- Timeline Items -->
                        <div class="space-y-8">
                            <!-- Order Placed -->
                            <div class="relative flex items-start gap-4">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center relative z-10">
                                    <i class="fas fa-check text-green-600 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-800">Đơn hàng đã đặt</h3>
                                    <p class="text-gray-600"><?php echo date('d/m/Y H:i'); ?></p>
                                    <p class="text-sm text-gray-500">Đơn hàng của bạn đã được tiếp nhận thành công</p>
                                </div>
                            </div>

                            <!-- Confirmation -->
                            <div class="relative flex items-start gap-4">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center relative z-10">
                                    <i class="fas fa-phone text-blue-600 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-800">Xác nhận đơn hàng</h3>
                                    <p class="text-gray-600">Dự kiến: <?php echo date('d/m/Y H:i', strtotime('+30 minutes')); ?></p>
                                    <p class="text-sm text-gray-500">Chúng tôi sẽ gọi điện xác nhận thông tin</p>
                                </div>
                            </div>

                            <!-- Processing -->
                            <div class="relative flex items-start gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center relative z-10">
                                    <i class="fas fa-cog text-gray-400 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-800">Đang xử lý</h3>
                                    <p class="text-gray-600">Dự kiến: <?php echo date('d/m/Y', strtotime('+1 day')); ?></p>
                                    <p class="text-sm text-gray-500">Chuẩn bị hàng và đóng gói</p>
                                </div>
                            </div>

                            <!-- Shipping -->
                            <div class="relative flex items-start gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center relative z-10">
                                    <i class="fas fa-truck text-gray-400 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-800">Đang giao hàng</h3>
                                    <p class="text-gray-600">Dự kiến: <?php echo date('d/m/Y', strtotime('+2 days')); ?></p>
                                    <p class="text-sm text-gray-500">Giao hàng đến địa chỉ của bạn</p>
                                </div>
                            </div>

                            <!-- Delivered -->
                            <div class="relative flex items-start gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center relative z-10">
                                    <i class="fas fa-box text-gray-400 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-800">Đã giao hàng</h3>
                                    <p class="text-gray-600">Dự kiến: <?php echo date('d/m/Y', strtotime('+3 days')); ?></p>
                                    <p class="text-sm text-gray-500">Đơn hàng đã được giao thành công</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Print order
        function printOrder() {
            const printContent = `
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
                    <div style="text-align: center; border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 30px;">
                        <h1 style="margin: 0; color: #333;">ĐƠN HÀNG #<?php echo $order_id; ?></h1>
                        <p style="margin: 10px 0 0 0; color: #666;">Ngày đặt: <?php echo date('d/m/Y H:i'); ?></p>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <h3 style="color: #333; margin-bottom: 15px;">Thông tin khách hàng:</h3>
                        <p><strong>Tên:</strong> <?php echo $customer_info['name']; ?></p>
                        <p><strong>Điện thoại:</strong> <?php echo $customer_info['phone']; ?></p>
                        <p><strong>Email:</strong> <?php echo $customer_info['email']; ?></p>
                        <p><strong>Địa chỉ:</strong> <?php echo $shipping_address; ?></p>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <h3 style="color: #333; margin-bottom: 15px;">Sản phẩm:</h3>
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr style="border-bottom: 1px solid #ddd;">
                                <th style="text-align: left; padding: 10px;">Sản phẩm</th>
                                <th style="text-align: center; padding: 10px;">SL</th>
                                <th style="text-align: right; padding: 10px;">Thành tiền</th>
                            </tr>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px;">Áo thun nam cổ tròn</td>
                                <td style="text-align: center; padding: 10px;">2</td>
                                <td style="text-align: right; padding: 10px;">300,000đ</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px;">Quần jean nữ skinny</td>
                                <td style="text-align: center; padding: 10px;">1</td>
                                <td style="text-align: right; padding: 10px;">300,000đ</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px;">Giày sneaker trắng</td>
                                <td style="text-align: center; padding: 10px;">1</td>
                                <td style="text-align: right; padding: 10px;">450,000đ</td>
                            </tr>
                            <tr style="background-color: #f9f9f9;">
                                <td colspan="2" style="text-align: right; padding: 15px; font-weight: bold;">Tổng cộng:</td>
                                <td style="text-align: right; padding: 15px; font-weight: bold; color: #e67e22;"><?php echo number_format($amount); ?>đ</td>
                            </tr>
                        </table>
                    </div>

                    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 30px;">
                        <h3 style="color: #333; margin-bottom: 15px;">Phương thức thanh toán:</h3>
                        <p style="margin: 0;"><strong>Tiền mặt</strong> - Thanh toán khi nhận hàng</p>
                    </div>

                    <div style="text-align: center; color: #666; font-size: 12px; border-top: 1px solid #ddd; padding-top: 20px;">
                        <p>Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi!</p>
                        <p>Hotline: 1900-xxxx | Website: cuahang.com</p>
                    </div>
                </div>
            `;

            const originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }

        // Add interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate timeline items
            const timelineItems = document.querySelectorAll('.relative.flex');
            timelineItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateX(-20px)';

                setTimeout(() => {
                    item.style.transition = 'all 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                }, index * 200);
            });

            // Add button hover effects
            document.querySelectorAll('button, a').forEach(element => {
                element.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });

                element.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
