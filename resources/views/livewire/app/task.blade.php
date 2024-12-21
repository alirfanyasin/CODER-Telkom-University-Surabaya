<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Tugas</h2>
    @role(['admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.e-learning.task.create') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
          Buat Tugas Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
        </a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.e-learning.task.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md">
          <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
        </a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}


  {{-- Division Start --}}
  @role('super-admin')
    <div class="flex w-full gap-3 p-3 mb-10 overflow-auto flex-nowrap scroll-div">
      @foreach ($allDivision as $division)
        <a href="#" wire:click.prevent='selectDivision({{ $division->id }})'
          class="inline-block px-5 py-2  border border-white rounded-lg text-nowrap hover:bg-white hover:text-black {{ session('active-task') === $division->id ? 'bg-white text-black' : 'text-white' }}">{{ $division->name }}</a>
      @endforeach
    </div>
  @endrole
  {{-- Division End --}}

  {{-- View All Task Section Start --}}
  <section class="mb-10">
    @foreach ($groupedDataBySection as $meetingNumber => $datas)
      <div>
        <div class="flex items-center gap-4 mb-2 text-white">
          <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
          <h2 class="flex-shrink-0">Pertemuan ke-{{ $meetingNumber }}</h2>
          <div class="flex-grow border border-gray-600"></div>
        </div>

        @foreach ($datas as $task)
          <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
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


            <div class="@role(['admin']) flex items-center @endrole mt-4">
              @role(['admin', 'super-admin'])
                <div class="flex items-center w-full">
                  <a href="{{ route('app.e-learning.task.show-answer', $task->slug) }}" wire:navigate
                    class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                    Lihat Jawaban
                  </a>
                </div>
              @endrole
              @role(['user'])
                <div class="flex items-center justify-between">
                  <div class="flex justify-start w-full gap-2">
                    <div class="flex items-center w-full">
                      @if (!$isExpired)
                        @if (in_array($task->id, $checkSubmission))
                          <a href="{{ route('app.e-learning.task.submission.edit', $task->slug) }}" wire:navigate
                            class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                            <iconify-icon icon="lucide:edit"></iconify-icon><span class="md:block">Edit Jawaban</span>
                          </a>
                        @else
                          <a href="{{ route('app.e-learning.task.submission', $task->slug) }}" wire:navigate
                            class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                            Kumpulkan Tugas
                          </a>
                        @endif
                      @else
                        @if (in_array($task->id, $checkSubmission))
                          {{-- <a href="{{ route('app.e-learning.task.show-score', $task->slug) }}" wire:navigate
                            class="inline-flex items-center px-4 py-3 text-sm font-semibold me-2 text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                            Lihat Nilai
                          </a> --}}
                        @else
                          <a href="#" wire:click.prevent='isExpired'
                            class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                            Kumpulkan Tugas
                          </a>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>
              @endrole

              @role(['admin'])
                <div class="inline md:flex md:justify-between">
                  <div class="flex gap-2 text-gray-400 md:gap-4">
                    <a href="#" wire:click.prevent="destroy({{ $task->id }})"
                      class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
                      <iconify-icon icon="tabler:trash"></iconify-icon>
                      <span class="hidden md:block">Hapus</span>
                    </a>
                    <a href="{{ route('app.e-learning.task.edit', $task->slug) }}"
                      class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 md:px-4 py-1">
                      <iconify-icon icon="lucide:edit"></iconify-icon><span class="hidden md:block">Edit</span>
                    </a>
                  </div>
                </div>
              @endrole
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  </section>
  {{-- View All Task Section End --}}
</div>
