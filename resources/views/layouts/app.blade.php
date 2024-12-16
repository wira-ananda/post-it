<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post-It | Wiraa</title>
  <style>
    input[name="judul"]::placeholder {
      font-weight: bold;
      font-size: 1.5rem;
    }
  </style>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-black font-sans">
  <!-- Header -->
  @include('component.header')

  <!-- Main Content -->
  <main class="py-8 px-8">
    @yield('content')
  </main>
</body>

</html>