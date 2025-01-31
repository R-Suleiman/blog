window.Echo.channel("comments").listen("CommentEvent", (data) => {
    const parentComment = document.getElementById(`comment-${data.comment.reply_to}`);

    if (parentComment) {
        // Locate or create the replies section inside the parent comment
        let repliesSection = parentComment.querySelector(".replies #comment-replies");

        if (!repliesSection) {
            // If replies section doesn't exist, create it
            const repliesContainer = document.createElement("div");
            repliesContainer.className = "replies w-full my-1";
            repliesContainer.innerHTML = `
                <div class="flex items-center">
                    <div class="flex-grow border-t border-gray-400"></div>
                    <span class="toggle-replies mx-2 text-gray-700 cursor-pointer"><span id="reply-status">view</span> replies</span>
                    <div class="flex-grow border-t border-gray-400"></div>
                </div>
                <div class="w-full" id="comment-replies"></div>
            `;
            parentComment.querySelector(".comment-content").appendChild(repliesContainer);
            repliesSection = repliesContainer.querySelector("#comment-replies");
        }

        // Create the new reply HTML
        const newReply = `
            <div class="comment-container w-full flex my-2" id="comment-${data.comment.id}">
                <div class="w-14 rounded-full border border-green-400 mr-2 h-fit">
                    ${data.comment.commentable_type === "App\\Models\\User"
                        ? `<a href="#"><img src="/storage/images/profile/user/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`
                        : `<a href="#"><img src="/storage/images/profile/Admin/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`}
                </div>
                <div class="comment-content flex flex-col">
                    <div class="w-full flex items-center">
                        <span class="mr-2 text-gray-800 font-semibold">
                            ${data.comment.commentable.first_name} ${data.comment.commentable.last_name}
                        </span>
                        <span class="mx-1">&#x1F784;</span>
                        <span class="text-sm text-gray-600">${formatTime(data.comment.created_at)}</span>
                    </div>
                    <p class="my-2 text-gray-700 text-justify">${data.comment.comment}</p>
                    <div class="text-gray-700">
                        <span><i class="far fa-heart"></i> ${data.comment.likes}</span>
                        <span class="mx-2"><i class="fa fa-reply"></i> 0</span>
                        <span class="reply-link cursor-pointer hover:text-gray-950" data-id="${data.comment.id}" data-author="${data.comment.commentable.first_name}">Reply</span>
                    </div>
                </div>
            </div>
        `;

        // Append the new reply
        repliesSection.insertAdjacentHTML("beforeend", newReply);
    } else {
        // Handle adding a top-level comment
        const commentsSection = document.getElementById("comments-section");

        const newComment = `
            <div class="comment-container w-full flex my-4" id="comment-${data.comment.id}">
                <div class="w-14 rounded-full border border-green-400 mr-2 h-fit">
                    ${data.comment.commentable_type === "App\\Models\\User"
                        ? `<a href="#"><img src="/storage/images/profile/user/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`
                        : `<a href="#"><img src="/storage/images/profile/Admin/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`}
                </div>
                <div class="comment-content flex flex-col">
                    <div class="w-full flex items-center">
                        <span class="mr-2 text-gray-800 font-semibold">
                            ${data.comment.commentable.first_name} ${data.comment.commentable.last_name}
                        </span>
                        <span class="mx-1">&#x1F784;</span>
                        <span class="text-sm text-gray-600">${formatTime(data.comment.created_at)}</span>
                    </div>
                    <p class="my-2 text-gray-700 text-justify">${data.comment.comment}</p>
                    <div class="text-gray-700">
                        <span><i class="far fa-heart"></i> ${data.comment.likes}</span>
                        <span class="mx-2"><i class="fa fa-reply"></i> 0</span>
                        <span class="reply-link cursor-pointer hover:text-gray-950" data-id="${data.comment.id}" data-author="${data.comment.commentable.first_name}">Reply</span>
                    </div>
                </div>
            </div>
        `;

        commentsSection.insertAdjacentHTML("beforeend", newComment);
    }
});


// toggle comment replies display
const toggleReplies = document.querySelectorAll(".toggle-replies");
toggleReplies.forEach((toggle) => {
    toggle.addEventListener("click", function () {
        const commentContainer = toggle.closest(".comment-container");
        const commentsReplies =
            commentContainer.querySelector("#comment-replies");
        const commentsRepliesStatus = toggle.querySelector("#reply-status");

        if (commentsReplies) {
            commentsReplies.classList.toggle("hidden");
            commentsRepliesStatus.innerText =
                commentsReplies.classList.contains("hidden") ? "View" : "Hide";
        }
    });
});

// Comment form handling
document.addEventListener("DOMContentLoaded", function () {
    const commentForm = document.getElementById("comment-form");
    const commentInput = document.getElementById("comment-input");
    const replyIndicator = document.getElementById("reply-indicator");

    let replyToId = null;

    // Delegate reply button click events
    document.getElementById("comments-section").addEventListener("click", function (e) {
        if (e.target.classList.contains("reply-link")) {
            e.preventDefault();

            const commentId = e.target.dataset.id;
            const authorName = e.target.dataset.author;

            replyToId = commentId;
            commentInput.focus();

            // Show the reply indicator
            replyIndicator.innerHTML = `
                Replying to <strong>${authorName}:</strong>
                <button id="cancel-reply" class="text-red-500 ml-2">Cancel</button>
            `;
            replyIndicator.style.display = "block";

            // Handle cancel functionality
            document.getElementById("cancel-reply").addEventListener("click", function () {
                replyToId = null;
                commentInput.value = "";
                replyIndicator.style.display = "none";
            });
        }
    });

    // Submit comment form
    commentForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        if (replyToId) {
            formData.append("reply_to", replyToId);
        }

        fetch("/comments", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                commentInput.value = "";
                replyIndicator.style.display = "none";
                replyToId = null;
            })
            .catch((error) => console.error("Error:", error));
    });
});


// Likes functionality
document.querySelectorAll('.comment-like-btn').forEach((button) => {
    button.addEventListener('click', () => {
        const commentId = button.dataset.id;
        const likesCountSpan = button.querySelector('.comment-likes-count');

        // Optimistically update the UI
        const isLiked = button.classList.contains('liked');
        button.classList.toggle('liked');
        let currentLikes = parseInt(likesCountSpan.textContent);
        likesCountSpan.textContent = isLiked ? currentLikes - 1 : currentLikes + 1;

        // Send the server request
        fetch(`/comments/${commentId}/like`, {
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
