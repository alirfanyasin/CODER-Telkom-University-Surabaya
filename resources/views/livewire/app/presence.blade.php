<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Presensi</h2>

    <div class="hidden md:block">
      <a href="{{ route('app.presence.create') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
        Presensi Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
    </div>

    <div class="block md:hidden">
      <a href="{{ route('app.presence.create') }}" wire:navigate
        class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
          icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
    </div>
  </header>
  {{-- Header End --}}

  {{-- View All Presence Section Start --}}
  <section class="mb-10">
    <a href="{{ route('app.presence.show') }}" wire:navigate class="block">
      <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
        <header class="flex items-center justify-between mb-3 text-white">
          <div class="flex items-center">
            <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
            <span class="text-sm font-light">Minggu, 20 Mei 2024</span>
            <span class="text-sm font-light ms-2"> - 08:00 WIB</span>
          </div>
          <div
            class="flex gap-1 rounded-md items-center text-base font-medium bg-[#34C759] text-white px-2 md:px-4 py-1.5">
            <span>Selesai</span>
          </div>
        </header>
        <div>
          <div class="my-5">
            <h3 class="text-2xl font-semibold text-white">Pertemuan 1</h3>
          </div>

          <div class="flex items-center justify-between w-full mt-4">
            {{-- Icon meeting type start --}}
            <div class="flex items-center w-full">
              <a href="{{ route('app.presence.show') }}"
                class="flex gap-1 rounded-md items-center text-base font-medium bg-[#27272A] text-white hover:bg-white hover:text-[#27272A] px-2 md:px-4 py-1.5">
                <span>Lihat Presensi</span>
              </a>
            </div>
            {{-- Icon meeting type end --}}

            {{-- Icon action start --}}
            <div class="inline md:flex md:justify-between">
              <div class="flex gap-2 text-gray-400 md:gap-4">
                <a href=""
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
                  <iconify-icon icon="tabler:trash"></iconify-icon><span class="hidden md:block">Hapus</span>
                </a>
                <a href="{{ route('app.presence.edit') }}"
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 md:px-4 py-1">
                  <iconify-icon icon="lucide:edit"></iconify-icon><span class="hidden md:block">Edit</span>
                </a>
                <a href=""
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-cyan-600 border-[#27272A] px-2 md:px-4 py-1">
                  <iconify-icon icon="mage:share-fill"></iconify-icon><span class="hidden md:block">Bagikan</span>
                </a>
              </div>
            </div>
            {{-- Icon action end --}}
          </div>
        </div>
      </div>
    </a>

    <a href="#" class="block">
      <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
        <header class="flex items-center justify-between mb-3 text-white">
          <div class="flex items-center">
            <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
            <span class="text-sm font-light">Minggu, 20 Mei 2024</span>
            <span class="text-sm font-light ms-2"> - 08:00 WIB</span>
          </div>
          <div
            class="flex gap-1 rounded-md items-center text-base font-medium bg-[#34C759] text-white px-2 md:px-4 py-1.5">
            <span>Selesai</span>
          </div>
        </header>
        <div>
          <div class="my-5">
            <h3 class="text-2xl font-semibold text-white">Pertemuan 2</h3>
          </div>

          <div class="flex items-center justify-between w-full mt-4">
            {{-- Icon meeting type start --}}
            <div class="flex items-center w-full">
              <a href="{{ route('app.presence.show') }}"
                class="flex gap-1 rounded-md items-center text-base font-medium bg-[#27272A] text-white hover:bg-white hover:text-[#27272A] px-2 md:px-4 py-1.5">
                <span>Lihat Presensi</span>
              </a>
            </div>
            {{-- Icon meeting type end --}}

            {{-- Icon action start --}}
            <div class="inline md:flex md:justify-between">
              <div class="flex gap-2 text-gray-400 md:gap-4">
                <a href=""
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
                  <iconify-icon icon="tabler:trash"></iconify-icon><span class="hidden md:block">Hapus</span>
                </a>
                <a href="{{ route('app.presence.edit') }}"
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 md:px-4 py-1">
                  <iconify-icon icon="lucide:edit"></iconify-icon><span class="hidden md:block">Edit</span>
                </a>
                <a href=""
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-cyan-600 border-[#27272A] px-2 md:px-4 py-1">
                  <iconify-icon icon="mage:share-fill"></iconify-icon><span class="hidden md:block">Bagikan</span>
                </a>
              </div>
            </div>
            {{-- Icon action end --}}
          </div>
        </div>
      </div>
    </a>
  </section>
  {{-- View All Meeting Section End --}}
</div>
