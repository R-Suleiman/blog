<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>

<body style="background-color: #2a2a2a; font-family: Arial, sans-serif; padding: 20px; color: white;">
    <section style="background-color: #333; padding: 16px; border-radius: 8px;">
        <span style="font-size: 16px;">Hi, {{ $name }}</span>
        <p style="font-size: 16px; font-weight: bold;">Please click the button below to verify your email and activate
            your account</p>

        <a href="{{ $url }}" target="_blank"
            style="display: inline-block; background-color: #28a745; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 14px;">
            Verify Email
        </a>

        <p style="margin: 10px 0;"> This link will expire in 60 minutes.</p>

        <div style="display: flex; flex-direction:column; margin: 4px 0">
            <span style="color: white">Thanks,</span>
            <span style="color: rgb(59, 231, 59)">Mwanateknolojia Team</span>
        </div>
    </section>
</body>

</html>
