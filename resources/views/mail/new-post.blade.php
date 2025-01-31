<section style="width: 92%; margin: 0 auto; background-color: rgb(5, 46, 5); padding: 16px;">
    <h2 style="font-size: 18px; color: #fff;">Hello, there is a new update on Mwanateknolojia blog!</h2>

    <p style="color: white">Posted by: {{ $author }}</p>
    <h3 style="margin: 10px 0; color: white">{{ $post->title }}</h3>
    <p style="color: white">{{ Str::limit($post->description, 100) }}...</p>
    <span style="margin: 5px 0; text-decoration: underline; font-style: italic; color: #fff;"><a href="{{ $postUrl }}" style="color: #fff; font-weight: bold;">Read More</a></span>

    <p style="margin: 4px 0; color: #fff;">You are receiving this email because you subscribed to our newsletter.</p>
    <p style="margin: 4px 0; color: #fff;">If you no longer wish to receive these emails, you can <a href="{{ $unsubscribeUrl }}" style="text-decoration: underline; color: #fff; font-weight: bold;"> Unsubscribe here.</a></p>

    <div style="display: flex; flex-direction:column; margin: 8px 0">
        <span style="color: white">Thanks,</span>
        <span style="color: rgb(59, 231, 59)">Mwanateknolojia</span>
    </div>
</section>
