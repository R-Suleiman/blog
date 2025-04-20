<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>

<body style="background-color: #2a2a2a; font-family: Arial, sans-serif; padding: 20px; color: white;">
    <section style="background-color: #333; padding: 16px; border-radius: 8px;">
        <span style="font-size: 16px;">Hi, {{ $name }}</span>
        <p style="font-size: 14px; font-weight: bold;">You requested for a password reset token. Click the button below
            to reset your password</p>

        <a href="{{ url('reset-password/' . $token) }}"
            style="display: inline-block; background-color: #28a745; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 14px; margin: 10px 0;">
            Reset Password
        </a>

        <p style="font-size: 14px; font-weight: bold;"> Please ignore this Email if you did not request for password
            reset.</p>


        <div style="display: flex; flex-direction:column; margin: 4px 0">
            <span style="color: white">Thanks,</span>
            <span style="color: rgb(59, 231, 59)">Mwanateknolojia Team</span>
        </div>
    </section>
</body>

</html>
