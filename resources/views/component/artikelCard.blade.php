<a href="/artikel/{{$post->id}}" class="block">
  <div class="flex justify-between items-start">
    <div>
      <!-- Menampilkan username dari relasi user -->
      <p class="text-sm text-gray-500">{{'@'.$post->user->username}}</p>
      <h2 class="font-semibold text-lg">
        {{ Str::limit($post->title, 120, '...') }}
      </h2>
    </div>
    <div class="w-20 h-16 bg-gray-300 rounded"></div>
  </div>
</a>