<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/api/users', [UserController::class, 'index']);

Route::get('/api/posts', [PostController::class, 'index']);

Route::get('/api/comments', [CommentController::class, 'index']);

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login'])->name('login');


Route::get('/sign-in', function () {
    return view('signin');
});

Route::post('/sign-in', [UserController::class, 'signIn'])->name('signin');

Route::get('/create', function () {
    return view('write');
});

Route::post('/create', [PostController::class, 'writePost']);

Route::get('/artikel/{id}', [PostController::class, 'getPostById']);

Route::post('/artikel/{id}', action: [CommentController::class, 'storeComment']);

Route::delete('/artikel/{id}', action: [PostController::class, 'deletePost']);

Route::get('/home', [PostController::class, 'getAllPost'])->name('home');

Route::get('/akun', [PostController::class, 'getAllPostFromUserId']);
