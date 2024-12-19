@extends('layouts.app')
@section('content')

<form method="POST"
  action="{{ isset($post) ? route('post.write', $post->id) : route('post.write') }}"
  class="max-w-xl mx-auto p-4">
  @csrf
  <div class="mb-2">
    <input type="text"
      id="title"
      name="title"
      placeholder="Judul.."
      value="{{ old('title', $post->title ?? '') }}"
      class="mt-2 w-full p-2"
      required>
  </div>
  <div class="mb-2">
    <input type="text"
      id="isi"
      name="isi"
      placeholder="Tuliskan artikelnya disini.."
      value="{{ old('isi', $post->postingan ?? '') }}"
      class="mt-2 w-full p-2"
      required>
  </div>
  <div class="flex justify-between">
    <div class="mb-2">
      <select id="category" name="category" class="mt-2 w-full p-2">
        <option value="">Pilih Kategori</option>
        <option value="tech" {{ (old('category', $post->category ?? '') === 'tech') ? 'selected' : '' }}>Teknologi</option>
        <option value="health" {{ (old('category', $post->category ?? '') === 'health') ? 'selected' : '' }}>Kesehatan</option>
        <option value="education" {{ (old('category', $post->category ?? '') === 'education') ? 'selected' : '' }}>Pendidikan</option>
      </select>
    </div>
    <button type="submit" class="px-4 py-2 bg-black text-white font-semibold rounded-md">
      {{ isset($post) ? 'Update' : 'Publish' }}
    </button>
  </div>
</form>

@endsection