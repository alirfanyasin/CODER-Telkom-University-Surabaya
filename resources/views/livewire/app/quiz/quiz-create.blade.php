<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Buat Kuis</h2>

  </header>
  {{-- Header End --}}


  {{-- View All Modul Start --}}
  <section class="">
    <form wire:submit.prevent='store'>
      <div class="p-6 bg-glass rounded-xl">
        <div class="grid grid-cols-2 gap-3">
          <div class="mb-4 text-white">
            <label for="title" class="block mb-2 font-light text-white">Judul Kuis</label>
            <input type="text" name="title" id="title" wire:model='title'
              class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
            @error('title')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="mb-4 text-white">
            <label for="status" class="block mb-2 font-light text-white">Status</label>
            <select name="status" id="status" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray"
              wire:model='status'>
              <option>-- Pilih --</option>
              <option value="private">Private</option>
              <option value="public">Public</option>
            </select>
          </div>
          <div class="col-span-2 mb-4 text-white">
            <label for="thumbnail" class="block mb-2 font-light text-white">Link Thumbnail</label>
            <input type="link" name="thumbnail" id="thumbnail" wire:model='thumbnail'
              class="w-full px-3 py-3 text-white rounded-lg bg-lightGray" placeholder="https://">
            @error('thumbnail')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>

        </div>
      </div>

      <div class="flex justify-end mt-4">
        <button type="submit" class="inline-block px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
          <div class="flex items-center">
            Selanjutnya
            <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
          </div>
        </button>
      </div>

    </form>
  </section>
</div>
