<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private function error($e)
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage(),
        ], 500);
    }

    public function signIn(Request $request)
    {
        try {
            $user = new User();
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->role = $request->input('account_type');
            $user->save();

            return redirect('/')->with('success', 'Akun berhasil dibuat! Silakan login.');
        } catch (\Exception $e) {
            return $this->error($e);
        }
    }

    public function login(Request $request)
    {

        $user = User::where('username', $request->input('username'))->first();

        if ($user && $user->password == $request->input('password')) {
            if ($user->role == $request->input('account_type')) {
                session(['username' => $user->username, 'role' => $user->role, 'id' => $user->id]);

                return redirect()->route('home')->with('success', 'Login berhasil!');
            } else {
                return redirect()->back()->withErrors(['role' => 'Role tidak sesuai']);
            }
        } else {
            return redirect()->back()->withErrors(['username' => 'Username atau password salah']);
        }
    }

    public function index(): JsonResponse
    {
        try {
            $users = User::all();

            if ($users->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Tidak ada data users yang ditemukan.',
                ], 404);
            }

            return response()->json($users, 200);
        } catch (\Exception $e) {
            return $this->error($e);
        }
    }
}
