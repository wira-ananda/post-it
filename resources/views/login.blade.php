@extends('layouts.app')
@section('content')
@php
$opsiRole = ['writer', 'reader', 'admin'];
@endphp
<main class="flex-grow flex items-center justify-center">
  <div class="w-full max-w-md bg-white p-10 shadow-lg rounded-md">
    <h2 class="text-2xl text-gray-800 mb-6 font-bold">Login</h2>

    <form action={{url('/login')}} method="POST" class="space-y-6">
      @csrf
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <div class="relative mt-1">
          <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none" placeholder="Enter your Username">
        </div>
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="relative mt-1">
          <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none" placeholder="Enter your Password">
        </div>
      </div>
      <div>
        <label for="account_type" class="block text-sm font-medium text-gray-700">Jenis Akun</label>
        <select id="account_type" name="account_type" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none">
          <option value="">Jenis Akun</option>
          @foreach ($opsiRole as $role)
          <option value='{{$role}}'>{{ucfirst($role)}}</option>
          @endforeach
        </select>
      </div>
      <div>
        <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded shadow" value="proses">Login</button>
      </div>
    </form>
  </div>
</main>
@endsection