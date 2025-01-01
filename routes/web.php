<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GuestAdminsController;
use App\Http\Controllers\GuestUsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostCategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/test', function() {
//     return view('mail.forgot-password', ['token' => '123456']);
// });

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

// UI
Route::controller( UserController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/latest/{tag}', 'latest')->name('latest');
    Route::get('/posts/{tag}', 'posts')->name('posts');
    Route::post('/posts/search/result', 'search')->name('search');
    Route::get('/posts/search', 'searchPage')->name('search-page');
    Route::get('/category/{category}/posts', 'categoryPosts')->name('category-posts');
    Route::get('/posts/{post}', 'post')->name('post');
    Route::get('/authors/{first_name} {last_name}', 'author')->name('author');
    Route::get('/contact-us', 'contact')->name('contact');
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
