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

// confirm delete action in a button
document.addEventListener('DOMContentLoaded', () => {
    const deleteBtns = document.querySelectorAll('.delete-btn');

    deleteBtns.forEach((btn) => {
        btn.addEventListener('click', (event) => {
            const isConfirmed = confirm('Are you sure you want to delete?');
            if (!isConfirmed) {
                event.preventDefault();
            }
        });
    });
});

// flash message controll
document.addEventListener("DOMContentLoaded", function () {
    const flashMessage = document.getElementById("flash-message");
    if (flashMessage) {

        setTimeout(() => {
            flashMessage.style.transition = "opacity 0.5s ease";
            flashMessage.style.opacity = "0";
            setTimeout(() => flashMessage.remove(), 500);
        }, 5000);
    }
});
