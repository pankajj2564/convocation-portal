<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; margin: 0;">
    <div style="max-width: 600px; background: #ffffff; padding: 0; border-radius: 8px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); overflow: hidden;">
        
        <!-- Header with Logo -->
        <div style="background: #ffffff; padding: 20px; text-align: center; border-bottom: 2px solid #f0f0f0;">
            <img src="{{ asset('images/full-logo.gif') }}" alt="CGCJ Logo" style="width:200px;height: auto; display: block; margin: 0 auto;">
        </div>

        <!-- Main Body Content -->
        <div style="padding: 30px 20px;">
            <h2 style="color: #0d6efd; margin-top: 0;">CGC Jhanjeri Convocation 2026</h2>
            <p>Hello <strong>{{ $name }}</strong>,</p>
            <p>Your One-Time Password (OTP) to login to the CGC Jhanjeri, Convocation 2026 is:</p>
            
            <div style="background: #e9ecef; padding: 15px; text-align: center; font-size: 24px; font-weight: bold; letter-spacing: 5px; color: #333; border-radius: 5px; margin: 20px 0;">
                {{ $otp }}
            </div>
            
            <p style="margin-top: 20px; color: #666; font-size: 14px;">This OTP is valid for 10 minutes. Do not share this OTP with anyone.</p>
        </div>

        <!-- Footer with Copyright & Contact -->
        <div style="background: #f8f9fa; padding: 15px 20px; text-align: center; border-top: 1px solid #e9ecef; color: #666; font-size: 13px;">
            <p style="margin: 0 0 5px 0;">Contact Support: <strong>+91-XXXXXXXXXX</strong> | <strong>info@cgc.ac.in</strong></p>
            <p style="margin: 0;">&copy; {{ date('Y') }} CGC Jhanjeri, Mohali. All rights reserved.</p>
        </div>

    </div>
</body>
</html>