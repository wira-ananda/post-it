<section class="mt-8">
  <h2 class="text-xl font-semibold mb-4">Responses</h2>
  <div id="komentar" class="space-y-6">
    @forelse ($comments as $comment)
    <div class="flex items-start w-full justify-between space-x-4">
      <div class="">
        <p class="text-gray-600 text-sm">{{ '@' . $comment->user->username }}</p>
        <p class="font-semibold text-md">{{ $comment->content }}</p>
      </div>
      @if (session('role') == 'admin' || session('id') == $post->user_id)
      <div>
        <form action="/comment/{{$comment->id}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
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

    @empty
    <p class="text-gray-500 text-sm">Belum ada komentar.</p>
    @endforelse
  </div>
</section>