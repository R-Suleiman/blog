// toggle nav
const nav = document.querySelector('.nav')
const openNavBtn = document.querySelector('.open-nav')
const closeNavBtn = document.querySelector('.close-nav')

openNavBtn.addEventListener('click', () => {
    nav.classList.remove('hidden')
    nav.classList.add('block')
    openNavBtn.classList.remove('block')
    openNavBtn.classList.add('hidden')
    closeNavBtn.classList.remove('hidden')
    closeNavBtn.classList.add('block')
})

closeNavBtn.addEventListener('click', () => {
    nav.classList.remove('block')
    nav.classList.add('hidden')
    closeNavBtn.classList.remove('block')
    closeNavBtn.classList.add('hidden')
    openNavBtn.classList.remove('hidden')
    openNavBtn.classList.add('block')
})

// Likes functionality
document.querySelectorAll('.like-btn').forEach((button) => {
    button.addEventListener('click', () => {
        const topicId = button.dataset.id;
        const likesCountSpan = button.querySelector('.likes-count');

        // Optimistically update the UI
        const isLiked = button.classList.contains('liked');
        button.classList.toggle('liked');
        let currentLikes = parseInt(likesCountSpan.textContent);
        likesCountSpan.textContent = isLiked ? currentLikes - 1 : currentLikes + 1;

        // Send the server request
        fetch(`/topics/${topicId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status !== (isLiked ? 'unliked' : 'liked')) {

                    button.classList.toggle('liked'); // Revert the button style
                    likesCountSpan.textContent = currentLikes; // Revert the likes count
                }
            })
            .catch((error) => {
                button.classList.toggle('liked');
                likesCountSpan.textContent = currentLikes;
            });
    });
});

