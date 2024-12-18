@extends('layouts.app')
@section('content')
@php
$opsiRole = ['writer', 'reader', 'admin'];
@endphp
<main class="flex-grow flex items-center justify-center">
  <div class="w-full max-w-md bg-white p-10 shadow-lg rounded-md">
    <h2 class="text-2xl text-gray-800 mb-6 font-bold">Sign In</h2>

    <form action="{{ url('/sign-in') }}" method="POST" class="space-y-6">
      @csrf
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <div class="relative mt-1">
          <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none" placeholder="Enter your Username" value="{{ old('username') }}">
        </div>
        @error('username')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="relative mt-1">
          <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none" placeholder="Enter your Password">
        </div>
        @error('password')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="account_type" class="block text-sm font-medium text-gray-700">Jenis Akun</label>
        <select id="account_type" name="account_type" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none">
          <option value="">Jenis Akun</option>
          @foreach ($opsiRole as $role)
          <option value="{{ $role }}" {{ old('account_type') == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
          @endforeach
        </select>
        @error('account_type')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <button type="submit" class="w-full bg-black text-white py-2 px-4 mb-4 rounded shadow">Daftar</button>
        <a href="/" class="text-[.8rem] cursor-pointer">Sudah punya akun? masuk disini!</a>
      </div>
    </form>
  </div>
</main>
@endsection