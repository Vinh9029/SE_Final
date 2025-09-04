<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password - Coffee Shop</title>
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
    <div style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
        <div class="update-container">
            <div class="profile-icon" style="cursor:pointer;" onclick="window.location.href='index.php'">
                <img src="Photos/logo.png" alt="Logo" style="width:220px; height:100px; object-fit:cover;" />
            </div>
            <div class="update-header">Update Password</div>
            <form id="updateForm" onsubmit="handleUpdate(event)">
                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password" required id="newPassword">
                </div>
                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" required id="confirmNewPassword">
                </div>
                <div id="errorMessage" class="error-message"></div>
                <button type="submit" class="update-btn">Update Password</button>
            </form>
            <div class="back-link">
                <span>Back to</span>
                <a href="index.php">Login</a>
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
            if (newPassword !== confirmNewPassword) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Passwords do not match.';
                errorMessage.classList.add('show');
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 1500);
                return;
            }
            if (newPassword.length < 8) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password must be at least 8 characters.';
                errorMessage.classList.add('show');
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 2500);
                return;
            }
            if (!hasSymbol) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password must contain at least one special symbol.';
                errorMessage.classList.add('show');
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 2500);
                return;
            }
            if (!hasUppercase) {
                errorMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password must contain at least one uppercase letter.';
                errorMessage.classList.add('show');
                setTimeout(function(){ errorMessage.classList.remove('show'); errorMessage.innerText = ''; }, 2500);
                return;
            }
            errorMessage.innerText = "";
            errorMessage.classList.remove('show');
            alert("Password updated successfully! (Demo only)");
            window.location.href = "index.php";
        }
    </script>
</body>

</html>