<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Laporan</h2>

    @role(['admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.report.create') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Laporan
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
        </a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.report.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full">
          <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
        </a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}


  {{-- Division Start --}}
  @role('super-admin')
    <div class="flex w-full gap-3 p-3 mb-10 overflow-auto flex-nowrap scroll-div">
      @foreach ($allDivision as $division)
        <a href="#" wire:click.prevent='selectDivision({{ $division->id }})'
          class="inline-block px-5 py-2  border border-white rounded-lg text-nowrap hover:bg-white hover:text-black {{ session('active-report') === $division->id ? 'bg-white text-black' : 'text-white' }}">{{ $division->name }}</a>
      @endforeach
    </div>
  @endrole
  {{-- Division End --}}


  <section class="mb-10">
    <div class="p-5 mb-4 rounded-lg bg-glass">
      <div>
        {{-- <div class="grid grid-cols-1 gap-4 mb-3 lg:grid-cols-2">
          <div class="mb-3">
            <label for="presence" class="block mb-2 font-light text-white">Jenis Laporan</label>
            <select name="type" id="type" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
              <option>Modul</option>
              <option>Presensi</option>
              <option>Kuis</option>
              <option>Tugas</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="date-time" class="block mb-2 font-light text-white">Tanggal</label>
            <input type="datetime-local" name="date-time" id="date-time"
              class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
          </div>
        </div> --}}

        <div class="mb-3">
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden rounded-md">
                  <table class="min-w-full bg-lightGray">
                    <thead class="bg-[#43474C]">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">No</th>
                        <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">tanggal
                        </th>
                        <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">Jenis
                          Laporan</th>
                        <th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">Action
                        </th>
                      </tr>
                    </thead>
                    <tbody class="">
                      @foreach ($reports as $index => $report)
                        <tr>
                          <td class="px-6 py-4 text-base font-medium text-white">{{ $index + 1 }}</td>
                          <td class="px-6 py-4 text-base font-medium text-white">
                            {{ \Carbon\Carbon::parse($report->date)->translatedFormat('l, d F Y') }}
                          </td>
                          <td class="px-6 py-4 text-base font-medium text-white">{{ $report->type }}</td>
                          <td class="flex items-center gap-4 px-6 py-4 text-base font-medium text-white">
                            @role('admin')
                              <a href="{{ route('app.report.edit', ['id' => $report->id, 'date' => $report->date]) }}"
                                class="flex gap-1 rounded-md items-center text-base font-medium border px-2 md:px-4 py-1.5">
                                <iconify-icon icon="majesticons:edit-pen-2-line" class="text-2xl"></iconify-icon>
                              </a>
                              <button type="button" wire:click.prevent='destroy({{ $report->id }})'
                                class="flex items-center gap-1 px-2 py-1 text-base font-medium border rounded-md md:px-4">
                                <iconify-icon icon="majesticons:delete-bin-line" class="text-2xl"></iconify-icon>
                              </button>
                            @endrole
                            <a href="{{ asset('storage/report/' . $report->file) }}" download
                              class="flex gap-1 rounded-md items-center text-base font-medium border px-2 md:px-4 py-1.5">
                              Lihat Detail
                            </a>
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
  </section>
</div>
