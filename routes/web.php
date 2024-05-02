<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardBlogsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

Route::get('/', function () {
    return view('welcome', [
        "page" => "Home",
        "title" => "Home"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store']);

Route::get('/about', function () {
    return view('about', [
        "page" => "About",
        "title" => "About"
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{post:slug}', [BlogController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/dashboard/blogs/checkSlug', [DashboardBlogsController::class, 'checkSlug']);
Route::resource('/dashboard/blogs', DashboardBlogsController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('auth');
