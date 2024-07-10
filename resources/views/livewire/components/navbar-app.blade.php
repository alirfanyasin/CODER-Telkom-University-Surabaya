<nav class="flex justify-between my-8">
  <div class="block xl:hidden">
    <button type="button"
      class="inline-flex items-center justify-center p-3.5 text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm xl:hidden hs-collapse-toggle gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
      data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment" aria-label="Toggle navigation">
      <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round">
        <line x1="3" x2="21" y1="6" y2="6" />
        <line x1="3" x2="21" y1="12" y2="12" />
        <line x1="3" x2="21" y1="18" y2="18" />
      </svg>
      <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4" xmlns="http://www.w3.org/2000/svg" width="24"
        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round">
        <path d="M18 6 6 18" />
        <path d="m6 6 12 12" />
      </svg>
    </button>
  </div>

  <div class="relative hidden md:block">
    <input type="search" name="search" id="search"
      class="py-3 font-light text-white rounded-lg ps-12 bg-glass backdrop-blur-sm xl:w-96 w-80 placeholder:text-white"
      placeholder="Search">
    <iconify-icon icon="lucide:search" class="absolute text-xl text-white left-4 top-3 "></iconify-icon>
  </div>



  <div class="flex">
    <div class="block md:hidden me-3">
      <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-glass backdrop-blur-sm">
        <iconify-icon icon="lucide:search" class="absolute text-2xl text-white"></iconify-icon>
      </div>
    </div>
    <div class="flex items-center justify-center w-12 h-12 text-2xl rounded-md bg-glass backdrop-blur-sm">
      <iconify-icon icon="carbon:notification" class="text-white"></iconify-icon>
    </div>
    <div class="mx-4 border-l-2 border-white"></div>
    <a href="" class="flex items-center">
      <div class="w-12 h-12 overflow-hidden rounded-full bg-glass">
        <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar" class="object-cover w-full h-full">
      </div>
      <div class="hidden md:block ms-3">
        <h5 class="font-light text-white">Irfan Yasin</h5>
        <p class="text-xs font-light text-gray-400">Ketua Web Development</p>
      </div>
    </a>
  </div>
</nav>
