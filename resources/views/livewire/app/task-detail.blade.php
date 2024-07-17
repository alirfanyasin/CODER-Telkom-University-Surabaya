<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Detail Tugas</h2>
  </header>

  <form action="" class="mb-10">
    <section action="" class="p-5 mb-4 rounded-lg text-white bg-glass">
      <h3 class="text-2xl font-semibold mb-4">Informasi Tugas</h3>
      
      <div class="grid lg:grid-cols-3 gap-4 mb-4">
        <div>
          <label for="task_name" class="block text-sm font-medium leading-6 mb-2">Nama Tugas</label>
          <input type="text" name="task_name" id="task_name" 
            class="py-2 px-4 block w-full border-gray-200 bg-[#27292C] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" 
            placeholder="Nama Tugas" value="Fundamental HTML dan CSS Dasar">
        </div>
        <div>
          <label for="task_due_date" class="block text-sm font-medium leading-6 mb-2">Batas Pengumpulan</label>
          <input type="datetime-local" name="task_due_date" id="task_due_date" autocomplete="task_due_date" 
            class="py-2 px-4 block w-full border-gray-200 bg-[#27292C] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" 
            value="2024-07-15T19:30">
        </div>
        <div>
          <label for="task_meeting" class="block text-sm font-medium leading-6 mb-2">Pertemuan</label>
          <select name="task_meeting" id="task_meeting"
            class="py-2 px-4 block w-full border-gray-200 bg-[#27292C] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" 
            placeholder="Pertemuan" value="pertemuan-1">
            <option value="pertemuan-1">Pertemuan 1</option>
            <option value="pertemuan-2">Pertemuan 2</option>
          </select>
        </div>
      </div>

      <label for="task_description" class="block text-sm font-medium leading-6 mb-2">Deskripsi Tugas</label>
      <textarea name="task_description" id="task_description" class="py-2 px-4 block w-full border-gray-200 bg-[#27292C] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">Mengenal fundamental HTML dan CSS untuk pemula</textarea>
    </section>

    <section action="" class="p-5 mb-4 rounded-lg text-white bg-glass">
      <h3 class="text-2xl font-semibold mb-4">Informasi Tugas</h3>
      
      <div class="grid lg:grid-cols-3 gap-4 mb-4">
        <div class="lg:col-span-1">
          <label for="task_file_type" class="block text-sm font-medium leading-6 mb-2">Jenis File Pendukung</label>
          <select name="task_file_type" id="task_file_type"
            class="py-2 px-4 block w-full border-gray-200 bg-[#27292C] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" 
            placeholder="File type" value="docs">
            <option value="docs">Dokumen (PDF, DOCS, dan Lainnya)</option>
            <option value="img">Image (JPG, PNG, dan Lainnya)</option>
          </select>
        </div>
        <div class="lg:col-span-2">
          <label for="task_file" class="block text-sm font-medium leading-6 mb-2">Upload File <span class="text-xs text-gray-400">(Maksimal 5 Mb)</span></label>
          
          <input type="file" name="task_file" id="task_file" 
            class="py-2 px-4 block w-full border-gray-200 bg-[#27292C] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" >
        </div>
      </div>
    </section>

    <section class="flex items-center justify-end">
      <a href="{{ route('app.e-learning.task') }}" wire:navigate
        class="flex items-center px-5 py-3 me-4 text-sm font-semibold text-gray-300 bg-glass hover:text-black hover:bg-white rounded-md">
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