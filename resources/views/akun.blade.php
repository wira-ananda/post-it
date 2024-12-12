@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post-it</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-black font-sans">
  <header class="flex justify-between items-center py-4 px-8 border-b border-gray-200">
    <div class="flex items-center">
      <img src="{{ asset('logoWira.svg') }}" alt="Post-it Logo" class="h-6 mr-2">
      <span class="font-bold text-xl">post-it</span>
    </div>
    <nav class="flex items-center space-x-6 text-sm">
      <div class="relative group">
        <button class="flex items-center space-x-1">
          <span>Category</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 011.414 0L10 11l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
      <a href="#" class="hover:underline">Write</a>
      <a href="#" class="flex items-center space-x-1 hover:underline">
        <span>Account</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10 2a4 4 0 110 8 4 4 0 010-8zm6 12a6 6 0 00-12 0v1h12v-1z" />
        </svg>
      </a>
    </nav>
  </header>

  <main class="py-8 px-8">
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
  </main>
</body>

</html>