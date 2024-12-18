<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
  private function error($e)
  {
    return response()->json([
      'status' => 'error',
      'message' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage(),
    ], 500);
  }

  // public function store(Request $request): JsonResponse
  // {
  //   try {
  //     $user = Post::create([
  //       'username' => $request->input('username'),
  //       'password' => $request->input('password'),
  //       'role' => $request->input('role')
  //     ]);

  //     return response()->json([
  //       'status' => 'success',
  //       'message' => 'User berhasil dibuat.',
  //       'data' => $user,
  //     ], 201);
  //   } catch (\Exception $e) {
  //     return $this->error($e);
  //   }
  // }

  public function index(): JsonResponse
  {
    try {
      $users = Comments::all();

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
