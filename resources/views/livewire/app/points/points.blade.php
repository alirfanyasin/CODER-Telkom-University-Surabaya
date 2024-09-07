<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Sistem Poin</h2>

    <div class="hidden md:block">
      <a href="{{ route('app.system-points.letter-of.active') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Surat Keaktifan
        <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
      </a>
    </div>

    <div class="block md:hidden">
      <a href="{{ route('app.system-points.letter-of.active') }}" wire:navigate
        class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-xl">
        <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
      </a>
    </div>
  </header>
  {{-- Header End --}}

  {{-- System Points Start --}}
  <section>
    <div class="grid grid-cols-1 gap-3 lg:grid-cols-4 md:grid-cols-2">
      <div class="relative p-6 text-center bg-glass rounded-xl">
        <h1 class="mb-3 font-bold text-white text-8xl">2</h1>
        <p class="text-xl text-white">20 x Pertemuan</p>
        <a href="" class="absolute right-3 top-3 ">
          <iconify-icon icon="lucide:edit" class="text-neutral-500 hover:text-yellow-600"></iconify-icon>
        </a>
      </div>

      <div class="relative p-6 text-center bg-glass rounded-xl">
        <h1 class="mb-3 font-bold text-white text-8xl">5</h1>
        <p class="text-xl text-white">12 x Tugas</p>
        <a href="" class="absolute right-3 top-3 ">
          <iconify-icon icon="lucide:edit" class="text-neutral-500 hover:text-yellow-600"></iconify-icon>
        </a>
      </div>

      <div class="relative p-6 text-center bg-glass rounded-xl">
        <h1 class="mb-3 font-bold text-white text-8xl">10</h1>
        <p class="text-xl text-white">1 x Final Project</p>
        <a href="" class="absolute right-3 top-3 ">
          <iconify-icon icon="lucide:edit" class="text-neutral-500 hover:text-yellow-600"></iconify-icon>
        </a>
      </div>

      <div class="relative p-6 text-center bg-glass rounded-xl">
        <h1 class="mb-3 font-bold text-white text-8xl">15</h1>
        <p class="text-xl text-white">Kepanitiaan</p>
        <a href="" class="absolute right-3 top-3 ">
          <iconify-icon icon="lucide:edit" class="text-neutral-500 hover:text-yellow-600"></iconify-icon>
        </a>
      </div>

      <div class="relative p-6 text-center lg:col-span-2 bg-glass rounded-xl">
        <h1 class="mb-3 font-bold text-white text-8xl">100</h1>
        <p class="text-xl text-white">Minimal Poin</p>
        <a href="" class="absolute right-3 top-3 ">
          <iconify-icon icon="lucide:edit" class="text-neutral-500 hover:text-yellow-600"></iconify-icon>
        </a>
      </div>
      <div class="relative p-6 text-center lg:col-span-2 bg-glass rounded-xl">
        <h1 class="mb-3 font-bold text-white text-8xl">130</h1>
        <p class="text-xl text-white">Poin Sempurna</p>
      </div>
    </div>
  </section>
  {{-- System Points End --}}


</div>
