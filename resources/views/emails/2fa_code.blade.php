<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #eeeeee;
        }
        .header img {
            max-width: 120px;
        }
        .header h2 {
            color: #333333;
            margin-top: 10px;
        }
        .content {
            text-align: center;
            padding: 20px 0;
        }
        .otp-code {
            font-size: 24px;
            font-weight: bold;
            background-color: #f8f9fa;
            border-radius: 5px;
            display: inline-block;
            padding: 10px 20px;
            color: #ff9800;
            margin-top: 10px;
        }
        .message {
            font-size: 16px;
            color: #666666;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            margin-top: 30px;
            border-top: 1px solid #eeeeee;
            padding-top: 20px;
        }
        .footer a {
            color: #ff9800;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ asset('logo.png') }}" alt="Sanifect LMS">
            <h2>Two-Factor Authentication</h2>
        </div>

        <!-- OTP Code Content -->
        <div class="content">
            <p>Hello,</p>
            <p>Use the following one-time password (OTP) to complete your login:</p>
            <div class="otp-code">{{ $code }}</div>
            <p class="message">This code will expire in <strong>10 minutes</strong>. Please do not share it with anyone.</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>If you did not request this code, please ignore this email or <a href="#">contact support</a>.</p>
            <p>&copy; {{ date('Y') }} Sanifect LMS. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
