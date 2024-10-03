<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Buat Laporan</h2>
  </header>

  <section class="mb-10">
    <form wire:submit='store' enctype="multipart/form-data">
      @csrf
      <div class="p-5 mb-4 rounded-lg bg-glass">
        <div class="grid grid-cols-1 gap-4 mb-3 lg:grid-cols-2">
          <div class="mb-3">
            <label for="presence" class="block mb-2 font-light text-white">Jenis Laporan</label>
            <select name="type" id="type" wire:model='type'
              class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
              <option>Modul</option>
              <option>Presensi</option>
              <option>Kuis</option>
              <option>Tugas</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="date" class="block mb-2 font-light text-white">Tanggal</label>
            <input type="date" name="date" id="date" wire:model='date'
              class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
            @error('date')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="mb-3 col-span-full">
            <label for="input-label" class="block mb-2 font-light dark:text-white">Upload File</label>
            <input type="file" id="file-input" class="hidden" wire:model='file'>

            <label for="file-input"
              class="flex items-center gap-2 p-3 text-white rounded-md cursor-pointer bg-lightGray">
              <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
              <span class="text-xs" id="file-name">Belum ada file yang dipilih.</span>
            </label>
            @error('file')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
        </div>
      </div>

      <div class="flex my-7">
        <div class="flex items-center gap-2 ml-auto">
          <button type="button"
            class="flex items-center px-5 py-3 text-sm font-semibold border border-[#4F4F55] text-white hover:bg-red-600 hover:border-red-600 rounded-md">Batal</button>
          <button type="submit"
            class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
            Buat Laporan <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
          </button>
        </div>
      </div>
    </form>
  </section>
</div>
