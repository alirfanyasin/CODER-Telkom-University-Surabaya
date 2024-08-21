<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Kuis</h2>

    @role(['admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.e-learning.quiz.create') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Kuis
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.e-learning.quiz.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
            icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}


  {{-- View All Modul Start --}}
  <section class="">
    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 md:grid-cols-2">
      @foreach ($datas as $data)
        {{-- Card start --}}
        <div class="p-4 text-white rounded-xl bg-glass hover:border hover:border-gray-500">
          <div class="h-48 mb-4 overflow-hidden rounded-lg">
            <img src="{{ $data->thumbnail }}" class="object-cover w-full h-full" alt="{{ $data->title }} img">
          </div>

          <h2 class="text-lg font-semibold text-white">{{ $data->title }}</h2>

          <div class="flex items-center justify-between my-3 text-sm text-neutral-500">
            <p>{{ $data->question->count() }} pertanyaan</p>
            <div class="w-3 h-3 text-xs bg-blue-600 rounded-full"></div>
          </div>
          @role('admin')
            <div class="flex items-center justify-between mt-5">
              <a href="" wire:navigate
                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white rounded-lg gap-x-2 bg-neutral-800 hover:bg-white hover:text-black">
                Lihat Jawaban
              </a>
              <div class="flex gap-1 text-gray-400">
                <a href="{{ route('app.e-learning.quiz.show', ['code' => $data->code, 'id' => $data->id]) }}"
                  wire:navigate
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-green-600 border-[#27272A] px-2 py-2">
                  <iconify-icon icon="clarity:eye-show-line"></iconify-icon>
                </a>
                <a href="#" wire:click='destroy({{ $data->id }})'
                  class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 py-2">
                  <iconify-icon icon="tabler:trash"></iconify-icon>
                </a>
                <a href=""
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
        </div>
      @endforeach
      {{-- Card end --}}
    </div>

  </section>
</div>
