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

-- Thêm dữ liệu cho bảng categories trước
INSERT INTO categories (name, description) VALUES
('Cà phê', 'Các loại cà phê đặc trưng'),
('Trà & sữa', 'Các loại trà và trà sữa'),
('Nước đặc biệt', 'Thức uống đặc biệt và signature'),
('Đồ ăn kèm', 'Bánh ngọt và đồ ăn kèm');

-- Cà phê (category_id = 1)
INSERT INTO products (category_id, name, description, price, image, is_signature) VALUES
(1, 'Đen đá/nóng', 'Cà phê đen truyền thống, dùng nóng hoặc đá.', 20000, NULL, FALSE),
(1, 'Sữa đá/nóng', 'Cà phê sữa đậm đà, có thể uống nóng hoặc lạnh.', 25000, NULL, FALSE),
(1, 'Bạc xỉu', 'Cà phê sữa đá với vị ngọt béo nhẹ.', 25000, NULL, FALSE),
(1, 'Cold Brew (ủ lạnh)', 'Cà phê ủ lạnh trong nhiều giờ, hương vị thanh mát.', 40000, NULL, FALSE),
(1, 'Cà phê muối', 'Cà phê kết hợp với lớp kem muối béo mặn.', 35000, NULL, FALSE),
(1, 'Cappuccino', 'Cà phê Ý nổi tiếng với lớp bọt sữa dày.', 45000, NULL, FALSE),
(1, 'Latte', 'Cà phê Ý với nhiều sữa tươi, vị nhẹ nhàng.', 45000, NULL, FALSE),
(1, 'Espresso', 'Cà phê Ý pha máy, đậm đặc.', 30000, NULL, FALSE);

-- Trà & sữa (category_id = 2)
INSERT INTO products (category_id, name, description, price, image, is_signature) VALUES
(2, 'Trà đào cam sả', 'Trà đào kết hợp cam và sả, hương vị mát lạnh.', 35000, NULL, FALSE),
(2, 'Trà hoa cúc mật ong', 'Trà hoa cúc thanh mát cùng vị ngọt mật ong.', 30000, NULL, FALSE),
(2, 'Trà sen nhãn', 'Trà thanh mát, kết hợp hương sen và nhãn tươi.', 35000, NULL, FALSE),
(2, 'Trà sữa Oolong', 'Trà Oolong đậm đà pha cùng sữa béo.', 40000, NULL, FALSE),
(2, 'Trà sữa Matcha', 'Trà xanh Matcha Nhật Bản hòa quyện sữa.', 40000, NULL, FALSE),
(2, 'Trà sữa Hồng Trà', 'Hồng trà truyền thống kết hợp sữa tươi.', 35000, NULL, FALSE),
(2, 'Hồng trà sữa trân châu đường nâu', 'Hồng trà sữa thêm trân châu nấu đường nâu.', 45000, NULL, FALSE),
(2, 'Trà dâu tằm thanh long', 'Trà trái cây kết hợp dâu tằm và thanh long.', 45000, NULL, FALSE);

-- Nước đặc biệt (category_id = 3)
INSERT INTO products (category_id, name, description, price, image, is_signature) VALUES
(3, 'The Old Flavour Coffee', 'Thức uống đặc trưng của quán, hương vị độc đáo.', 45000, NULL, FALSE),
(3, 'Soda chanh dây mật ong', 'Soda kết hợp chanh dây và mật ong thanh mát.', 35000, NULL, FALSE),
(3, 'Sinh tố xoài', 'Sinh tố trái xoài tươi mát, bổ dưỡng.', 40000, NULL, FALSE),
(3, 'Sinh tố chuối cacao', 'Sinh tố chuối pha cùng cacao béo ngậy.', 40000, NULL, FALSE),
(3, 'Sinh tố dâu', 'Sinh tố dâu tây tươi, vị chua ngọt dễ uống.', 40000, NULL, FALSE),
(3, 'Chocolate đá xay', 'Thức uống chocolate đá xay mát lạnh.', 50000, NULL, FALSE),
(3, 'Soda việt quất bạc hà', 'Soda việt quất kết hợp lá bạc hà tươi.', 45000, NULL, FALSE),
(3, 'Nước ép cam tươi', 'Cam tươi ép nguyên chất 100%.', 35000, NULL, FALSE);

-- Đồ ăn kèm (category_id = 4)
INSERT INTO products (category_id, name, description, price, image, is_signature) VALUES
(4, 'Croissant bơ', 'Bánh sừng bò thơm bơ, vỏ giòn ruộm.', 30000, NULL, FALSE),
(4, 'Croissant phô mai jambon', 'Bánh croissant nhân jambon và phô mai.', 40000, NULL, FALSE),
(4, 'Tiramisu', 'Bánh ngọt Ý với lớp kem mascarpone mềm mịn.', 45000, NULL, FALSE),
(4, 'Mousse chanh dây', 'Bánh mousse chanh dây chua ngọt thanh mát.', 45000, NULL, FALSE),
(4, 'Cheesecake việt quất', 'Bánh cheesecake béo ngậy phủ sốt việt quất.', 50000, NULL, FALSE),
(4, 'Bánh su kem (3 cái)', 'Nhân kem sữa tươi mềm mịn, 3 cái/ phần.', 30000, NULL, FALSE),
(4, 'Set bánh ngọt mini (mix 3 loại)', 'Set bánh mini mix ngẫu nhiên 3 loại.', 60000, NULL, FALSE),
(4, 'Red Velvet Cake', 'Bánh Red Velvet đỏ đặc trưng, lớp kem phô mai.', 55000, NULL, FALSE),
(4, 'Brownie Socola', 'Bánh brownie đậm vị socola, mềm ẩm.', 50000, NULL, FALSE),
(4, 'Bánh flan caramel', 'Bánh flan mềm mịn phủ caramel.', 25000, NULL, FALSE),
(4, 'Bánh apple pie mini', 'Bánh pie nhân táo nướng ngọt dịu.', 45000, NULL, FALSE);
