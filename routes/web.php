<?php

use App\Http\Controllers\Admins\ForumController;
use App\Http\Controllers\AuthController\VerificationController;
use App\Http\Controllers\RootAdmin\AdminController;
use App\Http\Controllers\Admins\AdminProfileController;
use App\Http\Controllers\Admins\ChangePasswordController;
use App\Http\Controllers\AuthController\ForgotPasswordController;
use App\Http\Controllers\RootAdmin\GuestAdminsController;
use App\Http\Controllers\RootAdmin\GuestUsersController;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\RootAdmin\InquiriesController;
use App\Http\Controllers\RootAdmin\PostCategoriesController;
use App\Http\Controllers\Admins\PostsController;
use App\Http\Controllers\AuthController\RegisterUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

// Admin Controller
Route::prefix('admin')->as('admin.')->middleware('auth.admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('profile', AdminProfileController::class);
    Route::get('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('update-password');

    // Posts
    Route::get('/home/posts/{which_posts}', [PostsController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('post.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('post.store');
    Route::get('/posts/{post}', [PostsController::class, 'show'])->name('post.show');
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{post}/edit', [PostsController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('post.destroy');
    Route::get('/posts/search', [PostsController::class, 'search'])->name('posts-search');
    Route::post('/posts/search', [PostsController::class, 'searchResults'])->name('posts-search-results');

    // Forum
    Route::get('/home/topics/{which_topics}', [ForumController::class, 'index'])->name('topic.index');
    Route::get('/topics/create', [ForumController::class, 'create'])->name('topic.create');
    Route::post('/topics', [ForumController::class, 'store'])->name('topic.store');
    Route::get('/topics/{topic}', [ForumController::class, 'show'])->name('topic.show');
    Route::get('/topics/{topic}/edit', [ForumController::class, 'edit'])->name('topic.edit');
    Route::put('/topics/{topic}/edit', [ForumController::class, 'update'])->name('topic.update');
    Route::delete('/topics/{topic}', [ForumController::class, 'destroy'])->name('topic.destroy');
    Route::get('/topics/search', [ForumController::class, 'search'])->name('forum-search');
    Route::post('/topics/search', [ForumController::class, 'searchResults'])->name('forum-search-results');

    // protected for root admin only
    Route::resource('guest-admin', GuestAdminsController::class)->middleware('isRootAdmin');
    Route::resource('guest-user', GuestUsersController::class)->middleware('isRootAdmin');
    Route::resource('post-category', PostCategoriesController::class)->middleware('isRootAdmin');
    Route::resource('inquiry', InquiriesController::class)->middleware('isRootAdmin');
});

// User Dashboard
Route::controller(UserDashboardController::class)->middleware(['auth', 'verified'])->prefix('user')->group(function() {
    Route::get('/profile', 'index')->name('user.index');
    Route::get('/profile/edit', 'editProfile')->name('user.profile.edit');
    Route::put('/profile/edit', 'updateProfile')->name('user.profile.update');
    Route::get('/change-password', 'changePassword')->name('user.change-password');
    Route::post('/change-password', 'updatePassword')->name('user.update-password');
});

// HOME UI
Route::controller( HomeController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/latest/{tag}', 'latest')->name('latest');
    Route::get('/category-posts/{tag}', 'posts')->name('posts');
    Route::post('/posts/search/result', 'search')->name('search');
    Route::get('/posts/search', 'searchPage')->name('search-page');
    Route::get('/category/{category}/posts', 'categoryPosts')->name('category-posts');
    Route::get('/posts/{post}', 'post')->name('post');
    Route::get('/authors/{first_name} {last_name}', 'author')->name('author');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::post('/contact-us', 'inquiries')->name('inquiries');
    Route::post('/newsletter/subscribe', 'subscribe')->name('newsletter.subscribe');
    Route::get('/newsletter/unsubscribe/{token}', 'unsubscribe')->name('newsletter.unsubscribe');

    //forum
    Route::get('/forum', 'forum')->name('forum');
    Route::middleware('isUserOrAdmin')->group(function() {
        Route::get('/forum/home', 'forumHome')->name('forum-topics');
        Route::get('/forum/topics', 'forumTopics')->name('forum-all-topics');
        Route::get('/forum/topics/{id}', 'forumTopic')->name('forum-topic');
        Route::post('/comments', 'storeComments')->name('store-comments');
        Route::get('/forum/{category}/topics', 'forumCategoryTopics')->name('forum-category-topics');
        Route::get('/forum/search', 'forumSearchPage')->name('forum-search');
        Route::post('/forum/search', 'forumSearchResults')->name('forum-search-result');
        Route::post('topics/{topicId}/like', 'toggleTopicLikes')->name('topic-like');
        Route::post('comments/{commentId}/like', 'toggleCommentLikes')->name('comment-like');
    });
});

// Auth
Route::controller(RegisterUserController::class)->group(function()  {
    Route::get('/register','create')->name('register.create');
    Route::post('/register','store')->name('register.store');
});

Route::controller(VerificationController::class)->group(function() {
    Route::get('/verify-email/{id}', 'verifyEmail')->name('verify.email');
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::post('/email/resend', 'resend')->name('verification.resend');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('logout');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordStore'])->name('forgot-password.store');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordStore'])->name('reset-password.store');
