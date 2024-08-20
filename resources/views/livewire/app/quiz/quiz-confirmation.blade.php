<div>
  <section class="text-center text-white">
    <h1 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}</h1>
    <p class="mb-5">Apakah kamu sudah siap mengerjakan Kuis?</p>

    <div class="flex justify-center w-full">
      {{-- Card start --}}
      <div class="w-10/12 p-4 text-white md:w-4/12 rounded-xl bg-glass hover:border hover:border-gray-500">
        <div class="h-48 mb-4 overflow-hidden rounded-lg">
          <img src="{{ $data->thumbnail }}" class="object-cover w-full h-full" alt="{{ $data->title }} img">
        </div>

        <h2 class="text-lg font-semibold text-left text-white">{{ $data->title }}</h2>

        <div class="flex items-center justify-between my-3 text-sm text-neutral-500">
          <p>{{ $data->question->count() }} pertanyaan</p>
          <div class="w-3 h-3 text-xs bg-blue-600 rounded-full"></div>
        </div>
      </div>
      {{-- Card end --}}
    </div>



    <a href="{{ route('app.e-learning.quiz-live', ['slug' => $data->slug, 'id' => $data->id]) }}" wire:navigate
      class="inline-block px-5 py-2 mt-5 font-semibold text-black bg-white rounded-md">
      Mulai Kuis
    </a>
  </section>
</div>
