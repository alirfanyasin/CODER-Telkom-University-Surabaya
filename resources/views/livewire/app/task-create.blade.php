<div>
  {{-- Header Start --}}
  <header class="flex my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Tugas Baru</h2>
  </header>
  {{-- Header End --}}

  <form class="mb-10" wire:submit.prevent="store" enctype="multipart/form-data">
    @csrf
    {{-- Informasi Task Start --}}
    <section action="" class="p-6 mb-6 text-white rounded-lg bg-glass">
      <header class="flex items-center justify-between mb-8 text-white">
        <div class="flex items-center">
          <a href="{{ route('app.e-learning.task') }}" wire:navigate
            class="flex items-center justify-center w-8 h-8 rounded-full hover:border me-2 bg-lightGray">
            <iconify-icon icon="carbon:arrow-left"></iconify-icon>
          </a>
          <h4 class="text-xl font-semibold">Informasi Tugas</h4>
        </div>
      </header>

      <div class="grid gap-4 mb-4 lg:grid-cols-3">
        <div>
          <label for="task_name" class="block mb-2 text-sm font-medium leading-6">Nama Tugas</label>
          <input type="text" id="task_name" wire:model="name"
            class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="Nama Tugas">
          @error('name')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
        </div>
        <div>
          <label for="task_due_date" class="block mb-2 text-sm font-medium leading-6">Batas
            Pengumpulan</label>
          <input type="datetime-local" name="due_date" id="task_due_date" wire:model="due_date"
            autocomplete="task_due_date" class="block w-full p-3 text-white rounded-lg bg-lightGray"
            value="2024-07-15T19:30">
          @error('due_date')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
        </div>
        <div>
          <label for="task_meeting" class="block mb-2 text-sm font-medium leading-6">Masukkan
            Pertemuan</label>
          <input type="number" name="section" id="task_meeting" wire:model="section" autocomplete="task_meeting"
            class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="Pertemuan ke-1">
          @error('section')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <label for="task_description" class="block mb-2 text-sm font-medium leading-6">Deskripsi Tugas</label>
      <textarea name="description" id="task_description" wire:model="description"
        class="block w-full p-3 text-white rounded-lg bg-lightGray" rows="5" placeholder="Deskripsi Tugas"></textarea>
      @error('description')
        <small class="text-red-500">{{ $message }}</small>
      @enderror
    </section>
    {{-- Informasi Task End --}}

    {{-- Upload file start --}}
    <section action="" class="p-5 mb-4 text-white rounded-lg bg-glass">
      <div class="grid gap-4 mb-4 lg:grid-cols-1">
        <div class="">
          <div class="w-full">
            <label for="task_file" class="block mb-2 font-light dark:text-white">Upload File <span
                class="text-[#9E9E9E] text-xs">(Opsional)</span></label>
            <input type="file" id="task_file" wire:model="file" class="hidden" accept=".pdf">
            <label for="task_file"
              class="flex items-center gap-2 p-3 text-white rounded-md cursor-pointer bg-lightGray">
              <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
              <span class="text-xs" id="file-name">Belum ada file yang dipilih.</span>
            </label>
            <small class="text-xs font-light text-[#9E9E9E]">PDF: Maksimal 5 Mb</small>
            @error('file')
              <small class="block text-red-500">{{ $message }}</small>
            @enderror
          </div>
        </div>
      </div>
    </section>
    {{-- Upload file end --}}


    {{-- Action button start --}}
    <section class="flex items-center justify-end">
      <a href="{{ route('app.e-learning.task') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-gray-300 rounded-md me-2 bg-glass hover:text-white hover:bg-red-600">
        Batal
      </a>
      <button class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md"
        wire:loading.remove>
        Simpan Tugas <iconify-icon icon="fa-solid:save" class="text-xl ms-2"></iconify-icon>
      </button>

      {{-- Loaading event start --}}
      <div wire:loading wire:target="store"
        class="flex items-center py-3 text-sm font-semibold text-black bg-white rounded-md px-[76px]">
        <div
          class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-black rounded-full"
          role="status" aria-label="loading">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      {{-- Loaading event end --}}
    </section>
    {{-- Action button end --}}

  </form>
</div>

@push('js-custom')
  <script>
    const styleElement = document.createElement('style');
    styleElement.textContent = `::-webkit-calendar-picker-indicator {
        filter: invert(1);
      }`;
    document.head.appendChild(styleElement);
  </script>
@endpush
