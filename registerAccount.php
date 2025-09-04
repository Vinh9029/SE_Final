<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account - Coffee Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: url('Photos/test2.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
        }
        .register-container {
            background: rgba(255,255,255,0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.32);
            padding: 40px 32px 32px 32px;
            width: 350px;
            max-width: 95vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .register-header {
            color: #fc466b;
            margin-bottom: 18px;
            font-size: 2rem;
            font-weight: 600;
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
            color: #fc466b;
            font-size: 1.2rem;
            z-index: 2;
        }
        .input-group input {
            width: 100%;
            padding: 12px 12px 12px 44px;
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
        .register-btn {
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
        .register-btn:hover {
            background: #3f5efb;
        }
        .back-link {
            margin-top: 16px;
            text-align: center;
            color: #fff;
            font-size: 1rem;
        }
        .back-link a {
            color: #fc466b;
            text-decoration: underline;
            margin-left: 6px;
            cursor: pointer;
            transition: color 0.2s;
        }
        .back-link a:hover {
            color: #3f5efb;
        }
        .error-message {
            color: #fc466b;
            margin-bottom: 10px;
            font-size: 1rem;
            text-align: center;
            opacity: 0;
            transition: opacity 0.4s;
        }
        .error-message.show {
            opacity: 1;
        }
    </style>
</head>
<body>
    
    <div class="register-container">
        <div class="profile-icon"  style="cursor:pointer;" onclick="window.location.href='index.php'">
            <img src="Photos/logo.png" alt="Logo" style="width:210px; height:100px; object-fit:cover;" />
        </div>
        <div class="register-header">Register Account</div>
        <form>
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="New Password" required id="password">
            </div>
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Confirm New Password" required id="confirm_password">
            </div>
            <div id="errorMessage" class="error-message"></div>
            <button type="submit" class="register-btn">Create Account</button>
        </form>
        <div class="back-link">
            <span>Already have an account?</span>
            <a href="index.php">Login</a>
        </div>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var errorMessage = document.getElementById('errorMessage');
            var hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
            var hasUppercase = /[A-Z]/.test(password);
            if (password !== confirmPassword) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Passwords do not match.';
                errorMessage.classList.add('show');
                e.preventDefault();
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 1500);
                return;
            }
            if (password.length < 8) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password must be at least 8 characters.';
                errorMessage.classList.add('show');
                e.preventDefault();
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 2500);
                return;
            }
            if (!hasSymbol) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password must contain at least one symbol.';
                errorMessage.classList.add('show');
                e.preventDefault();
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 2500);
                return;
            }
            if (!hasUppercase) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password must contain at least one uppercase letter.';
                errorMessage.classList.add('show');
                e.preventDefault();
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 2500);
                return;
            }
            errorMessage.innerText = "";
            errorMessage.classList.remove('show');
        });
    </script>
</body>
</html>
