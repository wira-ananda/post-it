<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Menampilkan semua data users dalam bentuk JSON.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            // Mengambil semua data dari tabel users
            $users = User::all();

            // Cek jika data kosong
            if ($users->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Tidak ada data users yang ditemukan.',
                ], 404);
            }

            // Mengembalikan data dalam bentuk JSON dengan status 200
            return response()->json([
                'status' => 'success',
                'data' => $users,
            ], 200);
        } catch (\Exception $e) {
            // Menangani error yang tidak terduga
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage(),
            ], 500);
        }
    }
}
