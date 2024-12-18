<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\UserController;

Route::get('/api/users', [UserController::class, 'index']);

Route::post('/api/users/create', [UserController::class, 'store']);

Route::get('/', function () {
    return view('login');
});

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

Route::post('/login', function (Request $request) {

    $user = User::where('username', $request->input('username'))->first();

    if ($user && $user->password == $request->input('password')) {
        if ($user->role == $request->input('account_type')) {
            return redirect()->route('home')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->withErrors(['role' => 'Role tidak sesuai']);
        }
    } else {
        return redirect()->back()->withErrors(['username' => 'Username atau password salah']);
    }
})->name('login');
