<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Modul</h2>

    @role(['admin'])
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
    @endrole
  </header>
  {{-- Header End --}}

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
                        <iconify-icon icon="mdi:trash"></iconify-icon><span>Hapus</span>
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
