<section style="width: 92%; margin: 0 auto; background-color: rgb(5, 46, 5); padding: 16px;">
    <div style="width: 8.33%; margin-bottom: 16px; color: #fff;">
        <img src="{{ asset('img/user.avif') }}" alt="logo" style="width: 100%; margin-bottom: 16px;">
    </div>

    <span style="font-size: 16px; color: white">Hi, {{ $name }}</span>
    <p style="font-size: 14px; color: #fff;">You requested for a password reset token. Click the button below to reset your password</p>

    <a href="{{ url('reset-password/' . $token) }}"
       style="display: inline-block; background-color: #28a745; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 14px;">
        Reset Password
    </a>

    <p style="margin: 10px 0; color: white"> Please ignore this Email if you did not request for password reset.</p>

    <div style="display: flex; flex-direction:column; margin: 4px 0">
        <span style="color: white">Thanks,</span>
        <span style="color: rgb(59, 231, 59)">Blog</span>
    </div>
</section>
