<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Kuis</h2>
    @role(['admin'])
      <div class="flex">
        <div class="hidden md:block me-2">
          <button wire:click.prevent='exportQuizResult' wire:loading.remove
            class="flex items-center px-5 py-3 text-sm font-semibold text-white border rounded-md">
            <iconify-icon icon="lets-icons:export" class="text-xl me-2"></iconify-icon>
            Export</button>

          <div wire:loading wire:target="exportQuizResult"
            class="flex items-center justify-center px-12 py-3 text-sm font-semibold border rounded-md me-2">
            <div
              class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
              role="status" aria-label="loading">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
        <div class="block md:hidden">
          <button wire:click.prevent='exportQuizResult'
            class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md me-2">
            <iconify-icon icon="lets-icons:export" class="text-2xl"></iconify-icon></button>
        </div>


        <div class="hidden md:block">
          <a href="{{ route('app.e-learning.quiz.create') }}" wire:navigate
            class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Kuis
            <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
        </div>

        <div class="block md:hidden">
          <a href="{{ route('app.e-learning.quiz.create') }}" wire:navigate
            class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
              icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
        </div>
      </div>
    @endrole

  </header>
  {{-- Header End --}}


  {{-- View All Modul Start --}}
  <section class="">
    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 md:grid-cols-2">
      @foreach ($datas as $data)
        {{-- Card start --}}
        <div class="relative p-4 text-white rounded-xl bg-glass hover:border hover:border-gray-500">
          <a href="{{ route('app.e-learning.quiz.show', ['code' => $data->code, 'id' => $data->id]) }}" class="block">
            <div class="h-48 mb-4 overflow-hidden rounded-lg">
              <img src="{{ $data->thumbnail }}" class="object-cover w-full h-full" alt="{{ $data->title }} img">
            </div>

            <h2 class="text-lg font-semibold text-white">{{ $data->title }}</h2>

            <div class="flex items-center justify-between my-3 text-sm text-neutral-500">
              <p>{{ $data->question->count() }} pertanyaan</p>
              <div class="flex items-center">
                <iconify-icon icon="ph:user-bold" class="text-md me-2"></iconify-icon>
                {{ $data->userAnswerQuiz->count() }}
              </div>
            </div>

            @role('admin')
              <div
                class="absolute left-0 px-3 py-1 text-xs font-light text-white {{ $data->status == 'public' ? ' bg-green-700' : ' bg-red-700' }} rounded-r-full top-8">
                {{ ucfirst($data->status) }}
              </div>
            @endrole


            @role('admin')
              <div class="flex items-center justify-between mt-5">
                <div class="w-full">
                  <a href="{{ route('app.e-learning.quiz.submission', ['code' => $data->code, 'id' => $data->id]) }}"
                    wire:navigate
                    class="inline-block px-4 py-2 text-sm font-semibold text-white rounded-lg gap-x-2 bg-neutral-800 hover:bg-white hover:text-black">
                    Lihat Nilai
                  </a>
                </div>

                <div class="flex gap-1 text-gray-400">
                  <a href="#" wire:click='destroy({{ $data->id }})'
                    class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 py-2">
                    <iconify-icon icon="tabler:trash"></iconify-icon>
                  </a>
                  <a href="{{ route('app.e-learning.quiz.edit', ['code' => $data->code, 'id' => $data->id]) }}"
                    wire:navigate
                    class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 py-2">
                    <iconify-icon icon="lucide:edit"></iconify-icon>
                  </a>
                </div>
              </div>
            @endrole
            @role('user')
              @if (in_array($data->id, $finishedQuizIds))
                <div class="flex items-center justify-between mt-5">
                  <a href="{{ route('app.e-learning.quiz-result', ['id' => $data->id]) }}" wire:navigate
                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white rounded-lg gap-x-2 bg-neutral-800 hover:bg-white hover:text-black">
                    Lihat Hasil
                  </a>
                </div>
              @else
                <div class="flex items-center justify-between mt-5">
                  <a href="{{ route('app.e-learning.quiz-confirmation', ['slug' => $data->slug, 'code' => $data->code]) }}"
                    wire:navigate
                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white rounded-lg gap-x-2 bg-neutral-800 hover:bg-white hover:text-black">
                    Mulai Kuis
                  </a>
                </div>
              @endif
            @endrole
          </a>
        </div>
        {{-- Card end --}}
      @endforeach
    </div>

  </section>
</div>
