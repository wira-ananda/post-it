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

Route::get('/artikel/{id}', [PostController::class, 'getPostById'])->name('artikel');

Route::post('/artikel/{id}', action: [CommentController::class, 'storeComment']);

Route::post('/artikel/{id}', action: [CommentController::class, 'storeFotoComment']);

Route::post('/artikel/{id}', [CommentController::class, 'storeCommentWithPhoto'])->name(name: 'comment.store');


Route::delete('/artikel/{id}', action: [PostController::class, 'deletePost']);

Route::delete('/comment/{id}', action: [CommentController::class, 'deleteComment']);

Route::get('/home', [PostController::class, 'getAllPost'])->name('home');

Route::get('/akun', [PostController::class, 'getAllPostFromUserId']);

Route::get('/post/{id}/edit', [PostController::class, 'editPost'])->name('post.edit');

Route::post('/post/{id?}', [PostController::class, 'writePost'])->name('post.write');
