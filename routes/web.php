<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\GuestAdminsController;
use App\Http\Controllers\GuestUsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostCategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

// Admin Controller
Route::prefix('admin')->as('admin.')->middleware('auth.admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('profile', AdminProfileController::class);
    Route::resource('posts/{which_posts}/post', PostsController::class);

    // protected for root admin only
    Route::resource('guest-admin', GuestAdminsController::class)->middleware('isRootAdmin');
    Route::resource('guest-user', GuestUsersController::class)->middleware('isRootAdmin');
    Route::resource('post-category', PostCategoriesController::class)->middleware('isRootAdmin');
});

// User Dashboard
Route::controller(UserDashboardController::class)->middleware('auth')->prefix('user')->group(function() {
    Route::get('/dashboard', 'index')->name('user.index');
});

// UI
Route::controller( UserController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/latest', 'latest')->name('latest');
    Route::get('/posts', 'posts')->name('posts');
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
