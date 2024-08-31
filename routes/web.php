<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Authenticate
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'register_store')->name('register.store');

    Route::get('login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');

    Route::post('logout', 'logout')->name('logout');
});

// PageController
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'main')->name('main');
    Route::get('biz-haqimizda', 'about')->name('about');
    Route::get('hizmatlar', 'service')->name('service');
    Route::get('loyihalar', 'project')->name('project');
    Route::get('kontakt', 'contact')->name('contact')->middleware('auth.basic');
});

// PostController
Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
]);
