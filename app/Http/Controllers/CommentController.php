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

  public function storeCommentWithPhoto(Request $request, $id)
  {
    try {
      // Validasi input
      $request->validate([
        'comment' => 'required|string|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      // Proses penyimpanan komentar
      $commentData = [
        'content' => $request->input('comment'),
        'post_id' => $id,
        'user_id' => session('id'),
      ];

      // Proses penyimpanan gambar (jika ada)
      if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $commentData['image'] = $imageName;
      }

      Comments::create($commentData);

      return redirect()->back()->with('success', 'Komentar dan gambar berhasil ditambahkan.');
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
  public function deleteComment($id)
  {
    $comments = Comments::findOrFail($id);

    $comments->delete();

    return redirect()->back()->with('success', 'Postingan berhasil dihapus.');
  }
}
