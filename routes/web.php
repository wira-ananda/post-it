<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/api/users', [UserController::class, 'index']);

Route::post('/api/users', [UserController::class, 'store']);

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('homepage');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/create', function () {
    return view('write');
});

Route::get('/akun', function () {
    return view('akun');
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    // Logika untuk menangani login
    // Contoh validasi
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Lakukan login atau pengalihan
    return redirect()->route('home')->with('success', 'Login berhasil!');
})->name('login');
