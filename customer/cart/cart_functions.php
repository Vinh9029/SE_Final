<?php
/**
 * Cart Functions
 * Các hàm xử lý giỏ hàng dùng chung
 */

// Lấy thông tin giỏ hàng của user
function getCartItems($user_id, $conn = null) {
    $cart_items = [];

    if ($conn) {
        // Lấy từ database
        try {
            $stmt = $conn->prepare("SELECT c.*, p.name, p.price, p.image, p.stock FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $cart_items[] = $row;
            }
        } catch (Exception $e) {
            // Fallback to session
            $cart_items = getCartFromSession();
        }
    } else {
        // Lấy từ session
        $cart_items = getCartFromSession();
    }

    return $cart_items;
}

// Lấy giỏ hàng từ session
function getCartFromSession() {
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

// Tính tổng tiền giỏ hàng
function calculateCartTotal($cart_items) {
    $total = 0;
    foreach ($cart_items as $item) {
        if (isset($item['price']) && isset($item['quantity'])) {
            $total += $item['price'] * $item['quantity'];
        }
    }
    return $total;
}

// Kiểm tra sản phẩm có trong giỏ hàng không
function isProductInCart($product_id, $user_id, $conn = null) {
    if ($conn) {
        try {
            $stmt = $conn->prepare("SELECT id FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("ii", $user_id, $product_id);
            $stmt->execute();
            return $stmt->get_result()->num_rows > 0;
        } catch (Exception $e) {
            return isset($_SESSION['cart'][$product_id]);
        }
    } else {
        return isset($_SESSION['cart'][$product_id]);
    }
}

// Lấy số lượng sản phẩm trong giỏ hàng
function getCartItemCount($user_id, $conn = null) {
    if ($conn) {
        try {
            $stmt = $conn->prepare("SELECT SUM(quantity) as total FROM cart WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            return $result['total'] ?? 0;
        } catch (Exception $e) {
            return array_sum($_SESSION['cart'] ?? []);
        }
    } else {
        return array_sum($_SESSION['cart'] ?? []);
    }
}

// Thêm sản phẩm vào giỏ hàng
function addToCart($user_id, $product_id, $quantity = 1, $conn = null) {
    if ($conn) {
        try {
            // Kiểm tra sản phẩm đã có trong giỏ chưa
            $stmt = $conn->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("ii", $user_id, $product_id);
            $stmt->execute();
            $existing = $stmt->get_result()->fetch_assoc();

            if ($existing) {
                // Cập nhật số lượng
                $new_quantity = $existing['quantity'] + $quantity;
                $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
                $stmt->bind_param("ii", $new_quantity, $existing['id']);
                return $stmt->execute();
            } else {
                // Thêm mới
                $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
                $stmt->bind_param("iii", $user_id, $product_id, $quantity);
                return $stmt->execute();
            }
        } catch (Exception $e) {
            // Fallback to session
            return addToCartSession($product_id, $quantity);
        }
    } else {
        return addToCartSession($product_id, $quantity);
    }
}

// Thêm sản phẩm vào session cart
function addToCartSession($product_id, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    return true;
}

// Cập nhật số lượng sản phẩm trong giỏ hàng
function updateCartItemQuantity($user_id, $product_id, $quantity, $conn = null) {
    if ($quantity <= 0) {
        return removeFromCart($user_id, $product_id, $conn);
    }

    if ($conn) {
        try {
            $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("iii", $quantity, $user_id, $product_id);
            return $stmt->execute();
        } catch (Exception $e) {
            return updateCartSession($product_id, $quantity);
        }
    } else {
        return updateCartSession($product_id, $quantity);
    }
}

// Cập nhật session cart
function updateCartSession($product_id, $quantity) {
    if (isset($_SESSION['cart'][$product_id])) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$product_id]);
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
        return true;
    }
    return false;
}

// Xóa sản phẩm khỏi giỏ hàng
function removeFromCart($user_id, $product_id, $conn = null) {
    if ($conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("ii", $user_id, $product_id);
            return $stmt->execute();
        } catch (Exception $e) {
            return removeFromCartSession($product_id);
        }
    } else {
        return removeFromCartSession($product_id);
    }
}

// Xóa khỏi session cart
function removeFromCartSession($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        return true;
    }
    return false;
}

// Xóa tất cả sản phẩm trong giỏ hàng
function clearCart($user_id, $conn = null) {
    if ($conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            return $stmt->execute();
        } catch (Exception $e) {
            return clearCartSession();
        }
    } else {
        return clearCartSession();
    }
}

// Xóa session cart
function clearCartSession() {
    $_SESSION['cart'] = [];
    return true;
}

// Đồng bộ session cart với database
function syncCartWithDatabase($user_id, $conn) {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return true;
    }

    try {
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            addToCart($user_id, $product_id, $quantity, $conn);
        }

        // Clear session cart after sync
        unset($_SESSION['cart']);
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
