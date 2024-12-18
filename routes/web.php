<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::controller( UserController::class)->group(function() {
    Route::get('index', 'index')->name('index');
    Route::get('latest', 'latest')->name('latest');
    Route::get('posts/single-post', 'post')->name('post');
    Route::get('contact-us', 'contact')->name('contact');
});
