<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::controller(PageController::class)->group(function () {
//   Route::get('/', 'main');
//   Route::get('/about', 'about')->name('about');
// });

// PageController
Route::get('/', [PageController::class, 'main']);
Route::get('biz-haqimizda', [PageController::class, 'about'])->name('about');
Route::get('hizmatlar', [PageController::class, 'service'])->name('service');
Route::get('loyihalar', [PageController::class, 'project'])->name('project');
Route::get('kontakt', [PageController::class, 'contact'])->name('contact');

// PostController
Route::resource('posts', PostController::class);
