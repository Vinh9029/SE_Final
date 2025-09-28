-- Active: 1759060862769@@127.0.0.1@3307@phpmyadmin
-- Database schema for SE_Final-Cart-Checkout

DROP DATABASE IF EXISTS theoldfavour;
CREATE DATABASE theoldfavour;   
USE theoldfavour;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    full_name VARCHAR(100),
    phone VARCHAR(20),
    address VARCHAR(255),
    role ENUM('customer', 'admin') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    is_signature BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE promotions (
    promotion_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    discount_percent DECIMAL(5,2),
    start_date DATE,
    end_date DATE
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending',
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE cart_items (
    cart_item_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE loyalty_points (
    point_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    points INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Thêm kích thước cho các sản phẩm đồ uống
CREATE TABLE product_sizes (
    size_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    size_name VARCHAR(50),   -- S, M, L, XL, hoặc Small/Medium/Large/Family...
    volume VARCHAR(50),      -- ví dụ: '350ml', '500ml', '700ml', '1L', hoặc '200g'
    extra_price DECIMAL(10,2) DEFAULT 0,  -- giá cộng thêm so với base price
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

--admin account (username: admin, password: 123)

CREATE TABLE vouchers (
    voucher_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    code VARCHAR(50) NOT NULL UNIQUE,
    discount_percent INT DEFAULT 10, -- mức giảm giá
    is_used BOOLEAN DEFAULT FALSE,   -- đã dùng chưa
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expires_at TIMESTAMP NULL,       -- hạn sử dụng
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
