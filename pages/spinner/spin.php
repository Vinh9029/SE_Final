<?php
session_start();
include_once __DIR__ . '/../../database/db_connection.php';

// Giả sử user_id lưu trong session
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    echo json_encode(['error' => 'Bạn cần đăng nhập để quay!']);
    exit;
}

// Kiểm tra số lượt quay
$sql = "SELECT COUNT(*) as spins FROM spin_history WHERE user_id = $user_id";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$spins = $row['spins'];

// Kiểm tra có lượt quay thêm không
$sql = "SELECT COUNT(*) as extra FROM spin_history WHERE user_id = $user_id AND prize = 'Lượt quay thêm'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$extra = $row['extra'];

if ($spins >= 1 && $extra == 0) {
    echo json_encode(['error' => 'Bạn đã hết lượt quay!']);
    exit;
}

$rewards = [
    ['icon' => '🎟️', 'label' => 'Giảm giá 10%', 'color' => '#f472b6', 'type' => 'discount', 'discount' => 10],
    ['icon' => '🎟️', 'label' => 'Giảm giá 20%', 'color' => '#f472b6', 'type' => 'discount', 'discount' => 20],
    ['icon' => '🎟️', 'label' => 'Giảm giá 30%', 'color' => '#f472b6', 'type' => 'discount', 'discount' => 30],
    ['icon' => '🚚', 'label' => 'Miễn phí vận chuyển', 'color' => '#34d399', 'type' => 'shipping'],
    ['icon' => '💰', 'label' => 'Hoàn tiền 10%', 'color' => '#fbbf24', 'type' => 'cashback', 'discount' => 10],
    ['icon' => '🎉', 'label' => 'Voucher 50k', 'color' => '#818cf8', 'type' => 'fixed', 'amount' => 50000],
    ['icon' => '🎉', 'label' => 'Voucher 100k', 'color' => '#f59e42', 'type' => 'fixed', 'amount' => 100000],
    ['icon' => '🎉', 'label' => 'Voucher 200k', 'color' => '#f87171', 'type' => 'fixed', 'amount' => 200000],
    ['icon' => '🔁', 'label' => 'Lượt quay thêm', 'color' => '#38bdf8', 'type' => 'extra'],
    ['icon' => '😅', 'label' => 'Chúc bạn may mắn lần sau', 'color' => '#d1d5db', 'type' => 'none'],
];

$idx = rand(0, count($rewards)-1);
$reward = $rewards[$idx];

// Lưu lịch sử quay
$stmt = $conn->prepare("INSERT INTO spin_history (user_id, prize) VALUES (?, ?)");
$stmt->bind_param('is', $user_id, $reward['label']);
$stmt->execute();

// Tạo voucher nếu trúng thưởng
$voucher = null;
if (in_array($reward['type'], ['discount', 'cashback', 'fixed', 'shipping'])) {
    $code = strtoupper(substr(md5(uniqid().$user_id),0,10));
    $discount_percent = $reward['type'] == 'discount' ? $reward['discount'] : ($reward['type']=='cashback'? $reward['discount'] : 0);
    $program_name = $reward['label'];
    $min_order_value = $reward['type']=='fixed' ? $reward['amount']*2 : 100000;
    $expires_at = date('Y-m-d H:i:s', strtotime('+7 days'));
    $status = 'active';
    $sql = "INSERT INTO vouchers (user_id, code, discount_percent, program_name, min_order_value, status, expires_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isissss', $user_id, $code, $discount_percent, $program_name, $min_order_value, $status, $expires_at);
    $stmt->execute();
    $voucher = [
        'code' => $code,
        'discount_percent' => $discount_percent,
        'program_name' => $program_name,
        'min_order_value' => $min_order_value,
        'expires_at' => $expires_at
    ];
}

// Nếu quay thêm lượt thì không tạo voucher, chỉ cho phép quay tiếp
if ($reward['type'] == 'extra') {
    // Không giới hạn quay nếu cứ trúng extra
}

// Trường hợp không trúng gì
if ($reward['type'] == 'none') {
    $voucher = null;
}

echo json_encode(['index' => $idx, 'reward' => $reward, 'voucher' => $voucher]);
