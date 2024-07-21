<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Presensi Baru</h2>
  </header>
  {{-- Header End --}}

  {{-- Detail Meeting Section Start --}}
  <section class="mb-10">
    <form action="">
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
              <label for="presence" class="block mb-2 font-light text-white">Tipe Pertemuan</label>
              <select name="presence" id="presence" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
                <option value="">Pertemuan ke-1</option>
                <option value="">Pertemuan ke-2</option>
                <option value="">Pertemuan ke-3</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="date-time" class="block mb-2 font-light text-white">Tanggal & Waktu</label>
              <input type="datetime-local" name="date-time" id="date-time"
                class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
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
                          <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-white uppercase">No
                          </th>
                          <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-white uppercase">Nama
                          </th>
                          <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-white uppercase">
                            Program Studi</th>
                          <th scope="col" class="px-6 py-3 text-start text-sm font-medium text-white uppercase">
                            Status Kehadiran</th>
                        </tr>
                      </thead>
                      <tbody class="">
                        <tr>
                          <td class="px-6 py-4 text-base font-medium text-white">01</td>
                          <td class="px-6 py-4 text-base font-medium text-white">-</td>
                          <td class="px-6 py-4 text-base font-medium text-white">-</td>
                          <td class="px-6 py-4 text-base font-medium text-white flex items-center gap-4">
                           -
                          </td>
                        </tr>
                        
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

        <div class="ml-auto flex items-center gap-4">
          <button type="button"
            class="flex items-center px-5 py-3 text-sm font-semibold border border-[#4F4F55] text-white hover:bg-red-600 hover:border-red-600 rounded-md">Batal</button>
          <button type="submit"
            class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md"> Buat Presensi Baru
            <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></button>
        </div>

      </div>
    </form>
  </section>
  {{-- Detail Meeting Section Start --}}
</div>
