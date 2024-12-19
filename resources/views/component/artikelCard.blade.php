<a href="/artikel/{{$post->id}}" class="block">
  <div class="flex justify-between items-start">
    <div>
      <!-- Menampilkan username dari relasi user -->
      <p class="text-sm text-gray-500">{{'@'.$post->user->username}}</p>
      <h2 class="font-semibold text-lg">
        {{ Str::limit($post->title, 120, '...') }}
      </h2>
    </div>

    @if (session('role') == 'admin' || session('id') == $post->user_id)

    <div>
      <form action="/artikel/{{$post->id}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-gray-500 hover:text-red-500">
          <!-- Ikon hapus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </form>
    </div>
    @endif
  </div>
</a>