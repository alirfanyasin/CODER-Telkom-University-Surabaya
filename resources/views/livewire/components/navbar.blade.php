<header class="fixed top-0 flex flex-wrap w-full py-4 text-sm bg-transparent sm:justify-start sm:flex-nowrap">
  <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between"
    aria-label="Global">
    <a class="flex-none text-xl font-semibold sm:order-1" href="{{ route('home') }}">
      <img src="assets/images/logo/logo.png" alt="" class="w-28">
    </a>
    <div class="flex items-center sm:order-3 gap-x-2">
      <button type="button"
        class="sm:hidden hs-collapse-toggle p-2.5 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
        data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment" aria-label="Toggle navigation">
        <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
          height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <line x1="3" x2="21" y1="6" y2="6" />
          <line x1="3" x2="21" y1="12" y2="12" />
          <line x1="3" x2="21" y1="18" y2="18" />
        </svg>
        <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4" xmlns="http://www.w3.org/2000/svg"
          width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18" />
          <path d="m6 6 12 12" />
        </svg>
      </button>
      <a href="{{ route('login') }}" wire:navigate
        class="items-center hidden px-3 py-2 text-sm font-medium text-white rounded-lg shadow-sm sm:inline-flex gap-x-2 disabled:pointer-events-none">
        Masuk
      </a>
      <a href="{{ route('register') }}"
        class="items-center hidden px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-full shadow-sm sm:inline-flex gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Daftar
        <span>
          <iconify-icon icon="fluent:arrow-up-20-filled" class="rotate-45"></iconify-icon>
        </span>
      </a>
    </div>
    <div id="navbar-alignment"
      class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2">
      <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
        <a class="font-normal text-white" href="#" aria-current="page">Beranda</a>
        <a class="font-normal text-white hover:text-gray-400" href="#">Tentang Kami</a>
        <a class="font-normal text-white hover:text-gray-400" href="#">Divisi</a>
        <a class="font-normal text-white hover:text-gray-400" href="#">Galeri</a>
        <a class="font-normal text-white hover:text-gray-400" href="#">Artikel</a>
        <a class="block font-medium text-white sm:hidden hover:text-gray-400" href="#">Masuk</a>
        <a class="block font-medium text-white sm:hidden hover:text-gray-400" href="#">Daftar</a>
      </div>
    </div>
  </nav>
</header>
