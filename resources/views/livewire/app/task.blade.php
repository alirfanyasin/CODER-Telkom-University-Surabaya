<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Tugas</h2>

    <div class="hidden md:block">
      <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
        Buat Tugas Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
      </a>
    </div>

    <div class="block md:hidden">
      <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
        class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full">
        <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
      </a>
    </div>
  </header>
  {{-- Header End --}}

  {{-- View All Task Section Start --}}
  <section class="mb-10">
    @for($i = 1; $i < 4; $i++)
      <a href="" wire:navigate class="block">
        <div class="p-5 mb-4 rounded-lg bg-glass">
            <h3 class="text-2xl font-semibold text-white">Tugas {{ $i }}</h3>
            <p class="font-light mt-4 text-gray-400">Membuat website menggunakan HTML dan CSS</p>

          <div class="flex items-center justify-between w-full mt-4">
            <div class="flex items-center w-full">
              <a href="" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg bg-glass text-white hover:bg-white hover:text-black">
                Lihat pengumpulan
              </a>
            </div>

            <div class="flex items-center">
              <a href="{{ route('app.e-learning.meeting.edit') }}" wire:navigate class="me-2">
                <iconify-icon icon="uil:edit" class="text-xl text-gray-400"></iconify-icon>
              </a>
              <a href="">
                <iconify-icon icon="tabler:trash" class="text-xl text-gray-400"></iconify-icon>
              </a>
            </div>
          </div>
        </div>
      </a>
    @endfor
  </section>
  {{-- View All Task Section End --}}
</div>
