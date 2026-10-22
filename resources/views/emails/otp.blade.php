<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #0d6efd;">University Convocation Portal</h2>
        <p>Hello <strong>{{ $name }}</strong>,</p>
        <p>Your One-Time Password (OTP) to login to the CGC Jhanjeri, Convocation 2026 is:</p>
        <div style="background: #e9ecef; padding: 15px; text-align: center; font-size: 24px; font-weight: bold; letter-spacing: 5px; color: #333; border-radius: 5px;">
            {{ $otp }}
        </div>
        <p style="margin-top: 20px; color: #666; font-size: 14px;">This OTP is valid for 10 minutes. Do not share this OTP with anyone.</p>
    </div>
</body>
</html>