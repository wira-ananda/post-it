<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/api/users', [UserController::class, 'index']);

Route::get('/api/posts', [PostController::class, 'index']);

Route::get('/api/comments', [CommentController::class, 'index']);




Route::post('/api/users/create', [UserController::class, 'store']);

Route::get('/', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {

    $user = User::where('username', $request->input('username'))->first();

    if ($user && $user->password == $request->input('password')) {
        if ($user->role == $request->input('account_type')) {
            session(['username' => $user->username, 'role' => $user->role]);

            return redirect()->route('home')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->withErrors(['role' => 'Role tidak sesuai']);
        }
    } else {
        return redirect()->back()->withErrors(['username' => 'Username atau password salah']);
    }
})->name('login');


Route::get('/sign-in', function () {
    return view('signin');
});

Route::post('/sign-in', function (Request $request) {

    $user = new User();
    $user->username = $request->input('username');
    $user->password = $request->input('password');
    $user->role = $request->input('account_type');
    $user->save();

    return redirect('/')->with('success', 'Akun berhasil dibuat! Silakan login.');
})->name('signin');

Route::get('/home', function () {
    return view('homepage');
})->name('home');

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/create', function () {
    return view('write');
});

Route::get('/akun', function () {
    return view('akun');
});
