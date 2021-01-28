<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

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

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);

Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit']);
Route::patch('/posts/{post:slug}/edit', [PostController::class, 'update']);


Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::delete('/posts/{post:slug}/delete', [PostController::class, 'destroy']);

Route::get('categories/{category:slug}', [CategoryController::class, 'show']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');
