<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Coffee Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

        .reset-container {
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

        .reset-header {
            color: #fc466b;
            margin-bottom: 18px;
            font-size: 2rem;
            font-weight: 600;
        }

        .profile-icon {
            font-size: 3rem;
            color: #fc466b;
            margin-bottom: 2px;
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

        .reset-btn {
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

        .reset-btn:hover {
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
    </style>
</head>

<body>
    <div style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
        <!-- <div class="side-image-box">
            <img id="login_banner" src="Photos/login_background1 (2).jpg" alt="Login Illustration" style="width:100%; height:100%; object-fit:cover; border-radius:20px 0 0 20px;" />
        </div> -->
        <div class="reset-container">
            <div class="profile-icon" style="cursor:pointer;" onclick="window.location.href='user.php'">
                <img src="Photos/logo.png" alt="Logo" style="width:210px; height:100px; object-fit:cover;" />
            </div>
            <div class="reset-header">Reset Password</div>
            <form id="resetForm" onsubmit="handleReset(event)">
                <div class="input-group">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" required id="resetEmail">
                </div>
                <div style="margin-bottom: 18px; width: 100%; display: flex; justify-content: center;">
                    <div class="g-recaptcha" data-sitekey="6LeZargrAAAAAFqX96DUyUOSDVAtmZSOGPeHN3GZ"></div>
                </div>
                <button type="submit" class="reset-btn">Send OTP</button>
            </form>
            <div id="otpSection" style="display:none; margin-top:20px; width:100%;">
                <div class="input-group">
                    <i class="fa-solid fa-key"></i>
                    <input type="text" placeholder="Enter OTP code" maxlength="6" id="otpInput" required>
                </div>
                <button class="reset-btn" onclick="verifyOTP()">Verify OTP</button>
                <div id="otpMessage" style="color:#fc466b; margin-top:8px;"></div>
            </div>
            <div class="back-link">
                <span>Remembered your password?</span>
                <a href="user.php">Login</a>
            </div>
        </div>
    </div>
    <script>
        // Simulate sending OTP and verifying
        let generatedOTP = '';
        let otpAttempts = 0;
        const maxAttempts = 3;

        function handleReset(e) {
            e.preventDefault();
            var recaptchaResponse = grecaptcha.getResponse();
            if (!recaptchaResponse) {
                document.getElementById('otpMessage').innerText = "Please verify that you are not a robot.";
                return;
            }
            const recapValue = document.getElementById('recapInput').value.trim().toLowerCase();
            if (recapValue !== 'i am not a robot') {
                document.getElementById('otpMessage').innerText = "Please confirm you are not a robot by typing 'I am not a robot'.";
                return;
            }
            // Simulate sending email and OTP
            generatedOTP = Math.floor(100000 + Math.random() * 900000).toString();
            otpAttempts = 0;
            document.getElementById('otpSection').style.display = 'block';
            document.getElementById('resetForm').style.display = 'none';
            document.getElementById('otpMessage').innerText = 'An OTP code has been sent to your email. (Demo: ' + generatedOTP + ')';
            // In real system, send email with link to updatePassword.php and OTP code
        }

        function verifyOTP() {
            const otpInput = document.getElementById('otpInput').value;
            otpAttempts++;
            if (otpInput === generatedOTP) {
                window.location.href = 'updatePassword.php';
            } else if (otpAttempts < maxAttempts) {
                document.getElementById('otpMessage').innerText = 'Invalid OTP code. Attempts left: ' + (maxAttempts - otpAttempts);
            } else {
                document.getElementById('otpMessage').innerText = 'You have exceeded the maximum number of attempts. Please try again.';
                document.getElementById('otpInput').disabled = true;
            }
        }
    </script>
</body>

</html>