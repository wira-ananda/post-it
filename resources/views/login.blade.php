@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white h-screen flex flex-col">
  <!-- Header with Logo -->
  <header class="flex justify-between items-center p-6">
    <div class="flex items-center space-x-2">
      <span class="text-black font-bold text-lg">post-it</span>
      <div class="w-12 h-12">
        <img src={{asset('logoWira.svg')}} alt="Logo Icon" class="w-full h-full">
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-10 shadow-lg rounded-md">
      <h2 class="text-2xl text-gray-800 mb-6 font-bold">Login</h2>

      <form action="/home" class="space-y-6">
        @csrf

        <!-- Email Field -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <div class="relative mt-1">
            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none" placeholder="Enter your email address">
          </div>
        </div>

        <!-- Password Field -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="relative mt-1">
            <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none" placeholder="Enter your Password">
          </div>
        </div>

        <!-- Account Type Field -->
        <div>
          <label for="account_type" class="block text-sm font-medium text-gray-700">Jenis Akun</label>
          <select id="account_type" name="account_type" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-gray-500 focus:outline-none">
            <option value="">Jenis Akun</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <!-- Submit Button -->
        <div>
          <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded shadow">Login</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>