<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Buat Surat Keaktifan</h2>
  </header>
  {{-- Header End --}}

  {{-- Form Start --}}
  <section>
    <form wire:submit.prevent='update({{ $data->id }})'>
      <div class="w-full p-6 mb-6 bg-glass rounded-xl">
        <header class="flex items-center justify-between mb-8 text-white">
          <div class="flex items-center">
            <a href="{{ route('app.system-points') }}" wire:navigate
              class="flex items-center justify-center w-8 h-8 rounded-full hover:border me-2 bg-lightGray">
              <iconify-icon icon="carbon:arrow-left"></iconify-icon>
            </a>
            <h4 class="text-xl font-semibold">Informasi Surat</h4>
          </div>
        </header>
        <div class="justify-between block gap-5 mb-6 md:flex">
          <div class="w-full mb-6 md:mb-0">
            <label for="letter_number" class="block mb-2 font-light text-white">Nomor Surat</label>
            <input type="text" id="letter_number" class="block w-full p-3 text-white rounded-lg bg-lightGray"
              placeholder="U/02/CDRITTS/XI/2023" wire:model='reference_number'>
            @error('reference_number')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="w-full mb-6 md:mb-0">
            <label for="date" class="block mb-2 font-light text-white">Tanggal Dipublish Surat</label>
            <input type="date" id="date" class="block w-full p-3 text-white rounded-lg bg-lightGray"
              placeholder="Pertemuan ke-1" wire:model='date_published'>
            @error('date_published')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="w-full mb-6 md:mb-0">
            <label for="batch" class="block mb-2 font-light text-white">Masa Jabatan</label>
            <select class="block w-full p-3 text-white border-gray-200 rounded-lg pe-9 bg-lightGray"
              wire:model.live='length_of_service' id="length_of_service">
              <option>{{ date('Y') - 1 . '/' . date('Y') }}</option>
              <option>{{ date('Y') . '/' . date('Y') + 1 }}</option>
              <option>{{ date('Y') + 1 . '/' . date('Y') + 2 }}</option>
            </select>
            @error('length_of_service')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
        </div>
        <div class="justify-between block gap-5 mb-6 md:flex">
          <div class="w-full mb-6 md:mb-0">
            <label for="name" class="block mb-2 font-light text-white">Nama Ketua CODER</label>
            <input type="text" id="name" class="block w-full p-3 text-white rounded-lg bg-lightGray"
              placeholder="" wire:model='leaders_name'>
            @error('leaders_name')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="w-full mb-6 md:mb-0">
            <label for="nim" class="block mb-2 font-light text-white">NIM Ketua CODER</label>
            <input type="number" id="nim" class="block w-full p-3 text-white rounded-lg bg-lightGray"
              placeholder="" wire:model='nim'>
            @error('nim')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="w-full mb-6 md:mb-0">
            <label for="input-label" class="block mb-2 font-light dark:text-white">Tanda Tangan <span
                class="text-[#9E9E9E] text-xs">(Maksimal 2 Mb)</span></label>
            <input type="file" id="file-input" class="hidden" wire:model='signature' accept=".png">
            <label for="file-input"
              class="flex items-center gap-2 p-3 text-white rounded-md cursor-pointer bg-lightGray">
              <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
              <span class="text-xs" id="file-name">Belum ada file yang dipilih.</span>
            </label>
            @error('signature')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
        </div>
      </div>
      <div class="flex justify-end mb-6">
        <a href="{{ route('app.system-points') }}" wire:navigate
          class="inline-block px-5 py-3 text-sm font-semibold text-gray-400 border border-gray-400 rounded-md hover:border-red-700 hover:text-white hover:bg-red-700">Batal</a>
        <button type="submit"
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md ms-3">Publish Surat
          <iconify-icon icon="material-symbols:save-outline" class="text-2xl ms-2"></iconify-icon>
        </button>

      </div>
    </form>
  </section>
  {{-- Form End --}}

</div>
