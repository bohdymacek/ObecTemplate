<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\PageController as FrontPageController;
use App\Http\Controllers\Front\TagController as FrontTagController;
use App\Http\Controllers\Front\GalleryController as FrontGalleryController;
use App\Http\Controllers\Front\DocumentController as FrontDocumentController;


// FrontEnd Routes [Public routes]
Route::get('/aktuality', [HomeController::class, 'index'])->name('webhome');
Route::post('/aktualita/comment/{post}', [CommentController::class,'makeComment'])->name('post.comment');
Route::resource('/comment', CommentController::class, ['only' => ['destroy']]);
Route::get('/aktualita/{slug}', [FrontPostController::class, 'getPostBySlug'])->name('post.show');
Route::get('/kategorie/{slug}', [FrontCategoryController::class, 'getCategoryBySlug'])->name('category.show');
Route::get('/stranka/{slug}', [FrontPageController::class, 'getPageBySlug'])->name('page.show');
Route::get('/tag/{slug}', [FrontTagController::class, 'getPostsPerTags'])->name('tag.show');
Route::get('/', function () {
    return view('front.main');
})->name('front.main');
Route::get('/kontakty', function () {
    return view('front.contacts');
})->name('contacts');
Route::get('/galerie', [FrontGalleryController::class, 'index'])->name('gallery');
Route::get('/dokumenty', [FrontDocumentController::class, 'index'])->name('documents.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
