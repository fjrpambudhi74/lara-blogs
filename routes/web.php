<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store']);
    Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit']);
    Route::patch('/posts/{post:slug}/edit', [PostController::class, 'update']);
    // Route::get('/posts/{post:slug}', [PostController::class, 'show'])->withoutMiddleware('auth');
    Route::delete('/posts/{post:slug}/delete', [PostController::class, 'destroy']);
});

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->withoutMiddleware('auth');



Route::get('categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('tags/{tag:slug}', [TagController::class, 'show']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
