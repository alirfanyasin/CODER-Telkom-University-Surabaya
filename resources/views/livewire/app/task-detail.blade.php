<div>
  {{-- Header Start --}}
  <header class="flex my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Detail Tugas</h2>
  </header>
  {{-- Header End --}}

  {{-- Informasi Task Start --}}
  <form action="" class="mb-10">
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
          <label for="task_name" class="block mb-2 text-sm font-medium leading-6">Nama
            Tugas</label>
          <input type="text" name="task_name" id="task_name"
            class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="Nama Tugas" wire:model="task_name"
            readonly>
        </div>
        <div>
          <label for="task_due_date" class="block mb-2 text-sm font-medium leading-6">Batas
            Pengumpulan</label>
          <input type="datetime-local" name="task_due_date" id="task_due_date" autocomplete="task_due_date"
            class="block w-full p-3 text-white rounded-lg bg-lightGray" wire:model="task_due_date" disabled>
        </div>
        <div>
          <label for="task_meeting" class="block mb-2 text-sm font-medium leading-6">Pertemuan</label>
          <select name="task_meeting" id="task_meeting" class="block w-full p-3 text-white rounded-lg bg-lightGray"
            wire:model="task_meeting" disabled>
            <option value="pertemuan-1">Pertemuan 1
            </option>
            <option value="pertemuan-2">Pertemuan 2
            </option>
            <option value="pertemuan-3">Pertemuan 3
            </option>
            <option value="pertemuan-4">Pertemuan 4
            </option>
          </select>
        </div>
      </div>

      <label for="task_description" class="block mb-2 text-sm font-medium leading-6">Deskripsi Tugas</label>
      <textarea name="task_description" id="task_description" class="block w-full p-3 text-white rounded-lg bg-lightGray"
        rows="5" wire:model="task_description"></textarea>
    </section>
    {{-- Informasi Task End --}}

    {{-- @if ($task->file)
      <section action="" class="p-5 mb-4 text-white rounded-lg bg-glass">
        <div class="grid gap-4 mb-4 lg:grid-cols-1">
          <div class="">
            <div class="w-full">
              <label for="input-label" class="block mb-2 font-light dark:text-white">Upload File</label>
              <div class="flex items-center">
                <a href="/storage/{{ $task->file_name }}" target="_blank"
                  class="flex items-center justify-center w-48 gap-2 p-3.5 text-sm text-white bg-green-800 cursor-pointer rounded-l-md">
                  Lihat File
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif --}}
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
