@extends('layouts.app')
@section('content')

<div class="mb-4">
  <div class="bg-black rounded-full w-12 h-12 mb-4"></div>
  <div class="flex gap-4">
    <div class="font-bold">@WiraAnanda</div>
    <div>writer</div>
  </div>
  <div>ini bio saya, apa yang harus saya masukkan dan jadikan bio??</div>
</div>
<div class="space-y-8">
  @foreach(range(1, 5) as $post)
  <a href="/artikel" class="block">

    <div class="flex justify-between items-start">
      <div>
        <p class="text-sm text-gray-500">@usernameWriter</p>
        <h2 class="font-semibold text-lg">
          Judul artikel ada disini, ditempatkan disini, dan berbentuk seperti ini.
        </h2>
      </div>
      <div class="w-20 h-16 bg-gray-300 rounded"></div>
    </div>
  </a>
  @endforeach
</div>
@endsection