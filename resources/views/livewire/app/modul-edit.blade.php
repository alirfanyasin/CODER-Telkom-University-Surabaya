<div>
  {{-- Header Start --}}
  <header class="flex my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Edit Modul</h2>
  </header>
  {{-- Header End --}}

  {{-- Informasi Modul Start --}}
  <div class="w-full p-6 mb-6 bg-glass rounded-xl">
    <header class="flex items-center justify-between mb-8 text-white">
      <div class="flex items-center">
        <a href="{{ route('app.e-learning.modul') }}" wire:navigate
          class="flex items-center justify-center w-8 h-8 rounded-full hover:border me-2 bg-lightGray">
          <iconify-icon icon="carbon:arrow-left"></iconify-icon>
        </a>
        <h4 class="text-xl font-semibold">Informasi Modul</h4>
      </div>
    </header>
    <div class="justify-between block mb-6 md:flex gap-9">
      <div class="w-full mb-6 md:mb-0">
        <label for="input-label" class="block mb-2 font-light text-white">Nama Modul</label>
        <input type="text" id="input-label"
          class="block w-full p-3 text-white border-gray-200 rounded-lg bg-lightGray focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
          value="Fundamental HTML dan CSS Dasar" placeholder="Nama Modul">
      </div>
      <div class="w-full">
        <label for="input-label" class="block mb-2 font-light text-white">Pilih Pertemuan</label>
        <select
          class="block w-full p-3 text-white border-gray-200 rounded-lg pe-9 bg-lightGray focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          <option disabled>Pertemuan ke-</option>
          <option selected>Pertemuan ke-1</option>
          <option>Pertemuan ke-2</option>
          <option>Pertemuan ke-3</option>
        </select>
      </div>
    </div>
    <div class="w-full">
      <label for="textarea-label" class="block mb-2 font-light text-white">Deskripsi</label>
      <textarea id="textarea-label"
        class="block w-full p-3 text-white border-gray-200 rounded-lg bg-lightGray focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
        rows="5" placeholder="Tulis deskripsi disini...">Mengenal Fundamental HTML dan CSS Dasar untuk Pemula</textarea>
    </div>
  </div>
  {{-- Informasi Modul End --}}

  {{-- Upload File Start --}}
  <div class="w-full p-6 mb-6 bg-glass rounded-xl">
    {{-- <h2 class="mb-6 text-xl font-medium text-white">Refrensi / File Pendukung</h2> --}}
    <div class="justify-between block mb-6 md:flex gap-9">
      <div class="w-full mb-6 md:mb-0">
        <label for="input-label" class="block mb-2 font-light dark:text-white">Jenis File
          Pendukung</label>
        <select class="block w-full p-3 text-white border-gray-200 rounded-lg pe-9 bg-lightGray">
          <option disabled>Jenis File</option>
          <option selected>Power Point</option>
          <option>PDF</option>
          <option>Github</option>
          <option>Ms.Word</option>
          <option>Ms.Excel</option>
          <option>Blog</option>
          <option>Notepad (.txt)</option>
        </select>
      </div>
      <div class="w-full">
        <label for="input-label" class="block mb-2 font-light text-white">Upload File <span
            class="text-[#9E9E9E] text-xs">(Maksimal 5 Mb)</span></label>
        <input type="file" id="file-input" class="hidden">
        <label for="file-input" class="flex items-center gap-2 p-3 text-white rounded-md cursor-pointer bg-lightGray">
          <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
          <span class="text-xs" id="file-name">Belum ada file yang dipilih.</span>
        </label>
      </div>
    </div>
  </div>
  {{-- Upload File End --}}

  <div class="flex justify-end mb-6">
    <a href="{{ route('app.e-learning.modul') }}" wire:navigate
      class="inline-block px-5 py-3 font-semibold text-gray-400 border border-gray-400 rounded-md hover:text-black hover:bg-white">Batal</a>
    <button type="submit" class="flex items-center px-5 py-3 font-semibold text-black bg-white rounded-md ms-3">Simpan
      Perubahan
      <iconify-icon icon="material-symbols:save-outline" class="text-2xl ms-2"></iconify-icon>
    </button>
  </div>

</div>

<script>
  const fileInput = document.getElementById('file-input');
  const fileName = document.getElementById('file-name');

  fileInput.addEventListener('change', (event) => {
    const files = event.target.files;
    if (files.length > 0) {
      fileName.textContent = files[0].name;
    } else {
      fileName.textContent = 'Belum ada file yang dipilih.';
    }
  });
</script>
