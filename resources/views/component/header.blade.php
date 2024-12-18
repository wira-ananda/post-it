<header class="flex justify-between items-center py-4 px-8 border-b border-gray-200">
  <a class="flex items-center">
    <img src="{{ asset('logoWira.svg') }}" alt="Post-it Logo" class="h-6 mr-2">
    <span class="font-bold text-xl">post-it</span>
  </a>
  @if (!request()->is('/'))

  <nav class="flex items-center space-x-6 text-sm">
    @if (!request()-> is('home'))
    <a href="/home" class="hover:underline">Home</a>
    @endif
    <div class="relative group">
      <button class="flex items-center space-x-1">
        <span>Category</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 011.414 0L10 11l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    @if (!request()-> is('create'))
    <a href="/create?" class="hover:underline">Write</a>
    @endif
    <a href="/akun" class="flex items-center space-x-1 hover:underline">
      <span>Account</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 2a4 4 0 110 8 4 4 0 010-8zm6 12a6 6 0 00-12 0v1h12v-1z" />
      </svg>
    </a>
  </nav>
  @endif
</header>