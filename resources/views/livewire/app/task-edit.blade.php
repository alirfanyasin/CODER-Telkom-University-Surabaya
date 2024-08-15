<div>
    {{-- Header Start --}}
    <header class="flex my-7">
        <h2 class="text-2xl font-bold text-white md:text-3xl">Edit Tugas</h2>
    </header>
    {{-- Header End --}}

    {{-- Informasi Modul Start --}}
    <form action="" class="mb-10" wire:submit.prevent="update" enctype="multipart/form-data">
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
                    <input type="text" name="task_name" id="task_name"
                        class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="Nama Tugas"
                        wire:model="task_name">
                    @error('task_name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="task_due_date" class="block mb-2 text-sm font-medium leading-6">Batas
                        Pengumpulan</label>
                    <input type="datetime-local" name="task_due_date" id="task_due_date" autocomplete="task_due_date"
                        class="block w-full p-3 text-white rounded-lg bg-lightGray" wire:model="task_due_date">
                    @error('task_due_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="task_meeting" class="block mb-2 text-sm font-medium leading-6">Masukkan
                        Pertemuan</label>
                    <input type="number" name="task_meeting" id="task_meeting" autocomplete="task_meeting"
                        class="block w-full p-3 text-white rounded-lg bg-lightGray" wire:model="task_meeting"
                        placeholder="Pertemuan ke-1">
                    @error('task_meeting')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <label for="task_description" class="block mb-2 text-sm font-medium leading-6">Deskripsi Tugas</label>
            <textarea name="task_description" id="task_description" class="block w-full p-3 text-white rounded-lg bg-lightGray"
                rows="5" wire:model="task_description"></textarea>
            @error('task_description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </section>
        {{-- Informasi Modul End --}}

        <section action="" class="p-5 mb-4 text-white rounded-lg bg-glass">
            <div class="grid gap-4 mb-4 lg:grid-cols-1">
                {{-- <div class="lg:col-span-1">
          <label for="task_file_type" class="block mb-2 text-sm font-medium leading-6">Jenis File Pendukung</label>
          <select name="task_file_type" id="task_file_type" class="block w-full p-3 text-white rounded-lg bg-lightGray"
            placeholder="File type" value="docs">
            <option value="docs">Dokumen (PDF, DOCS, dan Lainnya)</option>
            <option value="img">Image (JPG, PNG, dan Lainnya)</option>
          </select>
        </div> --}}
                <div class="">
                    <div class="w-full">
                        <label for="task_file" class="block mb-2 font-light dark:text-white">Upload File <span
                                class="text-[#9E9E9E] text-xs">(Opsional)</span></label>
                        <input type="file" id="task_file" wire:model="task_file" class="hidden">
                        <label for="task_file"
                            class="flex items-center gap-2 p-3 text-white rounded-md cursor-pointer bg-lightGray">
                            <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
                            <span class="text-xs" id="file-name">Belum ada file yang dipilih.</span>
                        </label>
                        <small class="text-xs font-light text-[#9E9E9E]">PDF: Maksimal 5 Mb</small>
                        @error('task_file')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <section class="flex items-center justify-end">
            <a href="{{ route('app.e-learning.task') }}" wire:navigate
                class="flex items-center px-5 py-3 text-sm font-semibold text-gray-300 rounded-md me-4 bg-glass hover:text-black hover:bg-white">
                Batal
            </a>
            <button class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
                Simpan Tugas <iconify-icon icon="fa-solid:save" class="text-xl ms-2"></iconify-icon>
            </button>
        </section>
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
