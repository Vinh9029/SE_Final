<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #fc466b 0%, #3f5efb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .login-container {
            background: rgba(255,255,255,0.13);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            padding: 40px 32px 32px 32px;
            width: 400px;
            max-width: 95vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .profile-icon {
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            padding: 18px;
            margin-bottom: 18px;
            font-size: 2.5rem;
            color: #fff;
        }
        .switch-btn {
            background: #fff;
            color: #3f5efb;
            border: none;
            border-radius: 20px;
            padding: 6px 18px;
            margin-bottom: 18px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
        }
        .switch-btn.active {
            background: #fc466b;
            color: #fff;
        }
        .input-group {
            width: 100%;
            margin-bottom: 18px;
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-group i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #3f5efb;
            font-size: 1.2rem;
            z-index: 2;
        }
        .input-group input {
            width: 100%;
            padding: 12px 60px 12px 44px;
            border-radius: 10px;
            border: none;
            background: rgba(255,255,255,0.25);
            color: #222;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
        }
        .input-group input::placeholder {
            color: #888;
        }
        .toggle-password {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2;
            color: #3f5efb;
            font-size: 1.3rem;
            background: transparent;
            border: none;
            padding: 0;
            display: flex;
            align-items: center;
        }
        .toggle-password:hover {
            color: #fc466b;
        }
        .hint {
            font-size: 0.85rem;
            color: #fc466b;
            margin-top: 2px;
            margin-left: 4px;
            margin-bottom: -10px;
        }
        .options {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        .remember {
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            color: #fff;
        }
        .remember input {
            margin-right: 6px;
        }
        .forgot {
            color: #fff;
            text-decoration: underline;
            font-size: 0.95rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .forgot:hover {
            color: #fc466b;
        }
        .login-btn {
            width: 100%;
            background: #fc466b;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .login-btn:hover {
            background: #3f5efb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="profile-icon">
            <i class="fa-solid fa-user"></i>
        </div>
        <div style="display: flex; gap: 8px; margin-bottom: 10px;">
            <button class="switch-btn active" id="userBtn" onclick="switchRole('user')">User</button>
            <button class="switch-btn" id="adminBtn" onclick="switchRole('admin')">Admin</button>
        </div>
        <form>
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" required id="password">
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fa-regular fa-eye" id="eyeIcon"></i>
                </span>
            </div>
            <div class="options">
                <label class="remember"><input type="checkbox"> Remember me</label>
                <span class="forgot" onclick="alert('Password recovery coming soon!')">Forgot your password?</span>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
    </div>
    <script>
        function switchRole(role) {
            const userBtn = document.getElementById('userBtn');
            const adminBtn = document.getElementById('adminBtn');
            if (role === 'user') {
                userBtn.classList.add('active');
                adminBtn.classList.remove('active');
                document.querySelector('.profile-icon i').className = 'fa-solid fa-user';
            } else {
                adminBtn.classList.add('active');
                userBtn.classList.remove('active');
                document.querySelector('.profile-icon i').className = 'fa-solid fa-user-tie';
            }
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.className = 'fa-regular fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                eyeIcon.className = 'fa-regular fa-eye';
            }
        }
    </script>
</body>
</html>
