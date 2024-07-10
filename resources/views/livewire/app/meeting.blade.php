<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between mb-5">
    <h2 class="text-3xl font-bold text-white">Daftar Pertemuan</h2>
    <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
      class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
      Pertemuan <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
  </header>
  {{-- Header End --}}


  {{-- View All Meeting Section Start --}}
  <section>
    <a href="{{ route('app.e-learning.meeting.show') }}" wire:navigate class="block">
      <div class="p-5 mb-4 rounded-lg bg-glass">
        <header class="flex items-center justify-between mb-3 text-white">
          <div class="flex items-center">
            <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
            <span class="text-sm font-light">Minggu, 20 Mei 2024</span>
            <span class="text-sm font-light ms-2"> - 08:00 WIB</span>
          </div>
          <div class="px-2 py-1 text-sm bg-blue-600 rounded-md">
            Aktif
          </div>
        </header>
        <div>
          <div>
            <h3 class="text-2xl font-semibold text-white">Pertemuan 1</h3>
            <p class="font-light text-gray-400">Mengenal Fundamental HTML dan CSS Dasar untuk Pemula</p>
          </div>

          <div class="flex items-center justify-between w-full mt-4">
            {{-- Icon meeting type start --}}
            <div class="flex items-center w-full">
              <a href=""
                class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                <iconify-icon icon="fluent:video-24-regular"
                  class="text-3xl text-white group-hover:text-black"></iconify-icon>
              </a>
              <p class="text-white ms-3">Zoom</p>
            </div>
            {{-- Icon meeting type end --}}

            {{-- Icon action start --}}
            <div class="flex items-center">
              <a href="{{ route('app.e-learning.meeting.edit') }}" wire:navigate class="me-2">
                <iconify-icon icon="uil:edit" class="text-xl text-gray-400"></iconify-icon>
              </a>
              <a href="">
                <iconify-icon icon="tabler:trash" class="text-xl text-gray-400"></iconify-icon>
              </a>
            </div>
            {{-- Icon action end --}}
          </div>
        </div>
      </div>
    </a>

    <a href="" class="block">
      <div class="p-5 mb-4 rounded-lg bg-glass">
        <header class="flex items-center justify-between mb-3 text-white">
          <div class="flex items-center">
            <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
            <span class="text-sm font-light">Minggu, 20 Mei 2024</span>
            <span class="text-sm font-light ms-2"> - 08:00 WIB</span>
          </div>
          <div class="px-2 py-1 text-sm bg-green-600 rounded-md">
            Selesai
          </div>
        </header>
        <div>
          <div>
            <h3 class="text-2xl font-semibold text-white">Pertemuan 2</h3>
            <p class="font-light text-gray-400">Mengenal Fundamental HTML dan CSS Dasar untuk Pemula</p>
          </div>

          <div class="flex items-center justify-between w-full mt-4">
            {{-- Icon meeting type start --}}
            <div class="flex items-center w-full">
              <a href=""
                class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                <iconify-icon icon="carbon:location" class="text-3xl text-white group-hover:text-black"></iconify-icon>
              </a>
              <p class="text-white ms-3">Lab. Komputer 1.12</p>
            </div>
            {{-- Icon meeting type end --}}

            {{-- Icon action start --}}
            <div class="flex items-center">
              <a href="" class="me-2">
                <iconify-icon icon="uil:edit" class="text-xl text-gray-400"></iconify-icon>
              </a>
              <a href="">
                <iconify-icon icon="tabler:trash" class="text-xl text-gray-400"></iconify-icon>
              </a>
            </div>
            {{-- Icon action end --}}
          </div>
        </div>
      </div>
    </a>
  </section>
  {{-- View All Meeting Section End --}}



</div>
