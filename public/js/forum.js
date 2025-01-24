// Live comments event handler
window.Echo.channel("comments").listen("CommentEvent", (data) => {
    const commentsSection = document.getElementById("comments-section");

    if (data.comment.reply_to) {
        const parentComment = document.getElementById(
            `comment-${data.comment.reply_to}`
        );
        if (parentComment) {
            const repliesSection = parentComment.querySelector(".replies");
            const newReply = `
                 <div class="w-full flex my-2">
               <div class="w-14 rounded-full border border-green-400 mr-2 h-fit">
                 ${
                     data.comment.commentable_type === "App\\Models\\User"
                         ? `<a href="#"><img src="/storage/images/profile/user/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`
                         : `<a href="#"><img src="/storage/images/profile/Admin/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`
                 }
                    </div>
                <div class="flex flex-col">
            <div class="w-full flex items-center">
                <span class="mr-2 text-gray-800 font-semibold">
                    ${data.comment.commentable.first_name} ${
                data.comment.commentable.last_name
            }
                </span>
                <span class="mx-1">&#x1F784;</span>
                <span class="text-sm text-gray-600">
                    ${formatTime(data.comment.created_at)}
                </span>
            </div>
            <p class="my-2 text-gray-700 text-justify">${
                data.comment.comment
            }</p>
             <div class="text-gray-700">
            <span><i class="far fa-heart"></i> ${data.comment.likes}</span>
            <span class="mx-2"><i class="fa fa-reply"></i>  ${
                data.comment.replies_count
            }</span>
             <span class="reply-link cursor-pointer hover:text-gray-950" data-id="${
                 data.comment.id
             }" data-author="${data.comment.commentable.first_name}">Reply</span>
                </div>
                </div>
            </div>`;

            repliesSection.insertAdjacentHTML("beforeend", newReply);
        }
    } else {
        const newComment = `
        <div class="w-full flex my-2">
               <div class="w-14 rounded-full border border-green-400 mr-2 h-fit">
            ${
                data.comment.commentable_type === "App\\Models\\User"
                    ? `<a href="#"><img src="/storage/images/profile/user/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`
                    : `<a href="#"><img src="/storage/images/profile/Admin/${data.comment.commentable.photo}" alt="author photo" class="object-center w-full rounded-full"></a>`
            }
        </div>
                <div class="flex flex-col">
            <div class="w-full flex items-center">
                <span class="mr-2 text-gray-800 font-semibold">
                    ${data.comment.commentable.first_name} ${
            data.comment.commentable.last_name
        }
                </span>
                <span class="mx-1">&#x1F784;</span>
                <span class="text-sm text-gray-600">
                    ${formatTime(data.comment.created_at)}
                </span>
            </div>
            <p class="my-2 text-gray-700 text-justify">${
                data.comment.comment
            }</p>
             <div class="text-gray-700">
            <span><i class="far fa-heart"></i> ${data.comment.likes}</span>
            <span class="mx-2"><i class="fa fa-reply"></i>  ${
                data.comment.replies_count
            }</span>
             <span class="reply-link cursor-pointer hover:text-gray-950" data-id="${
                 data.comment.id
             }" data-author="${data.comment.commentable.first_name}">Reply</span>
        </div>
                </div>
            </div>
        `;

        commentsSection.insertAdjacentHTML("beforeend", newComment);
    }
});

// comment form submission
// document
//     .getElementById("comment-form")
//     .addEventListener("submit", function (e) {
//         e.preventDefault();

//         const formData = new FormData(this);

//         fetch("/comments", {
//             method: "POST",
//             body: formData,
//             headers: {
//                 "X-CSRF-TOKEN": document.querySelector(
//                     'meta[name="csrf-token"]'
//                 ).content,
//             },
//         })
//             .then((response) => response.json())
//             .then((data) => {
//                 this.reset();
//             })
//             .catch((error) => console.error("Error:", error));
//     });

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

// comment and replies handler
const commentForm = document.getElementById("comment-form");
document.addEventListener("DOMContentLoaded", function () {
    const commentInput = document.getElementById("comment-input");
    const replyIndicator = document.getElementById("reply-indicator");

    let replyToId = null;

    document.querySelectorAll(".reply-link").forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const commentId = this.dataset.id;
            const authorName = this.dataset.author;

            replyToId = commentId;
            // commentInput.value = `@${authorName}: `;

            // Show the reply indicator
            replyIndicator.innerHTML = `
                Replying to <strong>${authorName}:</strong>
                <button id="cancel-reply" class="text-red-500 ml-2">Cancel</button>
            `;
            replyIndicator.style.display = "block";

            // cancel functionality
            document
                .getElementById("cancel-reply")
                .addEventListener("click", function () {
                    replyToId = null;
                    commentInput.value = "";
                    replyIndicator.style.display = "none";
                });
        });
    });

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
