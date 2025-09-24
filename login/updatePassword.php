<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password - Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: url('../Photos/login_background.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
        }

        .update-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.32);
            padding: 40px 32px 32px 32px;
            width: 350px;
            max-width: 95vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .update-header {
            color: #fc466b;
            margin-bottom: 18px;
            font-size: 2rem;
            font-weight: 600;
        }

        .profile-icon {
            font-size: 3rem;
            color: #fc466b;
            margin-bottom: 16px;
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
            background: rgba(255, 255, 255, 0.25);
            color: #222;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
        }

        .input-group input::placeholder {
            color: #888;
        }

        .update-btn {
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

        .update-btn:hover {
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
            color: #fff;
            background: linear-gradient(90deg, rgb(220, 65, 96) 0%, rgb(151, 102, 28) 100%);
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 1rem;
            text-align: center;
            opacity: 0;
            transition: opacity 0.4s, transform 0.4s;
            padding: 12px 18px;
            box-shadow: 0 2px 12px rgba(127, 97, 47, 0.18);
            position: relative;
            transform: translateY(-10px);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .error-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        .error-message i {
            font-size: 1.3rem;
            color: #fff;
            margin-right: 8px;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-4px);
            }

            40% {
                transform: translateX(4px);
            }

            60% {
                transform: translateX(-4px);
            }

            80% {
                transform: translateX(4px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <div style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
        <div class="update-container">
            <div class="profile-icon" style="cursor:pointer;" onclick="window.location.href='user.php'">
                <img src="../Photos/logo.png" alt="Logo" style="width:220px; height:100px; object-fit:cover;" />
            </div>
            <div class="update-header">Update Password</div>
            <form id="updateForm" onsubmit="handleUpdate(event)">
                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="New Password" required id="newPassword" oninput="checkStrength()">
                </div>
                <div class="w-full flex items-center gap-2 mb-2">
                    <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div id="progressBar" class="h-2 rounded-full transition-all duration-300 bg-red-500" style="width:0%"></div>
                    </div>
                    <span id="progressLabel" class="text-xs font-semibold text-gray-700 min-w-[60px] text-right"></span>
                </div>
                <div id="strengthText" class="text-xs mb-1 font-semibold"></div>
                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Confirm New Password" required id="confirmNewPassword">
                </div>
                <div id="errorMessage" class="error-message"></div>
                <button type="submit" class="update-btn">Update Password</button>
            </form>
            <div class="back-link">
                <span>Back to</span>
                <a href="user.php">Login</a>
            </div>
        </div>
    </div>
    <script>
        function handleUpdate(e) {
            e.preventDefault();
            var newPassword = document.getElementById('newPassword').value;
            var confirmNewPassword = document.getElementById('confirmNewPassword').value;
            var errorMessage = document.getElementById('errorMessage');
            var hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(newPassword);
            var hasUppercase = /[A-Z]/.test(newPassword);
            let msg = '';
            if (newPassword !== confirmNewPassword) {
                msg = '<i class="fa-solid fa-triangle-exclamation"></i> Passwords do not match.';
            } else if (newPassword.length < 8) {
                msg = '<i class="fa-solid fa-triangle-exclamation"></i> Password must be at least 8 characters.';
            } else if (!hasSymbol) {
                msg = '<i class="fa-solid fa-triangle-exclamation"></i> Password must contain at least one special symbol.';
            } else if (!hasUppercase) {
                msg = '<i class="fa-solid fa-triangle-exclamation"></i> Password must contain at least one uppercase letter.';
            }
            if (msg) {
                errorMessage.innerHTML = msg;
                errorMessage.classList.add('show');
                setTimeout(function() {
                    errorMessage.classList.remove('show');
                    errorMessage.innerText = '';
                }, 2500);
                return;
            }
            errorMessage.innerText = "";
            errorMessage.classList.remove('show');
            alert("Password updated successfully! (Demo only)");
            window.location.href = "index.php";
        }

        function checkStrength() {
            var pwd = document.getElementById('newPassword').value;
            var bar = document.getElementById('progressBar');
            var label = document.getElementById('progressLabel');
            var text = document.getElementById('strengthText');
            // Criteria
            var hasLength = pwd.length >= 8;
            var hasNumber = /[0-9]/.test(pwd);
            var hasLower = /[a-z]/.test(pwd);
            var hasUpper = /[A-Z]/.test(pwd);
            var hasSpecial = /[^A-Za-z0-9]/.test(pwd);
            var met = [hasLength, hasNumber, hasLower, hasUpper, hasSpecial].filter(Boolean).length;
            // Progress bar
            var percent = met * 20;
            var colors = [
                "bg-red-500",
                "bg-orange-400",
                "bg-yellow-400",
                "bg-blue-400",
                "bg-green-500"
            ];
            var labels = [
                "Very Weak",
                "Weak",
                "Fair",
                "Strong",
                "Very Strong"
            ];
            bar.style.width = percent + "%";
            bar.className = "h-2 rounded-full transition-all duration-300 " + colors[met === 0 ? 0 : met - 1];
            label.innerText = labels[met === 0 ? 0 : met - 1];
            if (!pwd) {
                label.innerText = '';
                bar.style.width = '0%';
                text.innerHTML = '<span class="text-gray-400">Start typing to check password strength...</span>';
            } else {
                text.innerText = '';
            }
        }
    </script>
</body>
</html>