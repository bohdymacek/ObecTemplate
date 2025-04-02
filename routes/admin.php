<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;

Route::middleware(['auth', 'can:admin-login'])->name('admin.')->prefix('/admin')->group(function () {
    // Admin Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('gallery', AdminGalleryController::class)->except(['show']);

    // Post Management
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/search', [PostController::class, 'search'])->name('search');
        Route::get('/slug-get', [PostController::class, 'getSlug'])->name('getslug');
        Route::post('/uploadImage', [PostController::class, 'uploadImage'])->name('uploadImage');
        Route::post('/store', [PostController::class, 'store'])->name('store');
    });

    Route::prefix('page')->name('page.')->group(function () {
        Route::get('/slug-get', [PageController::class, 'getSlug'])->name('getslug');
        Route::post('/uploadImage', [PageController::class, 'uploadImage'])->name('uploadImage');
        Route::post('/store', [PageController::class, 'store'])->name('store');
    });
    Route::resource('/page', PageController::class);

            // Category Management
    Route::get('/category/slug-get', [CategoryController::class, 'getSlug'])->name('category.getslug');
    Route::resource('/category', CategoryController::class);
    Route::resource('documents', AdminDocumentController::class)->except(['show', 'edit', 'update']);

    // Gallery Management
    

    Route::resources([
        'post' => PostController::class,
        'tag' => TagController::class,
    ]);

    // Account Management
    Route::resource('/account', AccountController::class, ['only' => ['index', 'update']]);

    // Admin-Only Routes
    Route::middleware(['can:admin-only'])->group(function () {

        // User Management
        Route::resource('/user', UserController::class, ['except' => ['create', 'store', 'show']]);
        // Role and Settings Management
        Route::resource('/role', RoleController::class, ['only' => ['index']]);
        Route::resource('/setting', SettingController::class, ['only' => ['index', 'update']]);
    });
});
