<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền mặt - Old Favour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .payment-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-success {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #45a049 0%, #4CAF50 100%);
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
                <h2 class="text-2xl font-bold text-green-600 mb-6 flex items-center gap-2"><i class="fa fa-money-bill-wave"></i> Thanh toán tiền mặt</h2>
                <div class="mb-6 text-center">
                    <i class="fa fa-check-circle text-green-500 text-5xl mb-4"></i>
                    <p class="text-lg text-gray-700 font-semibold">Vui lòng thanh toán trực tiếp cho nhân viên khi nhận hàng hoặc tại quầy.</p>
                </div>
                <div class="bg-gray-50 rounded-xl shadow p-4 mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Mã đơn hàng:</span>
                        <span class="font-bold text-pink-600">#123456</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Tổng thanh toán:</span>
                        <span class="font-bold text-green-600">108,000đ</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Trạng thái:</span>
                        <span class="font-bold text-yellow-500">Chờ xác nhận</span>
                    </div>
                </div>
                <a href="../check-status.php" class="btn-success text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 w-full block text-center mt-4"><i class="fa fa-history mr-2"></i>Kiểm tra trạng thái đơn hàng</a>
            </div>
        </div>
    </main>
    <?php include '../../../footer.php'; ?>
</body>
</html>
