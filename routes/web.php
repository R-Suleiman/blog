<?php

use App\Http\Controllers\RootAdmin\AdminController;
use App\Http\Controllers\Admins\AdminProfileController;
use App\Http\Controllers\Admins\ChangePasswordController;
use App\Http\Controllers\AuthController\ForgotPasswordController;
use App\Http\Controllers\RootAdmin\GuestAdminsController;
use App\Http\Controllers\RootAdmin\GuestUsersController;
use App\Http\Controllers\AuthController\LoginController;
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
    Route::resource('posts/{which_posts}/post', PostsController::class);
    Route::get('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('update-password');

    // protected for root admin only
    Route::resource('guest-admin', GuestAdminsController::class)->middleware('isRootAdmin');
    Route::resource('guest-user', GuestUsersController::class)->middleware('isRootAdmin');
    Route::resource('post-category', PostCategoriesController::class)->middleware('isRootAdmin');
});

// User Dashboard
Route::controller(UserDashboardController::class)->middleware('auth')->prefix('user')->group(function() {
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
    Route::get('/posts/{tag}', 'posts')->name('posts');
    Route::post('/posts/search/result', 'search')->name('search');
    Route::get('/posts/search', 'searchPage')->name('search-page');
    Route::get('/category/{category}/posts', 'categoryPosts')->name('category-posts');
    Route::get('/posts/{post}', 'post')->name('post');
    Route::get('/authors/{first_name} {last_name}', 'author')->name('author');
    Route::get('/contact-us', 'contact')->name('contact');

    //forum
    Route::get('/forum', 'forum')->name('forum');
    Route::middleware('isUserOrAdmin')->group(function() {
        Route::get('/forum/topics', 'forumTopics')->name('forum-topics');
        Route::get('/forum/topics/topic', 'forumTopic')->name('forum-topic');
        Route::get('/forum/topics/category-topics', 'forumCategoryTopics')->name('forum-category-topics');
        Route::get('/forum/search/results', 'forumSearchResult')->name('forum-search-result');
    });

});

// Auth
Route::controller(RegisterUserController::class)->group(function()  {
    Route::get('/register','create')->name('register.create');
    Route::post('/register','store')->name('register.store');
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
