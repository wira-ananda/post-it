<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
  private function error($e)
  {
    return response()->json([
      'status' => 'error',
      'message' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage(),
    ], 500);
  }

  public function index(): JsonResponse
  {
    try {
      $posts = Post::all();

      if ($posts->isEmpty()) {
        return response()->json([
          'status' => 'error',
          'message' => 'Tidak ada data posts yang ditemukan.',
        ], 404);
      }

      return response()->json($posts, 200);
    } catch (\Exception $e) {
      return $this->error($e);
    }
  }
  public function editPost($id)
  {
    $post = Post::findOrFail($id);

    if (session('role') !== 'admin' && $post->user_id !== session('id')) {
      return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit postingan ini.');
    }

    return view('write', compact('post'));
  }

  public function writePost(Request $request, $id = null)
  {
    $post = $id ? Post::findOrFail($id) : new Post();

    if ($id) {
      if (session('role') !== 'admin' && $post->user_id !== session('id')) {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit postingan ini.');
      }
    } else {
      $post->user_id = session('id');
    }

    $post->title = $request->input('title');
    $post->postingan = $request->input('isi');
    $post->save();

    $message = $id ? 'Postingan berhasil diperbarui.' : 'Postingan berhasil dibuat.';

    return redirect()->route('artikel', ['id' => $post->id])->with('success', $message);
  }


  public function getPostById($id)
  {
    $post = Post::findOrFail($id);
    $comments = $post->comments()->with('user')->get();

    return view('artikel', compact('post', 'comments'));
  }

  public function getAllPost()
  {
    $posts = Post::with('user')->get();
    return view('homepage', compact('posts'));
  }

  public function getAllPostFromUserId()
  {
    $posts = Post::where('user_id', session('id'))->get();

    return view('akun', compact('posts'));
  }
  public function deletePost($id)
  {
    $post = Post::findOrFail($id);

    $post->delete();

    return redirect()->route('home')->with('success', 'Postingan berhasil dihapus.');
  }
}
