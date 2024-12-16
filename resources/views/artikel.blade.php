@extends('layouts.app')
@section('content')

<main class="py-8 px-8 max-w-4xl mx-auto space-y-8 w-[70%]">
  <!-- Article -->
  <article class="gap-4">
    <div class="flex items-center space-x-2 mb-4">
      <span class="bg-teal-500 text-white text-xs px-3 py-1 rounded-full">Teknologi</span>
      <span class="text-gray-500 text-sm">@usernameWriter</span>
    </div>
    <h1 class="font-bold text-2xl mb-4">Judul artikel ada disini, ditempatkan disini, dan berbentuk seperti ini.</h1>
    <div class="w-full h-64 bg-gray-300 rounded mb-6"></div>
    <p class="text-gray-600 leading-relaxed mb-4">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
    </p>
    <p class="text-gray-600 leading-relaxed mb-4">
      Phasellus faucibus scelerisque eleifend donec pretium. Vulputate eu scelerisque felis imperdiet proin fermentum leo...
    </p>
    <p class="text-gray-600 leading-relaxed mb-4">
      Vestibulum morbi blandit cursus risus at ultrices mi tempus imperdiet. Nisl rhoncus mattis rhoncus urna neque...
    </p>
  </article>
  <form action="#" method="POST" class="mt-6 flex items-center space-x-4">
    <input type="text" name="comment" placeholder="Berikan tanggapan tentang artikel ini..." class="flex-1 border rounded px-4 py-2">
    <button type="submit" class="px-6 py-2 bg-black text-white rounded">Kirim</button>
  </form>
  <section class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Responses</h2>
    @foreach (range(1, 3) as $post )

    <div class="space-y-6">
      <div class="flex items-start space-x-4">
        <div>
          <p class="font-semibold text-sm">@usernameWriter</p>
          <p class="text-gray-600 text-sm">Artikelnya sangat bagus, menjelaskan tentang lorem ipsum dengan jelas. Love it.</p>
        </div>
      </div>
      @endforeach
    </div>
  </section>


</main>
@endsection