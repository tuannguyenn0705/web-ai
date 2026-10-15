<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - AI News Hub
|--------------------------------------------------------------------------
*/

// === TRANG CÔNG KHAI ===

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Bài viết
Route::get('/bai-viet', [PostController::class, 'index'])->name('posts.index');
Route::get('/bai-viet/{slug}', [PostController::class, 'show'])->name('posts.show');

// Danh mục
Route::get('/danh-muc/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Tags
Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tags.show');

// Trang tĩnh
Route::get('/trang/{slug}', [PageController::class, 'show'])->name('pages.show');

// Bình luận
Route::post('/bai-viet/{post}/binh-luan', [CommentController::class, 'store'])->name('comments.store');

// === XÁC THỰC (AUTH) ===
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// === ADMIN PANEL (yêu cầu đăng nhập) ===

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Upload ảnh trong nội dung bài viết (WYSIWYG editor)
    Route::post('posts/upload-image', [AdminPostController::class, 'uploadImage'])->name('posts.upload-image');

    // Quản lý bài viết
    Route::resource('posts', AdminPostController::class);

    // Quản lý danh mục
    Route::resource('categories', AdminCategoryController::class);
});
