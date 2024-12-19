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

  public function storeComment(Request $request, $id)
  {
    try {
      Comments::create([
        'content' => $request->input('comment'),
        'post_id' => $id,
        'user_id' => session('id'),
      ]);

      return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Gagal menambahkan komentar: ' . $e->getMessage());
    }
  }

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
