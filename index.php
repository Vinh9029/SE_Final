<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start();
// include_once __DIR__ . '/database/db_connection.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Flavour Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Merriweather:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Merriweather', serif;
            scroll-behavior: smooth;
        }
        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }
        .hero-overlay {
            background: linear-gradient(135deg, rgba(62, 39, 35, 0.6) 0%, rgba(210, 105, 30, 0.4) 100%);
        }
        .section-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .section-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        .cta-button {
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            background: linear-gradient(135deg, #A0522D 0%, #CD853F 100%);
            transform: scale(1.05);
        }
    </style>
    
</head>
<body class="bg-gray-50">
    <?php include 'includes/header.php'; ?>
    <!-- Body Content -->
    <main class="bg-gray-50">
        <!-- Slider quảng cáo -->
        <div class="w-full max-w-5xl mx-auto mt-6 rounded-xl overflow-hidden shadow-lg relative">
            <div id="slider" class="relative h-64 md:h-80">
                <img src="Photos/banner.jpg" class="slider-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-100" style="z-index:2;" />
                <img src="Photos/test1.jpg" class="slider-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0" style="z-index:1;" />
                <img src="Photos/test2.jpg" class="slider-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0" style="z-index:0;" />
                <div class="hero-overlay absolute inset-0 z-5"></div>
                <div class="absolute inset-0 flex items-center justify-center z-10 text-center text-white">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">Chào mừng đến Old Flavour</h1>
                        <p class="text-lg md:text-xl mb-6 drop-shadow">Hương vị cà phê nguyên bản, không gian ấm cúng</p>
                        <a href="#menu" class="cta-button text-white px-8 py-3 rounded-full font-semibold inline-block">Khám phá Menu</a>
                    </div>
                </div>
                <button onclick="prevSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-brown-500 text-brown-600 hover:text-white rounded-full p-2 shadow z-20"><i class="fa fa-chevron-left"></i></button>
                <button onclick="nextSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-brown-500 text-brown-600 hover:text-white rounded-full p-2 shadow z-20"><i class="fa fa-chevron-right"></i></button>
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                    <span class="slider-dot w-3 h-3 rounded-full bg-brown-500"></span>
                    <span class="slider-dot w-3 h-3 rounded-full bg-gray-300"></span>
                    <span class="slider-dot w-3 h-3 rounded-full bg-gray-300"></span>
                </div>
            </div>
        </div>
        <!-- Giới thiệu ngắn -->
        <section class="max-w-4xl mx-auto mt-10 text-center">
            <h2 class="text-2xl font-bold text-pink-600 mb-2">Chào mừng đến với Old Flavour Coffee</h2>
            <p class="text-gray-700 text-lg">Nơi bạn tận hưởng hương vị cà phê nguyên bản, không gian ấm cúng và dịch vụ tận tâm.</p>
        </section>

        <!-- ☕ Câu chuyện thương hiệu -->
        <section class="max-w-6xl mx-auto mt-20 bg-gradient-to-r from-brown-100 to-orange-100 rounded-2xl p-8 shadow-lg section-card">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-1/2">
                    <img src="Photos/artisan.jpg" alt="Nghệ nhân rang xay" class="w-full h-80 object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-105">
                </div>
                <div class="lg:w-1/2 text-center lg:text-left">
                    <h2 class="text-4xl font-bold text-brown-800 mb-4">☕ Câu chuyện thương hiệu</h2>
                    <h3 class="text-xl font-semibold text-brown-700 mb-4">Hành trình từ hạt cà phê đến tách hương thuần khiết</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">Ở Old Flavour, mỗi hạt cà phê không chỉ là nông sản — mà là một hành trình. Hành trình bắt đầu từ sườn đồi ngập nắng, nơi người nông dân nâng niu từng chùm quả chín đỏ, rồi qua bàn tay người nghệ nhân – những người không chỉ rang cà phê, mà rang cả tâm hồn mình trong từng mẻ.</p>
                    <p class="text-gray-700 leading-relaxed mb-4">Hương thơm lan tỏa, âm vang tiếng hạt vỡ giòn tan, như nhịp thở của thời gian. Và rồi, khi tách cà phê đầu tiên chạm môi, ta thấy vị đắng dịu hòa cùng ngọt ngào – giản đơn, chân thật, và nguyên sơ như chính cái tên Old Flavour.</p>
                    <blockquote class="text-brown-600 italic border-l-4 border-brown-400 pl-4 mb-6">Từng hạt cà phê được lựa chọn tỉ mỉ, qua bàn tay nghệ nhân để tạo nên hương vị nguyên bản của Old Flavour.</blockquote>
                    <a href="pages/aboutUs.php" class="cta-button text-white px-6 py-3 rounded-full font-semibold inline-block">Tìm hiểu thêm</a>
                </div>
            </div>
        </section>

        <!-- 🪑 Không gian quán -->
        <section class="max-w-6xl mx-auto mt-16 bg-gradient-to-r from-brown-100 to-orange-100 rounded-2xl p-8 shadow-lg section-card">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-8">
                <div class="lg:w-1/2">
                    <img src="Photos/interior.jpg" alt="Nội thất quán" class="w-full h-80 object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-105">
                </div>
                <div class="lg:w-1/2 text-center lg:text-left">
                    <h2 class="text-4xl font-bold text-brown-800 mb-4">🪑 Không gian quán</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">Bước chân vào Old Flavour, ta như lạc vào một góc nhỏ giữa hai thế giới – nơi cổ điển và hiện đại nắm tay nhau, cùng kể chuyện. Ánh đèn vàng rót xuống mặt bàn gỗ, tiếng nhạc jazz khe khẽ tan trong hương cà phê mới pha.</p>
                    <p class="text-gray-700 leading-relaxed mb-4">Mỗi chiếc ghế, mỗi khung cửa, mỗi vệt sáng đều có câu chuyện riêng — về những buổi hẹn hò đầu, những trang sách dở, hay chỉ là khoảnh khắc ai đó ngồi lặng nhìn mưa qua ô cửa kính. Quán không quá lớn, nhưng đủ rộng cho tâm hồn ta trú ngụ.</p>
                    <blockquote class="text-brown-600 italic border-l-4 border-brown-400 pl-4 mb-6">Một góc nhỏ cổ kính, nơi mỗi chiếc ghế, mỗi tách trà đều có câu chuyện riêng.</blockquote>
                    <a href="pages/contact.php" class="cta-button text-white px-6 py-3 rounded-full font-semibold inline-block">Ghé thăm quán</a>
                </div>
            </div>
        </section>

        <!-- 🕯️ Lời chào từ người sáng lập -->
        <section class="max-w-4xl mx-auto mt-16 bg-gradient-to-r from-brown-100 to-orange-100 rounded-2xl p-8 shadow-lg text-center section-card">
            <h2 class="text-4xl font-bold text-brown-800 mb-6">🕯️ Lời chào từ người sáng lập</h2>
            <div class="text-gray-700 leading-relaxed mb-6">
                <p class="mb-4">Chào bạn,</p>
                <p class="mb-4">Tôi là người đã tạo nên Old Flavour – không phải để mở một quán cà phê, mà để giữ lại một hương vị tưởng chừng đã trôi xa.</p>
                <p class="mb-4">Tôi vẫn nhớ buổi sáng đầu tiên rang thử mẻ cà phê trên chiếc chảo gang cũ của ông ngoại. Căn bếp ngập khói, mùi cà phê cháy nhẹ quyện trong tiếng chim ngoài hiên. Khi ấy, tôi nhận ra: cà phê không chỉ là thức uống – nó là ký ức, là câu chuyện, là nhịp thở chậm rãi giữa cuộc sống quá nhanh.</p>
                <p class="mb-4">Và Old Flavour ra đời từ khoảnh khắc ấy — để mỗi người khi ghé lại đều có thể tìm thấy một phần ký ức của mình trong hương vị xưa.</p>
                <p class="text-brown-600 font-semibold mb-6">— Người kể chuyện qua những giọt cà phê.</p>
                <a href="pages/aboutUs.php" class="cta-button text-white px-6 py-3 rounded-full font-semibold inline-block">Gặp gỡ người sáng lập</a>
            </div>
        </section>
        <!-- Menu nổi bật (Best sellers) -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Menu nổi bật</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/test1.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Cà phê sữa đá</div>
                    <div class="text-gray-500 text-sm">Đậm đà, truyền thống</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/background.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Bánh ngọt Pháp</div>
                    <div class="text-gray-500 text-sm">Ngọt ngào, mềm mịn</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/banner.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Trà đào cam sả</div>
                    <div class="text-gray-500 text-sm">Thanh mát, giải nhiệt</div>
                </div>
                <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
                    <img src="Photos/login_background.jpg" class="w-24 h-24 object-cover rounded-full mb-2" />
                    <div class="font-semibold text-pink-600">Sandwich gà nướng</div>
                    <div class="text-gray-500 text-sm">Bổ dưỡng, tiện lợi</div>
                </div>
            </div>
        </section>
        <!-- Danh mục menu -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Danh mục menu</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer transition-transform duration-300 hover:scale-105">
                    <i class="fa fa-coffee text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Cà phê</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer transition-transform duration-300 hover:scale-105">
                    <i class="fa fa-mug-hot text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Trà & Sữa</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer transition-transform duration-300 hover:scale-105">
                    <i class="fa fa-wine-glass-alt text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Nước đặc biệt</div>
                </div>
                <div class="bg-pink-50 rounded-xl shadow p-4 flex flex-col items-center hover:bg-pink-100 cursor-pointer transition-transform duration-300 hover:scale-105">
                    <i class="fa fa-birthday-cake text-3xl text-pink-600 mb-2"></i>
                    <div class="font-semibold">Đồ ăn kèm</div>
                </div>
            </div>
        </section>
        <!-- Khuyến mãi & Ưu đãi -->
        <?php include 'pages/promotion.php'; ?>
        <!-- <?php include 'pages/spinner/spinner.php'; ?> -->
        <br> 
        <br>
        <!-- Combo gợi ý -->
        <section class="max-w-5xl mx-auto mt-12">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Combo gợi ý</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
                    <img src="Photos/test1.jpg" class="w-20 h-20 object-cover rounded-lg" />
                    <div>
                        <div class="font-bold text-pink-600">Combo Sáng Năng Lượng</div>
                        <div class="text-gray-600 text-sm">Cà phê sữa đá + Bánh mặn</div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
                    <img src="Photos/test2.jpg" class="w-20 h-20 object-cover rounded-lg" />
                    <div>
                        <div class="font-bold text-pink-600">Combo Trà & Bánh</div>
                        <div class="text-gray-600 text-sm">Trà đào cam sả + Bánh ngọt</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 💬 Câu chuyện nhỏ -->
        <section class="max-w-6xl mx-auto mt-16 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-8 shadow-lg section-card">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-cyan-800 mb-4">💬 Câu chuyện nhỏ</h2>
                <img src="Photos/stories.jpg" alt="Khách hàng vui vẻ" class="w-full max-w-md h-64 object-cover rounded-xl shadow-md mx-auto mb-6 transition-transform duration-300 hover:scale-105">
            </div>
            <div class="space-y-8">
                <div class="bg-white rounded-xl p-6 shadow-md">
                    <p class="text-gray-700 leading-relaxed mb-4">“Có những buổi chiều, tôi ngồi một mình, tách trà bốc khói trước mặt. Mưa gõ nhịp đều trên mái tôn cũ, và tôi nghe trong gió là mùi cà phê quen thuộc – nồng nàn, ấm áp.</p>
                    <p class="text-gray-700 leading-relaxed mb-4">Ở Old Flavour, dường như thời gian chẳng còn vội nữa. Người ta đến, nói đôi ba câu, rồi lặng im mà vẫn thấy hiểu nhau.</p>
                    <p class="text-gray-700 leading-relaxed">Thế là đủ — để một ngày trở nên dịu dàng hơn một chút.” ☂️</p>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-md">
                    <h3 class="text-xl font-semibold text-cyan-700 mb-4">🌧️ Tách cà phê và buổi sáng lười biếng</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">Có những sáng, tôi chẳng muốn làm gì cả. Chỉ ngồi yên ở góc quen của quán, nhìn nắng rơi lấp lánh trên mặt bàn gỗ.</p>
                    <p class="text-gray-700 leading-relaxed mb-4">Anh pha chế mỉm cười, đặt trước mặt tôi một tách cà phê đen sóng sánh. “Hôm nay cô không vội, đúng không?” – anh hỏi.</p>
                    <p class="text-gray-700 leading-relaxed">Tôi chỉ khẽ gật đầu, hít một hơi dài. Hương cà phê len qua làn tóc, chạm nhẹ vào tâm trí – như thể có ai đó vừa kéo thời gian chậm lại một nhịp.</p>
                    <p class="text-gray-700 leading-relaxed">Ở Old Flavour, đôi khi “không làm gì cả” cũng là một cách để yêu cuộc sống hơn một chút. ☀️</p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="pages/stories.php" class="cta-button text-white px-6 py-3 rounded-full font-semibold inline-block">Đọc thêm câu chuyện</a>
            </div>
        </section>

        <!-- Đánh giá khách hàng -->
        <section class="max-w-5xl mx-auto mt-12 section-card">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Khách hàng nói gì về chúng tôi?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center transition-transform duration-300 hover:scale-105 hover:bg-gray-50">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-16 h-16 object-cover rounded-full mb-2" />
                    <div class="font-semibold">Nguyễn Văn A</div>
                    <div class="text-gray-500 text-sm text-center">“Không gian rất chill, cà phê ngon, nhân viên thân thiện!”</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center transition-transform duration-300 hover:scale-105 hover:bg-gray-50">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-16 h-16 object-cover rounded-full mb-2" />
                    <div class="font-semibold">Trần Thị B</div>
                    <div class="text-gray-500 text-sm text-center">“Bánh ngọt mềm, trà đào thơm, giá hợp lý!”</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center transition-transform duration-300 hover:scale-105 hover:bg-gray-50">
                    <img src="https://randomuser.me/api/portraits/men/65.jpg" class="w-16 h-16 object-cover rounded-full mb-2" />
                    <div class="font-semibold">Lê Minh C</div>
                    <div class="text-gray-500 text-sm text-center">“Combo bữa sáng tiện lợi, rất thích!”</div>
                </div>
            </div>
        </section>
        <?php include 'includes/chat-zalo.php'; ?>
        <section id="spinner-section" class="max-w-4xl mx-auto mt-16 mb-12">
            <h2 class="text-2xl font-extrabold text-pink-600 mb-6 flex items-center gap-2 justify-center"><i class="fa fa-gamepad text-pink-500"></i> Vòng quay may mắn</h2>
            <iframe id="spinner-frame" src="pages/spinner/spinner.php" style="width:100%;height:520px;border:none;border-radius:32px;box-shadow:0 8px 32px #f9a8d4;overflow:hidden;background:#fff5f8;" allowtransparency="true"></iframe>
            <div id="spinner-message" class="mt-6 text-center text-lg font-bold text-green-600" style="display:none;"></div>
        </section>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script>
    // Dropdown for menu
    function toggleDropdown(id) {
        var el = document.getElementById(id);
        if (el.classList.contains('opacity-0')) {
            el.classList.remove('opacity-0', 'invisible');
            el.classList.add('opacity-100', 'visible');
        } else {
            el.classList.remove('opacity-100', 'visible');
            el.classList.add('opacity-0', 'invisible');
        }
    }
    // Close dropdown when clicking outside
    window.addEventListener('click', function(e) {
        var menu = document.getElementById('menuDropdown');
        if (menu && !menu.contains(e.target) && !e.target.closest('[onclick*="toggleDropdown"]')) {
            menu.classList.remove('opacity-100', 'visible');
            menu.classList.add('opacity-0', 'invisible');
        }
    });
    // Slider JS
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slider-img');
    const dots = document.querySelectorAll('.slider-dot');
    function showSlide(idx) {
        slides.forEach((img, i) => {
            img.style.opacity = i === idx ? '1' : '0';
        });
        dots.forEach((dot, i) => {
            dot.className = 'slider-dot w-3 h-3 rounded-full ' + (i === idx ? 'bg-pink-500' : 'bg-gray-300');
        });
        currentSlide = idx;
    }
    function nextSlide() {
        let idx = (currentSlide + 1) % slides.length;
        showSlide(idx);
    }
    function prevSlide() {
        let idx = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(idx);
    }
    document.querySelectorAll('.slider-dot').forEach((dot, i) => {
        dot.onclick = () => showSlide(i);
    });
    setInterval(nextSlide, 5000);
    showSlide(0);
    window.addEventListener('message', function(event) {
        // Chỉ nhận message từ spinner.php
        if (event.data && event.data.type === 'spinner-result') {
            var msgBox = document.getElementById('spinner-message');
            msgBox.textContent = 'Chúc mừng! Bạn đã nhận được: ' + event.data.prize;
            msgBox.style.display = 'block';
            setTimeout(function() { msgBox.style.display = 'none'; }, 4000);
        }
    });
    </script>
</body>
</html>