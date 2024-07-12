<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Modul</h2>

    <div class="hidden md:block">
      <a href="{{ route('app.e-learning.modul.create') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
        Modul Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
    </div>

    <div class="block md:hidden">
      <a href="{{ route('app.e-learning.modul.create') }}" wire:navigate
        class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
          icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
    </div>
  </header>
  {{-- Header End --}}

  {{-- View All Modul Start --}}
  <section class="">
    <div class="mb-6">
      <header class="flex items-center gap-4 mb-2 text-white">
        <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
        <span class="flex-shrink-0">Pertemuan 1</span>
        <hr class="flex-grow border-[#27272A]">
      </header>
      @php
        $data = [
            [
                'icon' => 'vscode-icons:file-type-pdf2',
                'title' => 'Fundamental HTML dan CSS Dasar',
                'description' => 'Mengenal Fundamental HTML dan CSS Dasar untuk Pemula',
            ],
            [
                'icon' => 'vscode-icons:file-type-powerpoint2',
                'title' => 'Fundamental HTML dan CSS Dasar',
                'description' => 'Mengenal Fundamental HTML dan CSS Dasar untuk Pemula',
            ],
            [
                'icon' => 'vscode-icons:file-type-word2',
                'title' => 'Fundamental HTML dan CSS Dasar',
                'description' => 'Mengenal Fundamental HTML dan CSS Dasar untuk Pemula',
            ],
            [
                'icon' => 'fxemoji:notepad',
                'title' => 'Fundamental HTML dan CSS Dasar',
                'description' => 'Mengenal Fundamental HTML dan CSS Dasar untuk Pemula',
            ],
            [
                'icon' => 'bi:github',
                'title' => 'Fundamental HTML dan CSS Dasar',
                'description' => 'Mengenal Fundamental HTML dan CSS Dasar untuk Pemula',
            ],
            [
                'icon' => 'logos:blogger',
                'title' => 'Fundamental HTML dan CSS Dasar',
                'description' => 'Mengenal Fundamental HTML dan CSS Dasar untuk Pemula',
            ],
        ];
      @endphp

      @foreach ($data as $key => $item)
        @if ($key < 3)
          <a href="" class="">
            <div class="flex items-center w-full p-6 mb-4 bg-glass rounded-xl">
              <div class="me-4">
                <iconify-icon icon="{{ $item['icon'] }}"
                  class="text-7xl {{ $item['icon'] == 'bi:github' ? 'text-white' : '' }}"></iconify-icon>
              </div>

              <div class="flex-wrap justify-between w-full lg:flex">
                <div class="">
                  <h1 class="mb-1 font-semibold text-white text-md md:text-xl">Fundamental HTML dan
                    CSS
                    Dasar
                  </h1>
                  <span class="text-sm font-light text-gray-400 md:font-medium md:text-base">Mengenal Fundamental HTML
                    dan
                    CSS
                    Dasar untuk
                    Pemula</span>
                </div>
                <div class="items-end inline mt-3 md:flex md:justify-between">
                  <div class="flex gap-6 mt-4 text-gray-400">
                    <a href=""
                      class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-4 py-1">
                      <iconify-icon icon="mdi:trash"></iconify-icon><span>Hapus</span>
                    </a>
                    <a href=""
                      class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-4 py-1">
                      <iconify-icon icon="lucide:edit"></iconify-icon><span>Edit</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>

    <div class="mb-6">
      <div class="flex items-center gap-4 mb-2 text-white">
        <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
        <span class="flex-shrink-0">Pertemuan 2</span>
        <hr class="flex-grow border-[#27272A]">
      </div>
      @foreach ($data as $key => $item)
        @if ($key >= 3 && $key < 5)
          <a href="" class="">
            <div class="flex items-center w-full p-6 mb-4 bg-glass rounded-xl">
              <div class="me-4">
                <iconify-icon icon="{{ $item['icon'] }}"
                  class="text-7xl {{ $item['icon'] == 'bi:github' ? 'text-white' : '' }}"></iconify-icon>
              </div>

              <div class="flex-wrap justify-between w-full lg:flex">
                <div class="">
                  <h1 class="mb-1 font-semibold text-white text-md md:text-xl">Fundamental HTML dan
                    CSS
                    Dasar
                  </h1>
                  <span class="text-sm font-light text-gray-400 md:font-medium md:text-base">Mengenal Fundamental HTML
                    dan
                    CSS
                    Dasar untuk
                    Pemula</span>
                </div>
                <div class="items-end inline mt-3 md:flex md:justify-between">
                  <div class="flex gap-6 mt-4 text-gray-400">
                    <a href=""
                      class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-4 py-1">
                      <iconify-icon icon="mdi:trash"></iconify-icon><span>Hapus</span>
                    </a>
                    <a href=""
                      class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-4 py-1">
                      <iconify-icon icon="lucide:edit"></iconify-icon><span>Edit</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>

    <div class="mb-6">
      <div class="flex items-center gap-4 mb-2 text-white">
        <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
        <span class="flex-shrink-0">Pertemuan 3</span>
        <hr class="flex-grow border-[#27272A]">
      </div>
      <a href="" class="">
        <div class="flex items-center w-full p-6 mb-4 bg-glass rounded-xl">
          <div class="me-4">
            <iconify-icon icon="logos:blogger" class="text-7xl"></iconify-icon>
          </div>

          <div class="flex-wrap justify-between w-full lg:flex">
            <div class="">
              <h1 class="mb-1 font-semibold text-white text-md md:text-xl">Fundamental HTML dan
                CSS
                Dasar
              </h1>
              <span class="text-sm font-light text-gray-400 md:font-medium md:text-base">Mengenal Fundamental HTML
                dan
                CSS
                Dasar untuk
                Pemula</span>
            </div>
            <div class="items-end inline mt-3 md:flex md:justify-between">
              <div class="flex gap-6 mt-4 text-gray-400">
                <a href=""
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-4 py-1">
                  <iconify-icon icon="mdi:trash"></iconify-icon><span>Hapus</span>
                </a>
                <a href=""
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-4 py-1">
                  <iconify-icon icon="lucide:edit"></iconify-icon><span>Edit</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </section>
  {{-- View All Modul End --}}

</div>
