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
