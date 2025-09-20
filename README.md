## 📁 Cấu trúc thư mục dự án
```
project-root/
│── index.php              # Trang chính (homepage customer)
│── login.php              # Form đăng nhập chung
│── logout.php
│── register.php           # (nếu có đăng ký)
│
├── assets/                # CSS, JS, images, fonts
│   ├── css/
│   ├── js/
│   └── images/
│
├── includes/              # File include chung
│   ├── header.php
│   ├── footer.php
│   ├── db_connect.php
│   └── functions.php
│
├── customer/              # Khu vực khách hàng
│   ├── dashboard.php      # Trang tài khoản (account overview)
│   ├── orders.php         # Lịch sử đơn hàng
│   ├── profile.php        # Thông tin cá nhân
│   ├── address.php        # Sổ địa chỉ
│   └── rewards.php        # Điểm tích lũy / hạng thành viên
│
├── admin/                 # Khu vực quản trị
│   ├── index.php          # Dashboard admin
│   ├── products/          # Quản lý sản phẩm
│   │   ├── list.php
│   │   ├── add.php
│   │   ├── edit.php
│   │   └── delete.php
│   ├── orders/            # Quản lý đơn hàng
│   │   ├── list.php
│   │   ├── detail.php
│   ├── customers/         # Quản lý khách hàng
│   │   ├── list.php
│   │   └── detail.php
│   └── reports/           # Báo cáo, thống kê
│       ├── sales.php
│       └── revenue.php
│
└── api/                   # REST API (nếu có)
    ├── customer_api.php
    └── admin_api.php
```
