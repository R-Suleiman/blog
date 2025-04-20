<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Blog POst</title>
</head>

<body style="background-color: #2a2a2a; font-family: Arial, sans-serif; padding: 20px; color: white;">
    <section style="background-color: #333; padding: 16px; border-radius: 8px;">
        <p style="font-size: 16px; font-weight: bold;">Hello, there is a new update on Mwanateknolojia blog!</p>

        <p style="margin: 10px 0;">Posted by: {{ $author }}</p>
        <p style="margin: 10px 0;">{{ $post->title }}</p>
        <p style="margin: 10px 0;">{{ Str::limit($post->description, 100) }}...</p>
        <span style="margin: 5px 0; text-decoration: underline; font-style: italic; color: #fff;"><a
                href="{{ $postUrl }}" style="color: #fff; font-weight: bold;">Read More</a></span>

        <p style="margin: 4px 0;">You are receiving this email because you subscribed to our newsletter.</p>
        <p style="margin: 4px 0;">If you no longer wish to receive these emails, you can <a href="{{ $unsubscribeUrl }}"
                style="text-decoration: underline; font-weight: bold;"> Unsubscribe here.</a></p>

        <div style="display: flex; flex-direction:column; margin: 8px 0">
            <span style="color: white">Thanks,</span>
            <span style="color: rgb(59, 231, 59)">Mwanateknolojia Team</span>
        </div>
    </section>
</body>

</html>
