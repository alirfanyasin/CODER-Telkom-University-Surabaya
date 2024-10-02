<div>
  {{-- Header Start --}}
  <header class="flex my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Pengumpulan Tugas</h2>
  </header>
  {{-- Header End --}}

  <section>
    <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
      <header class="flex items-center justify-start mb-5 text-white">
        <div class="flex items-center">
          <a href="{{ route('app.e-learning.task') }}" wire:navigate
            class="flex items-center justify-center w-8 h-8 rounded-full hover:border me-2 bg-lightGray">
            <iconify-icon icon="carbon:arrow-left"></iconify-icon>
          </a>
          <h4 class="text-xl font-semibold">Informasi Tugas</h4>
        </div>
      </header>

      <header class="mb-3 text-white md:flex md:items-center md:justify-between">
        <div class="order-1 mb-3 md:order-2">
          @php
            $dueDate = \Carbon\Carbon::parse($task->due_date);
            $now = \Carbon\Carbon::now();
            $isExpired = $dueDate->isPast();
            $timeRemaining = $dueDate->diffForHumans($now, [
                'parts' => 2,
                'short' => true,
                'syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
            ]);
          @endphp
          @if ($isExpired)
            <div class="w-full px-3 py-1 text-xs text-center bg-red-600 rounded-md md:text-left">
              Tugas Ditutup
            </div>
          @else
            <div class="w-full px-3 py-1 text-xs text-center bg-green-600 rounded-md md:text-left ">
              {{ $timeRemaining }}
            </div>
          @endif
        </div>

        <div class="flex items-center order-2 md:order-1">
          <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
          <span
            class="text-sm font-light">{{ \Carbon\Carbon::parse($task->due_date)->translatedFormat('l, d F Y') }}</span>
          <span class="text-sm font-light ms-2"> - {{ \Carbon\Carbon::parse($task->due_date)->format('H:i') }}
            WIB</span>
        </div>
      </header>

      <h3 class="text-lg font-semibold text-white break-words md:text-2xl">Tugas {{ $task->name }}</h3>
      <p class="text-sm font-light text-gray-400 break-words md:text-base">{{ $task->description }}</p>

      @if ($task->file !== null)
        <a href="{{ asset('storage/file/task/' . $task->file) }}" class="block mt-3" download>
          <iconify-icon icon="vscode-icons:file-type-pdf2" class="text-5xl"></iconify-icon>
        </a>
      @endif
    </div>
  </section>

  <form class="mb-10" wire:submit.prevent="store">
    @csrf
    {{-- Informasi Task Start --}}
    <section action="" class="p-6 mb-6 text-white rounded-lg bg-glass">

      <div class="grid grid-cols-1 gap-4 mb-4">
        <div>
          <label for="task_submission" class="block mb-2 text-sm font-medium leading-6">Link hasil penugasan</label>
          <input type="link" id="task_submission" wire:model="submission"
            class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="https://">
          @error('submission')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
        </div>
      </div>
    </section>
    {{-- Informasi Task End --}}


    {{-- Action button start --}}
    <section class="flex items-center justify-end">
      <a href="{{ route('app.e-learning.task') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-gray-300 rounded-md me-2 bg-glass hover:text-white hover:bg-red-600">
        Batal
      </a>
      <button class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md"
        wire:loading.remove>
        Kumpulkan Tugas <iconify-icon icon="fa-solid:save" class="text-xl ms-2"></iconify-icon>
      </button>

      {{-- Loaading event start --}}
      <div wire:loading wire:target="store"
        class="flex items-center py-3 text-sm font-semibold text-black bg-white rounded-md px-[90px]">
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
