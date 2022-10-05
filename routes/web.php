<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('admin/posts/create', [PostController::class, 'create']);
    Route::post('admin/posts', [PostController::class, 'store']);
    Route::patch('admin/users/{user}', [RegisterController::class, 'update']);
    Route::get('users/password/{user:id}/edit', [RegisterController::class, 'showChangePasswordGet']);
    Route::patch('users/reset/password/{user}', [RegisterController::class, 'changePasswordPost']);

});

Route::post('newsletter', NewsLetterController::class);

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');


Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function() {
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

    Route::get('admin/category/create', [CategoryController::class, 'category']);
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::post('admin/category', [CategoryController::class, 'create']);
    Route::patch('admin/category/{category}', [CategoryController::class, 'update']);
    Route::get('admin/category/{category:id}/edit', [CategoryController::class, 'categoryEdit']);
    Route::delete('admin/category/{category}', [CategoryController::class, 'destroy']);

    Route::get('admin/users', [RegisterController::class, 'index']);
    Route::get('admin/users/{user:id}/edit', [RegisterController::class, 'edit']);
    Route::get('admin/users/password/{user:id}/edit', [RegisterController::class, 'resetPassword']);
    Route::patch('admin/users/password/{user}', [RegisterController::class, 'resetPasswordAdmin']);
});





