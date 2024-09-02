<div>
  <header class="flex my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Perbarui Baru</h2>
  </header>

  <form wire:submit='store' enctype="multipart/form-data">
    <div class="w-full p-6 mb-6 bg-glass rounded-xl">
      <div class="justify-between block mb-6 md:flex gap-9">
        <div class="w-full mb-6 md:mb-0">
          <label for="input-label" class="block mb-2 font-light text-white">Judul</label>
          <input type="text" id="input-label" class="block w-full p-3 text-white rounded-lg bg-lightGray"
            placeholder="Judul artikel" wire:model='name' value="7 Software Paling Rekomenasi untuk Web Developer">
          @error('name')
            <small class="text-red-600"> {{ $message }} </small>
          @enderror
        </div>

        <div class="w-full">
          <label for="input-label" class="block mb-2 font-light dark:text-white">Upload Gambar</label>
          <input type="file" id="file-input" class="hidden" wire:model='file'>
          
          <label for="file-input"
            class="flex items-center gap-2 p-3 text-white rounded-md cursor-pointer bg-lightGray">
            <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
            <span class="text-xs" id="file-name">03.png</span>
          </label>
          @error('file')
            <small class="text-red-600"> {{ $message }} </small>
          @enderror
        </div>
      </div>

      <div class="w-full">
        <label for="textarea-label" class="block mb-2 font-light text-white">Konten</label>
        @include('livewire.components.utilities.text-editor', ['edit' => true])
        @error('description')
          <small class="text-red-600"> {{ $message }} </small>
        @enderror
      </div>
    </div>

    <div class="flex justify-end mb-6">
      <a href="{{ route('app.content.article') }}" wire:navigate
        class="inline-block px-5 py-3 text-sm font-semibold text-gray-400 border border-gray-400 rounded-md hover:border-red-700 hover:text-white hover:bg-red-700">Batal</a>

      <button type="submit"
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md ms-3">
        Buat Artikel
        <iconify-icon icon="material-symbols:save-outline" class="text-2xl ms-2"></iconify-icon>
      </button>
    </div>
  </form>
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
