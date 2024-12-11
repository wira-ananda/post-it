@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post-it</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    input[name="judul"]::placeholder {
      font-weight: bold;
      font-size: 1.5rem;
    }
  </style>

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
      <a href="#" class="flex items-center space-x-1 hover:underline">
        <span>Account</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10 2a4 4 0 110 8 4 4 0 010-8zm6 12a6 6 0 00-12 0v1h12v-1z" />
        </svg>
      </a>
    </nav>
  </header>

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


  </div>

</body>

</html>