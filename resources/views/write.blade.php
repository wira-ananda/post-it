@extends('layouts.app')
@section('content')

<form method="POST" action="#" class="max-w-xl mx-auto p-4">
  @csrf
  <div class="mb-2">
    <input type="text" id="title" name="judul" placeholder="Judul.." class="mt-2 w-full p-2 " required>
  </div>
  <div class="mb-2">
    <input type="text" id="title" name="title" placeholder="Tuliskan artikelnya disini.." class="mt-2 w-full p-2 " required>
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

    <div class="text-right">
      <button type="submit" class="px-4 py-2 bg-black text-white font-semibold rounded-md ">Publish</button>
    </div>
</form>
@endsection