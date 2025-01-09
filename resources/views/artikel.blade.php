@extends('layouts.app')
@section('content')

<main class="py-8 px-8 max-w-4xl mx-auto space-y-8 w-[70%]">
  <!-- Artikel -->
  <article class="gap-4">
    <div class="flex items-center space-x-2 mb-4">
      <span class="bg-teal-500 text-white text-xs px-3 py-1 rounded-full">Teknologi</span>
      <span class="text-gray-500 text-sm">{{ '@' . session('username') }}</span>
    </div>
    @if (session('role') == 'admin' || session('id') == $post->user_id)

    <div class="flex justify-between items-center">
      <h1 class="font-bold text-2xl mb-4">{{ $post->title }}</h1>
      <div class="flex">
        @if (session('id') == $post->user_id)

        <a href="{{ route('post.edit', $post->id) }}" class="text-gray-500 hover:text-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536-10 10H5v-3.536l10-10z" />
          </svg>
        </a>
        @endif


        <!-- Tombol hapus -->
        <form action="/artikel/{{ $post->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus postingan ini?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-gray-500 hover:text-red-500">
            <!-- Ikon tempat sampah -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7H5m5 0V5h4v2m2 0V5a1 1 0 00-1-1h-4a1 1 0 00-1 1v2m5 0H9m1 0h4m-5 2v9a2 2 0 002 2h4a2 2 0 002-2v-9" />
            </svg>
          </button>
        </form>
      </div>
    </div>

    @endif
    <div class="w-full h-64 bg-gray-300 rounded mb-6"></div>
    <p class="text-gray-600 leading-relaxed mb-4">{{ $post->postingan }}</p>
  </article>

  <!-- Form Komentar -->
  <!-- <form action="/artikel/{{ $post->id }}" method="POST" class="mt-6 flex items-center space-x-4" enctype="multipart/form-data>
    @csrf
    <input type=" text" name="comment" placeholder="Berikan tanggapan tentang artikel ini..." class="flex-1 border rounded px-4 py-2" required>
    <button type="submit" class="px-6 py-2 bg-black text-white rounded">Kirim</button>

  </form>

  <form action="/artikel/{{ $post->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="image">Pilih Gambar:</label>
    <input type="file" name="image" id="image" required>
    <button type="submit">Unggah</button>
  </form> -->
  <form action="{{ route('comment.store', $post->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">
    @csrf
    <div class="space-y-4">
      <input type="text" name="comment" placeholder="Berikan tanggapan tentang artikel ini..." class="w-full border rounded px-4 py-2" required>
      <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Unggah Gambar (Opsional):</label>
        <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
      </div>
      <button type="submit" class="px-6 py-2 bg-black text-white rounded w-full">Kirim</button>
    </div>
  </form>


  <!-- Daftar Komentar -->
  @include ('component.commentSection')
</main>
@endsection