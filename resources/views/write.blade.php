@extends('layouts.app')
@section('content')

<form method="POST" action="#" class="max-w-xl mx-auto p-4">
  @csrf
  <div class="mb-2">
    <input type="text" id="title" name="title" placeholder="Judul.." class="mt-2 w-full p-2 " required>
  </div>
  <div class="mb-2">
    <input type="text" id="isi" name="isi" placeholder="Tuliskan artikelnya disini.." class="mt-2 w-full p-2 " required>
  </div>

  <div class="flex justify-between">
    <div class="mb-2">
      <select id="category" name="category" class="mt-2 w-full p-2 ">
        <option value="">Pilih Kategori</option>
        <option value="tech">Teknologi</option>
        <option value="health">Kesehatan</option>
        <option value="education">Pendidikan</option>
      </select>
    </div>

    <a class="text-right" href="/home">
      <button type="submit" class="px-4 py-2 bg-black text-white font-semibold rounded-md ">Publish</button>
    </a>
</form>
@endsection