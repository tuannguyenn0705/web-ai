<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DealController as AdminDealController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DealController;
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

// === TRANG CÔNG KHAI (PUBLIC CLIENT ROUTES - ENGLISH URLS) ===

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Articles / Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

// Deals & Affiliate AI
Route::get('/deals', [DealController::class, 'index'])->name('deals.index');

// Categories
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Tags
Route::get('/tags/{slug}', [TagController::class, 'show'])->name('tags.show');

// Static Pages
Route::get('/pages/{slug}', [PageController::class, 'show'])->name('pages.show');

// Comments
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

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

    // Quản lý Deals
    Route::resource('deals', AdminDealController::class)->except(['show']);

    // Quản lý danh mục
    Route::resource('categories', AdminCategoryController::class);
});
