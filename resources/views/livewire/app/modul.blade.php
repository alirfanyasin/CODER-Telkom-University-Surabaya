<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Modul</h2>

    <div class="flex gap-2">
      @role(['admin'])
        <div class="hidden md:block">
          <button wire:click.prevent='exportModul' wire:loading.remove
            class="flex items-center px-5 py-3 text-sm font-semibold text-white border rounded-md">
            <iconify-icon icon="lets-icons:export" class="text-xl me-2"></iconify-icon>
            Export</button>

          <div wire:loading wire:target="exportModul"
            class="flex items-center justify-center px-12 py-3 text-sm font-semibold border rounded-md">
            <div
              class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
              role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
        <div class="block md:hidden">
          <a href="#" wire:click.prevent='exportModul'
            class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
              icon="lets-icons:export" class="text-2xl"></iconify-icon></a>
        </div>
      @endrole

      @role(['user|admin'])
        <div class="hidden md:block">
          <a href="#" wire:click='downloadZip'
            class="flex items-center px-5 py-3 text-sm font-semibold @role('user') text-black bg-white @endrole rounded-md @role('admin') border text-white @endrole"><iconify-icon
              icon="ph:download-bold" class="text-xl"></iconify-icon> &nbsp; Download </a>
        </div>

        <div class="block md:hidden">
          <a href="#" wire:click='downloadZip'
            class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
              icon="ph:download-bold" class="text-xl"></iconify-icon></a>
        </div>
      @endrole

      @role(['admin'])
        <div class="hidden md:block">
          <a href="{{ route('app.e-learning.modul.create') }}" wire:navigate
            class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
            Modul Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
        </div>

        <div class="block md:hidden">
          <a href="{{ route('app.e-learning.modul.create') }}" wire:navigate
            class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
              icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
        </div>
      @endrole
    </div>


  </header>
  {{-- Header End --}}


  {{-- Division Start --}}
  @role('super-admin')
    <div class="flex w-full gap-3 p-3 mb-10 overflow-auto flex-nowrap scroll-div">
      @foreach ($allDivision as $division)
        <a href="#" wire:click.prevent='selectDivision({{ $division->id }})'
          class="inline-block px-5 py-2  border border-white rounded-lg text-nowrap hover:bg-white hover:text-black {{ session('active-modul') === $division->id ? 'bg-white text-black' : 'text-white' }}">{{ $division->name }}</a>
      @endforeach
    </div>
  @endrole
  {{-- Division End --}}

  {{-- View All Modul Start --}}
  <section class="">
    @foreach ($groupedDataBySection as $section => $datas)
      <div class="mb-6">
        <header class="flex items-center gap-4 mb-2 text-white">
          <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
          <span class="flex-shrink-0">Pertemuan ke-{{ $section }}</span>
          <hr class="flex-grow border-gray-500">
        </header>

        @foreach ($datas as $data)
          <a href="{{ $data->type == 'bi:github' || $data->type == 'logos:blogger' ? $data->link : asset('storage/file/modul/' . $data->file) }}"
            download="{{ 'CODER - ' . $data['name'] }}" target="_blank" class="">
            <div class="flex w-full p-6 mb-4 lg:items-center bg-glass rounded-xl hover:border hover:border-gray-500">
              <div class="items-start me-4">
                <iconify-icon icon="{{ $data->type }}"
                  class="{{ $data->type == 'bi:github' ? 'text-white' : '' }} text-7xl"></iconify-icon>
              </div>

              <div class="flex-wrap justify-between w-full lg:flex">
                <div class="">
                  <h1 class="mb-1 font-semibold text-white text-md md:text-xl">{{ $data->name }}
                  </h1>
                  <span
                    class="text-sm font-light text-gray-400 md:font-medium md:text-base">{{ Str::limit($data->description, 75, '...') }}</span>
                </div>
                @role(['admin'])
                  <div class="items-end inline mt-3 md:flex md:justify-between">
                    <div class="flex gap-4 mt-4 text-gray-400">
                      <a href="#" wire:click='destroy({{ $data->id }})'
                        class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-4 py-1">
                        <iconify-icon icon="tabler:trash"></iconify-icon><span>Hapus</span>
                      </a>
                      <a href="{{ route('app.e-learning.modul.edit', $data->id) }}" wire:navigate
                        class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-4 py-1">
                        <iconify-icon icon="lucide:edit"></iconify-icon><span>Edit</span>
                      </a>
                    </div>
                  </div>
                @endrole
              </div>
            </div>
          </a>
        @endforeach
      </div>
    @endforeach
  </section>
  {{-- View All Modul End --}}
</div>
