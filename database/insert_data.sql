USE theoldfavour;
-- =========================
-- 1. Insert CATEGORIES
-- =========================
INSERT INTO categories (name, description) VALUES
('Cà phê', 'Các loại cà phê đặc trưng'),
('Trà & sữa', 'Các loại trà và trà sữa'),
('Nước đặc biệt', 'Thức uống đặc biệt và signature'),
('Đồ ăn kèm', 'Bánh ngọt và đồ ăn kèm');

-- =========================
-- 2. Insert PRODUCTS
-- =========================

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

-- =========================
-- 3. Insert PRODUCT_SIZES
-- =========================

-- 📌 Đồ uống (id 1 → 24): size theo ml
-- Quy ước: S=350ml, M=500ml (+5k), L=750ml (+10k), XL=1000ml (+15k)

-- Cà phê (id 1 → 8)
INSERT INTO product_sizes (product_id, size_name, volume, extra_price) VALUES
((SELECT product_id FROM products WHERE name = 'Đen đá/nóng' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Đen đá/nóng' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Đen đá/nóng' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Đen đá/nóng' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Sữa đá/nóng' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Sữa đá/nóng' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Sữa đá/nóng' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Sữa đá/nóng' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Bạc xỉu' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Bạc xỉu' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Bạc xỉu' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Bạc xỉu' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Cold Brew (ủ lạnh)' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Cold Brew (ủ lạnh)' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Cold Brew (ủ lạnh)' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Cold Brew (ủ lạnh)' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Cà phê muối' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Cà phê muối' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Cà phê muối' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Cà phê muối' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Cappuccino' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Cappuccino' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Cappuccino' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Cappuccino' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Latte' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Latte' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Latte' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Latte' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Espresso' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Espresso' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Espresso' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Espresso' LIMIT 1),'XL','1000ml',15000);

-- Trà & sữa (id 9 → 16)
INSERT INTO product_sizes (product_id, size_name, volume, extra_price) VALUES
((SELECT product_id FROM products WHERE name = 'Trà đào cam sả' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Trà đào cam sả' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Trà đào cam sả' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Trà đào cam sả' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Trà hoa cúc mật ong' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Trà hoa cúc mật ong' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Trà hoa cúc mật ong' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Trà hoa cúc mật ong' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Trà sen nhãn' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Trà sen nhãn' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Trà sen nhãn' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Trà sen nhãn' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Oolong' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Trà sữa Oolong' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Oolong' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Oolong' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Matcha' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Trà sữa Matcha' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Matcha' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Matcha' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Hồng Trà' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Trà sữa Hồng Trà' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Hồng Trà' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Trà sữa Hồng Trà' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Hồng trà sữa trân châu đường nâu' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Hồng trà sữa trân châu đường nâu' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Hồng trà sữa trân châu đường nâu' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Hồng trà sữa trân châu đường nâu' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Trà dâu tằm thanh long' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Trà dâu tằm thanh long' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Trà dâu tằm thanh long' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Trà dâu tằm thanh long' LIMIT 1),'XL','1000ml',15000);

-- Nước đặc biệt (id 17 → 24)
INSERT INTO product_sizes (product_id, size_name, volume, extra_price) VALUES
((SELECT product_id FROM products WHERE name = 'The Old Flavour Coffee' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'The Old Flavour Coffee' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'The Old Flavour Coffee' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'The Old Flavour Coffee' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Soda chanh dây mật ong' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Soda chanh dây mật ong' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Soda chanh dây mật ong' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Soda chanh dây mật ong' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Sinh tố xoài' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Sinh tố xoài' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Sinh tố xoài' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Sinh tố xoài' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Sinh tố chuối cacao' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Sinh tố chuối cacao' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Sinh tố chuối cacao' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Sinh tố chuối cacao' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Sinh tố dâu' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Sinh tố dâu' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Sinh tố dâu' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Sinh tố dâu' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Chocolate đá xay' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Chocolate đá xay' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Chocolate đá xay' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Chocolate đá xay' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Soda việt quất bạc hà' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Soda việt quất bạc hà' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Soda việt quất bạc hà' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Soda việt quất bạc hà' LIMIT 1),'XL','1000ml',15000),
((SELECT product_id FROM products WHERE name = 'Nước ép cam tươi' LIMIT 1),'S','350ml',0),
((SELECT product_id FROM products WHERE name = 'Nước ép cam tươi' LIMIT 1),'M','500ml',5000),
((SELECT product_id FROM products WHERE name = 'Nước ép cam tươi' LIMIT 1),'L','750ml',10000),
((SELECT product_id FROM products WHERE name = 'Nước ép cam tươi' LIMIT 1),'XL','1000ml',15000);

-- 📌 Đồ ăn (id 25 → 35): size theo khẩu phần
-- Quy ước: Nhỏ=1 phần (0đ), Vừa=2 phần (+10k), Lớn=4 phần (+20k)

INSERT INTO product_sizes (product_id, size_name, volume, extra_price) VALUES
((SELECT product_id FROM products WHERE name = 'Croissant bơ' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Croissant bơ' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Croissant bơ' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Croissant phô mai jambon' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Croissant phô mai jambon' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Croissant phô mai jambon' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Tiramisu' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Tiramisu' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Tiramisu' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Mousse chanh dây' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Mousse chanh dây' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Mousse chanh dây' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Cheesecake việt quất' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Cheesecake việt quất' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Cheesecake việt quất' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Bánh su kem (3 cái)' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Bánh su kem (3 cái)' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Bánh su kem (3 cái)' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Set bánh ngọt mini (mix 3 loại)' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Set bánh ngọt mini (mix 3 loại)' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Set bánh ngọt mini (mix 3 loại)' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Red Velvet Cake' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Red Velvet Cake' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Red Velvet Cake' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Brownie Socola' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Brownie Socola' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Brownie Socola' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Bánh flan caramel' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Bánh flan caramel' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Bánh flan caramel' LIMIT 1),'Lớn','4 phần',20000),
((SELECT product_id FROM products WHERE name = 'Bánh apple pie mini' LIMIT 1),'Nhỏ','1 phần',0),
((SELECT product_id FROM products WHERE name = 'Bánh apple pie mini' LIMIT 1),'Vừa','2 phần',10000),
((SELECT product_id FROM products WHERE name = 'Bánh apple pie mini' LIMIT 1),'Lớn','4 phần',20000);
