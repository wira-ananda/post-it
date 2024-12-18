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

  public function writePost(Request $request)
  {
    $post = new Post();
    $post->title = $request->input('title');
    $post->postingan = $request->input('isi');
    $post->user_id = $request->session()->get('id');
    $post->save();

    return view('write');
  }

  public function getPostById($id)
  {
    $post = Post::findOrFail($id);

    return view('artikel', compact('post'));
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
}
