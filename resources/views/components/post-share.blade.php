<div class="w-full">
    <div class="w-fit ml-auto flex items-center">
        <span class="text-gray-600 mr-3 text-lg">Share: </span>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="text-blue-600 text-lg"><i class="fab fa-facebook"></i></a>
        <a href="https://www.twitter.com/intent/tweet?text=Check this out!&url={{ url()->current() }}" target="_blank" class="text-lg mx-3"><i class="fab fa-x"></i></a>
        <a href="https://api.whatsapp.com/send?text=Check this out! {{ url()->current() }}" target="_blank" class="text-lg text-green-600"><i class="fab fa-whatsapp"></i></a>
        <a href="https://t.me/share/url?url={{ url()->current() }}&text=Check this out!" target="_blank" class="text-lg text-blue-500 mx-3"><i class="fab fa-telegram"></i></a>

        <button onclick="copyToClipboard()"><i class="fa fa-link"></i></button>
    </div>
</div>

<script>
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link copied to Clipboard')
        }).catch((error) => {
            console.error('Failed to copy: ', error)
        })
    }
</script>
