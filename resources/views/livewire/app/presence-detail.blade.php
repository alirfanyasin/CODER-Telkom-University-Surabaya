<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Detail Presensi</h2>
    @role(['admin'])
      <div class="hidden md:block me-2">
        <button wire:click.prevent='exportPresenceResult' wire:loading.remove
          class="flex items-center px-5 py-3 text-sm font-semibold text-white border rounded-md">
          <iconify-icon icon="lets-icons:export" class="text-xl me-2"></iconify-icon>
          Export</button>

        <div wire:loading wire:target="exportPresenceResult"
          class="flex items-center justify-center px-12 py-3 text-sm font-semibold border rounded-md me-2">
          <div
            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </div>
      <div class="block md:hidden">
        <button wire:click.prevent='exportPresenceResult'
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md me-2">
          <iconify-icon icon="lets-icons:export" class="text-2xl"></iconify-icon></button>
      </div>
    @endrole
  </header>
  {{-- Header End --}}

  {{-- Detail Meeting Section Start --}}
  <section class="mb-10">
    <form wire:submit='save'>
      <div class="p-5 mb-4 rounded-lg bg-glass">
        <header class="flex items-center justify-between mb-8 text-white">
          <div class="flex items-center">
            <a href="{{ route('app.presence') }}" wire:navigate
              class="flex items-center justify-center w-8 h-8 rounded-full hover:border me-2 bg-lightGray">
              <iconify-icon icon="carbon:arrow-left"></iconify-icon>
            </a>
            <h4 class="text-xl font-semibold">Informasi Presensi</h4>
          </div>
        </header>

        <div>
          <div class="grid grid-cols-1 gap-4 mb-3 lg:grid-cols-2">
            <div class="mb-3">
              <label for="presence" class="block mb-2 font-light text-white">Pertemuan ke-</label>
              <input type="number" wire:model="form.presence_number" disabled name="presence" id="presence"
                class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
            </div>
            <div class="mb-3">
              <label for="date-time" class="block mb-2 font-light text-white">Tanggal & Waktu</label>
              <input type="datetime-local" name="date-time" id="date-time"
                class="w-full px-3 py-3 text-white rounded-lg bg-lightGray" disabled wire:model="form.presence_date">
            </div>
          </div>
          <div class="mb-3">
            <label for="description" class="block mb-2 font-light text-white">Rincian Presensi</label>
            <div class="flex flex-col">
              <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                  <div class="overflow-hidden rounded-md">
                    <table class="min-w-full bg-lightGray">
                      <thead class="bg-[#43474C]">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">No
                          </th>
                          <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">Nama
                          </th>
                          <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">
                            Program Studi</th>
                          <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">
                            Status Kehadiran</th>
                        </tr>
                      </thead>
                      <tbody class="">
                        @foreach ($members as $member)
                          @php
                            $iteration = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                          @endphp
                          <tr>
                            <td class="px-6 py-4 text-base font-medium text-white">{{ $iteration }}</td>
                            <td class="px-6 py-4 text-base font-medium text-white">{{ $member['name'] }}</td>
                            <td class="px-6 py-4 text-base font-medium text-white">{{ $member['major'] }}</td>
                            <td class="flex items-center gap-4 px-6 py-4 text-base font-medium text-white">
                              <button type="button"
                                @role(['admin']) wire:click="status({{ $member['id'] }},'hadir')" @endrole
                                class="flex gap-1 rounded-md items-center text-base font-medium border {{ $member['status'] == 'hadir' ? 'text-white bg-[#34C759] border-[#34C759]' : 'border-[#4F4F55] hover:text-white hover:bg-[#34C759] hover:border-[#34C759]' }} px-2 md:px-4 py-1.5">
                                Hadir
                              </button>
                              <button type="button"
                                @role(['admin']) wire:click="status({{ $member['id'] }},'izin')" @endrole
                                class="flex gap-1 rounded-md items-center text-base font-medium border {{ $member['status'] == 'izin' ? 'text-white bg-[#007AFF] border-[#007AFF]' : 'border-[#4F4F55] hover:text-white hover:bg-[#007AFF] hover:border-[#007AFF]' }} px-2 md:px-4 py-1">
                                Izin
                              </button>
                              <button type="button"
                                @role(['admin']) wire:click="status({{ $member['id'] }},'alpha')" @endrole
                                class="flex gap-1 rounded-md items-center text-base font-medium border {{ $member['status'] == 'alpha' ? 'text-white bg-[#FF3B30] border-[#FF3B30]' : 'border-[#4F4F55] hover:text-white hover:bg-[#FF3B30] hover:border-[#FF3B30]' }}  px-2 md:px-4 py-1.5">
                                Alpha
                              </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex my-7">
        @role(['admin'])
          <div class="flex items-center gap-2 ml-auto">
            <a href="/app/presence" wire:navigate
              class="flex items-center px-5 py-3 text-sm font-semibold border border-[#4F4F55] text-white hover:bg-red-600 hover:border-red-600 rounded-md">Batal</a>
            <button type="submit"
              class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md"> Simpan Presensi
              <iconify-icon icon="material-symbols:save-outline" class="text-xl ms-2"></iconify-icon></button>
          </div>
        @endrole
      </div>
    </form>
  </section>
  {{-- Detail Meeting Section Start --}}
</div>
