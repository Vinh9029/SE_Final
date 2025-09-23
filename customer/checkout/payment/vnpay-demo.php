<?php
// Demo data
$order_id = rand(1000, 9999);
$amount = 1200000; // 1,200,000 VND
$description = "Thanh toan don hang #" . $order_id;

// Generate mock VNPay URL
$vnpay_url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html?vnp_Amount=120000000&vnp_Command=pay&vnp_CreateDate=20241201000000&vnp_CurrCode=VND&vnp_IpAddr=127.0.0.1&vnp_Locale=vn&vnp_OrderInfo=Thanh%20toan%20don%20hang%20%23{$order_id}&vnp_OrderType=billpayment&vnp_ReturnUrl=http%3A%2F%2Flocalhost%2FSE_Final%2Fcustomer%2Fcheckout%2Fpayment%2Fvnpay_return.php&vnp_TmnCode=DEMO123&vnp_TxnRef={$order_id}&vnp_SecureHash=abc123";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán VNPay - Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .payment-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ee5a24 0%, #ff6b6b 100%);
        }
        .qr-container {
            transition: all 0.3s ease;
        }
        .qr-container:hover {
            transform: scale(1.05);
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
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
                    <span class="bg-orange-600 text-white px-4 py-2 rounded-full">
                        <i class="fas fa-qrcode mr-2"></i>VNPay Demo
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Payment Section -->
    <div class="payment-container min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-white mb-4">Thanh toán qua VNPay QR</h1>
                    <p class="text-white text-lg">Quét mã QR để thanh toán đơn hàng #<?php echo $order_id; ?></p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- QR Code Section -->
                    <div class="bg-white rounded-3xl shadow-2xl p-8">
                        <div class="text-center">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Mã QR Thanh toán</h2>

                            <!-- QR Code Container -->
                            <div class="qr-container mx-auto mb-6">
                                <div class="w-64 h-64 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto pulse">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=256x256&data=<?php echo urlencode($vnpay_url); ?>"
                                         alt="VNPay QR Code"
                                         class="w-full h-full rounded-2xl">
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="bg-orange-50 rounded-xl p-4 mb-6">
                                <div class="text-center">
                                    <p class="text-sm text-gray-600 mb-1">Số tiền thanh toán</p>
                                    <p class="text-3xl font-bold text-orange-600"><?php echo number_format($amount); ?>đ</p>
                                </div>
                            </div>

                            <!-- Payment Instructions -->
                            <div class="bg-blue-50 rounded-xl p-4 mb-6">
                                <h3 class="font-bold text-blue-800 mb-3">Hướng dẫn thanh toán:</h3>
                                <ul class="text-blue-700 space-y-2 text-sm">
                                    <li>1. Mở ứng dụng ngân hàng hoặc ví điện tử</li>
                                    <li>2. Chọn chức năng quét mã QR</li>
                                    <li>3. Quét mã QR ở trên</li>
                                    <li>4. Xác nhận thông tin và thanh toán</li>
                                    <li>5. Chờ xác nhận thanh toán thành công</li>
                                </ul>
                            </div>

                            <!-- Demo Info -->
                            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-info-circle text-yellow-500 text-xl mt-1"></i>
                                    <div>
                                        <h4 class="font-bold text-yellow-800 mb-2">Đây là phiên bản Demo</h4>
                                        <ul class="text-yellow-700 space-y-1 text-sm">
                                            <li>• Mã QR giả lập để xem giao diện</li>
                                            <li>• Không kết nối với VNPay thật</li>
                                            <li>• Để sử dụng thật, cần cấu hình VNPay</li>
                                            <li>• Xem README.md để biết cách cấu hình</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col sm:flex-row gap-3">
                                <button onclick="simulatePayment()" class="btn-primary text-white px-6 py-3 rounded-xl font-bold">
                                    <i class="fas fa-check mr-2"></i>
                                    Mô phỏng thanh toán thành công
                                </button>

                                <button onclick="window.print()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-xl font-bold">
                                    <i class="fas fa-print mr-2"></i>
                                    In mã QR
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="bg-white rounded-3xl shadow-2xl p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                            <i class="fas fa-receipt text-orange-500"></i>
                            Thông tin đơn hàng
                        </h2>

                        <!-- Order Info -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">Đơn hàng</h3>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600">Mã đơn hàng:</span>
                                    <span class="font-bold">#<?php echo $order_id; ?></span>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600">Trạng thái:</span>
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">Chờ thanh toán</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Thời gian tạo:</span>
                                    <span class="font-medium"><?php echo date('d/m/Y H:i'); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Info -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">Khách hàng</h3>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="font-medium">Nguyễn Văn A</p>
                                <p class="text-gray-600">0123456789</p>
                                <p class="text-gray-600">nguyenvana@example.com</p>
                            </div>
                        </div>

                        <!-- Products -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">Sản phẩm</h3>
                            <div class="space-y-3">
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
                        </div>

                        <!-- Payment Method -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">Phương thức</h3>
                            <div class="bg-blue-50 rounded-xl p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-qrcode text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">VNPay QR</p>
                                        <p class="text-sm text-gray-600">Thanh toán qua mã QR</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="border-t pt-4">
                            <div class="flex justify-between items-center text-xl font-bold">
                                <span>Tổng cộng:</span>
                                <span class="text-orange-600"><?php echo number_format($amount); ?>đ</span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="mt-6 space-y-3">
                            <button onclick="checkPaymentStatus()" class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-xl font-bold">
                                <i class="fas fa-check mr-2"></i>
                                Kiểm tra trạng thái
                            </button>

                            <a href="../checkout-demo.php" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 py-3 rounded-xl font-bold text-center block">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Quay lại checkout
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Payment Status -->
                <div id="payment-status" class="mt-8 hidden">
                    <div class="bg-white rounded-3xl shadow-2xl p-8 text-center">
                        <div id="status-icon" class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <i class="fas fa-spinner fa-spin text-2xl text-blue-500"></i>
                        </div>
                        <h3 id="status-title" class="text-xl font-bold mb-2">Đang kiểm tra...</h3>
                        <p id="status-message" class="text-gray-600">Vui lòng đợi trong khi chúng tôi kiểm tra trạng thái thanh toán.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simulate payment success
        function simulatePayment() {
            const statusDiv = document.getElementById('payment-status');
            const statusIcon = document.getElementById('status-icon');
            const statusTitle = document.getElementById('status-title');
            const statusMessage = document.getElementById('status-message');

            statusDiv.classList.remove('hidden');
            statusIcon.innerHTML = '<i class="fas fa-spinner fa-spin text-2xl text-blue-500"></i>';
            statusTitle.textContent = 'Đang xử lý...';
            statusMessage.textContent = 'Mô phỏng quá trình thanh toán...';

            setTimeout(() => {
                statusIcon.innerHTML = '<i class="fas fa-check-circle text-4xl text-green-500"></i>';
                statusTitle.textContent = 'Thanh toán thành công!';
                statusMessage.textContent = 'Đơn hàng của bạn đã được thanh toán thành công. Chúng tôi sẽ xử lý đơn hàng ngay lập tức.';

                // Redirect after 3 seconds
                setTimeout(() => {
                    alert('Thanh toán thành công! Chuyển hướng về trang xác nhận...');
                    window.location.href = 'cash-demo.php?order_id=<?php echo $order_id; ?>';
                }, 3000);
            }, 2000);
        }

        // Check payment status
        function checkPaymentStatus() {
            const statusDiv = document.getElementById('payment-status');
            const statusIcon = document.getElementById('status-icon');
            const statusTitle = document.getElementById('status-title');
            const statusMessage = document.getElementById('status-message');

            statusDiv.classList.remove('hidden');
            statusIcon.innerHTML = '<i class="fas fa-spinner fa-spin text-2xl text-blue-500"></i>';
            statusTitle.textContent = 'Đang kiểm tra...';
            statusMessage.textContent = 'Vui lòng đợi trong khi chúng tôi kiểm tra trạng thái thanh toán.';

            setTimeout(() => {
                statusIcon.innerHTML = '<i class="fas fa-exclamation-triangle text-4xl text-yellow-500"></i>';
                statusTitle.textContent = 'Chưa thanh toán';
                statusMessage.textContent = 'Chưa phát hiện thanh toán. Vui lòng quét mã QR và thanh toán.';

                setTimeout(() => {
                    statusDiv.classList.add('hidden');
                }, 5000);
            }, 2000);
        }

        // Print QR code
        function printQR() {
            const printContent = document.querySelector('.qr-container').innerHTML;
            const originalContent = document.body.innerHTML;

            document.body.innerHTML = `
                <div style="text-align: center; padding: 50px;">
                    <h2>Mã QR Thanh toán VNPay</h2>
                    <p>Đơn hàng: #<?php echo $order_id; ?></p>
                    <p>Số tiền: <?php echo number_format($amount); ?>đ</p>
                    <div style="margin: 50px auto; width: 300px; height: 300px;">
                        ${printContent}
                    </div>
                    <p style="margin-top: 30px; font-size: 12px; color: #666;">
                        Đây là mã QR demo. Để sử dụng thật, cần cấu hình VNPay.
                    </p>
                </div>
            `;

            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }

        // Add interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate QR container
            const qrContainer = document.querySelector('.qr-container');
            qrContainer.style.opacity = '0';
            qrContainer.style.transform = 'scale(0.8)';

            setTimeout(() => {
                qrContainer.style.transition = 'all 0.5s ease';
                qrContainer.style.opacity = '1';
                qrContainer.style.transform = 'scale(1)';
            }, 500);

            // Add button hover effects
            document.querySelectorAll('button').forEach(button => {
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
