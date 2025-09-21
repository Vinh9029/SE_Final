# Giỏ hàng (Cart) - Hướng dẫn sử dụng

## Cấu trúc thư mục
```
customer/cart/
├── index.php              # Trang giỏ hàng chính
├── add.php               # API thêm sản phẩm vào giỏ
├── update.php            # API cập nhật số lượng
├── remove.php            # API xóa sản phẩm
├── clear.php             # API xóa tất cả sản phẩm
└── cart_functions.php    # Các hàm xử lý giỏ hàng
```

## Tính năng

### 1. Trang giỏ hàng chính (index.php)
- Hiển thị danh sách sản phẩm trong giỏ hàng
- Tính tổng tiền tự động
- Cập nhật số lượng sản phẩm
- Xóa sản phẩm khỏi giỏ hàng
- Xóa tất cả sản phẩm
- Điều hướng đến trang thanh toán

### 2. API Endpoints

#### Thêm sản phẩm vào giỏ hàng
```php
// POST /customer/cart/add.php
$_POST = [
    'product_id' => 1,
    'quantity' => 2
];
```

#### Cập nhật số lượng sản phẩm
```php
// POST /customer/cart/update.php
// JSON: {"product_id": 1, "quantity": 3}
```

#### Xóa sản phẩm khỏi giỏ hàng
```php
// POST /customer/cart/remove.php
// JSON: {"product_id": 1}
```

#### Xóa tất cả sản phẩm
```php
// POST /customer/cart/clear.php
```

## Cách tích hợp

### 1. Nút "Thêm vào giỏ hàng" trên trang sản phẩm
```php
<form method="POST" action="../cart/add.php" class="inline">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <input type="number" name="quantity" value="1" min="1" class="w-16 text-center">
    <button type="submit" class="btn-primary">
        <i class="fas fa-cart-plus"></i> Thêm vào giỏ
    </button>
</form>
```

### 2. Hiển thị số lượng sản phẩm trong giỏ hàng (Header)
```php
<?php
require_once 'cart/cart_functions.php';
$cart_count = getCartItemCount($_SESSION['user_id'], $conn);
?>
<span class="cart-count"><?php echo $cart_count; ?></span>
```

### 3. JavaScript để cập nhật giỏ hàng động
```javascript
// Thêm vào giỏ hàng bằng AJAX
function addToCart(productId, quantity = 1) {
    fetch('../cart/add.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}&quantity=${quantity}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartCount(data.cart_total);
            showNotification(data.message, 'success');
        } else {
            showNotification(data.message, 'error');
        }
    });
}
```

## Database Schema

```sql
CREATE TABLE cart (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
```

## Fallback Mechanism

Hệ thống có cơ chế fallback:
- Nếu database không khả dụng → Sử dụng session
- Tự động đồng bộ session với database khi có thể

## Styling

Sử dụng Tailwind CSS với custom gradient:
- Background gradient: `linear-gradient(135deg, #667eea 0%, #764ba2 100%)`
- Button gradient: `linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%)`

## JavaScript Functions

### updateQuantity(productId, change)
Cập nhật số lượng sản phẩm
- `productId`: ID sản phẩm
- `change`: Số lượng thay đổi (-1 hoặc +1)

### updateSubtotal(productId, quantity)
Cập nhật tổng tiền của một sản phẩm

### updateCartTotal()
Cập nhật tổng tiền toàn bộ giỏ hàng

### removeItem(productId)
Xóa sản phẩm khỏi giỏ hàng

### clearCart()
Xóa tất cả sản phẩm trong giỏ hàng

## Lưu ý bảo mật

1. Kiểm tra đăng nhập trước khi thực hiện các thao tác
2. Validate dữ liệu đầu vào
3. Kiểm tra tồn kho trước khi thêm/cập nhật
4. Sử dụng prepared statements để tránh SQL injection

## Testing

1. Test thêm sản phẩm vào giỏ hàng
2. Test cập nhật số lượng
3. Test xóa sản phẩm
4. Test xóa tất cả
5. Test với database và session fallback
6. Test validation (số lượng âm, sản phẩm không tồn tại)
