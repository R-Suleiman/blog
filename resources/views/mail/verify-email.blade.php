<section style="width: 92%; margin: 0 auto; background-color: rgb(5, 46, 5); padding: 16px;">
    <span style="font-size: 16px; color: white">Hi, {{ $name }}</span>
    <p style="font-size: 14px; color: #fff;">Please click the button below to verify your email and activate your account</p>

    <a href="{{ $url }}" target="_blank"
       style="display: inline-block; background-color: #28a745; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 14px;">
        Verify Email
    </a>

    <p style="margin: 10px 0; color: white"> This link will expire in 60 minutes.</p>

    <div style="display: flex; flex-direction:column; margin: 4px 0">
        <span style="color: white">Thanks,</span>
        <span style="color: rgb(59, 231, 59)">Mwanateknolojia</span>
    </div>
</section>
