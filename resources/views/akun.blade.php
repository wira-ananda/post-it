@extends('layouts.app')
@section('content')

<div class="mb-8 pb-4 border-b border-gray-200">
  <div class="flex gap-4">
    <div id="username" class="font-bold">{{ '@' . session('username', 'Guest') }}</div>
    <div id="role">{{ session('role', 'Visitor') }}</div>
  </div>
</div>

<div class="space-y-8">
  @if($posts->isEmpty())
  <p class="text-gray-500 text-center">Belum ada postingan yang tersedia.</p>
  @else
  @foreach($posts as $post)
  <a href="/artikel/{{ $post->id }}" class="block">
    <div class="flex justify-between items-start">
      <div>
        <p class="text-sm text-gray-500">{{ '@' . session('username') }}</p>
        <h2 class="font-semibold text-lg">
          {{ $post->title }}
        </h2>
      </div>
      <div class="w-20 h-16 bg-gray-300 rounded"></div>
    </div>
  </a>
  @endforeach
  @endif
</div>

@endsection