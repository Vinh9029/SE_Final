<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán VNPay - Old Favour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .payment-gradient {
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
            box-shadow: 0 4px 24px 0 rgba(102,126,234,0.08);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <?php include '../../../header.php'; ?>
    <main class="flex-1 payment-gradient py-10">
        <div class="container mx-auto px-4 flex flex-col items-center">
            <div class="card w-full max-w-xl p-8 mb-8">
                <h2 class="text-2xl font-bold text-pink-600 mb-6 flex items-center gap-2"><i class="fa fa-qrcode"></i> Thanh toán VNPay QR</h2>
                <div class="mb-6 text-center">
                    <img src="../../Photos/vnpay_qr_demo.png" alt="QR VNPay" class="mx-auto w-40 h-40 rounded-xl shadow mb-4">
                    <p class="text-lg text-gray-700 font-semibold">Quét mã QR bằng ứng dụng ngân hàng hoặc ví điện tử để thanh toán.</p>
                </div>
                <div class="bg-gray-50 rounded-xl shadow p-4 mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Mã đơn hàng:</span>
                        <span class="font-bold text-pink-600">#123456</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Tổng thanh toán:</span>
                        <span class="font-bold text-pink-600">108,000đ</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Trạng thái:</span>
                        <span class="font-bold text-yellow-500">Chờ thanh toán</span>
                    </div>
                </div>
                <a href="../check-payment.php" class="btn-primary text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 w-full block text-center mt-4"><i class="fa fa-history mr-2"></i>Kiểm tra trạng thái thanh toán</a>
            </div>
        </div>
    </main>
    <?php include '../../../footer.php'; ?>
</body>
</html>
