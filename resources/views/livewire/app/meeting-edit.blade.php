<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Edit Pertemuan</h2>
  </header>
  {{-- Header End --}}

  {{-- Edit Meeting Section Start --}}
  <section class="mb-10">
    <form wire:submit='save'>
      <div class="p-5 mb-4 rounded-lg bg-glass">
        <header class="flex items-center justify-between mb-8 text-white">
          <div class="flex items-center">
            <a href="{{ route('app.e-learning.meeting') }}" wire:navigate
              class="flex items-center justify-center w-8 h-8 rounded-full hover:border me-2 bg-lightGray">
              <iconify-icon icon="carbon:arrow-left"></iconify-icon>
            </a>
            <h4 class="text-xl font-semibold">Informasi Pertemuan</h4>
          </div>
            @if ($meeting->status == "aktif")
                <div class="px-2 py-2 text-xs bg-blue-600 rounded-full"></div>
            @elseif ($meeting->status == "selesai")
                <div class="px-2 py-2 text-xs bg-green-600 rounded-full"></div>
            @else
                <div class="px-2 py-2 text-xs bg-yellow-600 rounded-full"></div>
            @endif

        </header>

        <div>
          <div class="grid grid-cols-1 gap-4 mb-3 lg:grid-cols-3">
            <div class="mb-3">
              <label for="title" class="block mb-2 font-light text-white">Judul Pertemuan</label>
              <input type="text" name="title" id="title"
                class="w-full px-3 py-3 text-white rounded-lg bg-lightGray" wire:model="form.name">
            </div>
            <div class="mb-3">
              <label for="date-time" class="block mb-2 font-light text-white">Tanggal & Waktu</label>
              <input type="datetime-local" name="date-time" id="date-time" wire:model="form.date_time" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
            </div>
            <div class="mb-3">
              <label for="end-date" class="block mb-2 font-light text-white">Waktu Berakhir <i>(Opsional)</i></label>
              <input type="time" name="end-date" id="end-date" wire:model="end_date" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
              @error('form.end_time') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="type" class="block mb-2 font-light text-white">Tipe Pertemuan</label>
              <select name="type" id="type" wire:model.live='selectTypeMeeting'
                class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
                <option value="online">Online</option>
                <option value="offline">Offline</option>
              </select>
            </div>
            @if ($selectTypeMeeting == 'online')
              <div class="col-span-1 mb-3 lg:col-span-2">
                <label for="link" class="block mb-2 font-light text-white">Link</label>
                <input type="link" name="link" id="link" wire:model="form.link" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray" placeholder="https://">
              </div>
            @endif
            @if ($selectTypeMeeting == 'offline')
              <div class="col-span-1 mb-3 lg:col-span-2">
                <label for="Lokasi" class="block mb-2 font-light text-white">Lokasi</label>
                <input type="text" name="Lokasi" id="Lokasi" wire:model="form.location" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray" placeholder="Lab. Komputer">
              </div>
            @endif
          </div>
          <div class="mb-3">
            <label for="description" class="block mb-2 font-light text-white">Deskripsi</label>
            <textarea name="description" id="description" cols="30" rows="5"
              class="w-full px-3 py-3 text-white rounded-lg bg-lightGray" wire:model="form.description"></textarea>
          </div>
        </div>
      </div>
      {{-- Button start --}}
      <div class="flex justify-end">
        <a href="{{ route('app.e-learning.meeting') }}" wire:navigate
          class="inline-block px-5 py-3 text-sm font-semibold text-gray-400 border border-gray-400 rounded-md">Batal</a>
        <button type="submit"
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md ms-3">Simpan
          Pertemuan
          <iconify-icon icon="material-symbols:save-outline" class="text-2xl ms-2"></iconify-icon>
        </button>
      </div>
      {{-- Button end --}}

    </form>
  </section>
  {{-- Edit Meeting Section Start --}}
</div>
