<div>
  {{-- Stop trying to control. --}}



  <section>

    @foreach ($dataQuestions as $index => $question)
      <div class="mb-10">
        {{-- Header start --}}
        <header class="flex items-center justify-between mb-5">
          <h2 class="text-lg font-semibold text-white">Pertanyaan ke {{ $index + 1 }}</h2>
          <p class="text-lg text-white">05:00</p>
        </header>
        {{-- Header end --}}
        <div>
          <div class="p-8 overflow-auto font-light text-white h-60 bg-glass rounded-xl">
            <p>{{ $question->question }}</p>
          </div>

          <div class="grid grid-cols-2 gap-4 mt-5">
            <label class="rounded-lg cursor-pointer hover:border hover:border-gray-500">
              <input type="radio" name="option" id="option_1" value="option_1" class="hidden">
              <div class="flex w-full font-light text-left text-white rounded-lg bg-glass">
                <div
                  class="flex items-center justify-center w-16 text-xl font-semibold text-black bg-white rounded-l-lg">
                  A
                </div>
                <p class="p-4">{{ $question->option_1 }}</p>
              </div>
            </label>
            <label class="rounded-lg cursor-pointer hover:border hover:border-gray-500">
              <input type="radio" name="option" id="option_2" value="option_2" class="hidden">
              <div class="flex w-full font-light text-left text-white rounded-lg bg-glass">
                <div
                  class="flex items-center justify-center w-16 text-xl font-semibold text-black bg-white rounded-l-lg">
                  B
                </div>
                <p class="p-4">{{ $question->option_2 }}</p>
              </div>
            </label>
            <label class="rounded-lg cursor-pointer hover:border hover:border-gray-500">
              <input type="radio" name="option" id="option_3" value="option_3" class="hidden">
              <div class="flex w-full font-light text-left text-white rounded-lg bg-glass">
                <div
                  class="flex items-center justify-center w-16 text-xl font-semibold text-black bg-white rounded-l-lg">
                  C
                </div>
                <p class="p-4">{{ $question->option_3 }}</p>
              </div>
            </label>
            <label class="rounded-lg cursor-pointer hover:border hover:border-gray-500">
              <input type="radio" name="option" id="option_4" value="option_4" class="hidden">
              <div class="flex w-full font-light text-left text-white rounded-lg bg-glass">
                <div
                  class="flex items-center justify-center w-16 text-xl font-semibold text-black bg-white rounded-l-lg">
                  D
                </div>
                <p class="p-4">{{ $question->option_4 }}</p>
              </div>
            </label>
          </div>
        </div>
      </div>
    @endforeach

  </section>
</div>
