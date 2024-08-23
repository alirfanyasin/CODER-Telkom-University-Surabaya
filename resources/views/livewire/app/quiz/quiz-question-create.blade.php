<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Buat Pertanyaan</h2>

  </header>
  {{-- Header End --}}


  {{-- Create question start --}}
  <section class="">

    <form wire:submit.prevent='create_number_of_question'>
      <div class="p-6 mb-4 bg-glass rounded-xl">
        <div class="mb-4 text-white">
          <label for="number_of_question" class="block mb-2 font-light text-white">Jumlah Pertanyaan</label>
          <div class="flex">
            <input type="number" name="number_of_question" id="number_of_question" wire:model='number_of_question'
              class="w-full px-3 py-3 text-white rounded-l-lg bg-lightGray">
            <button type="submit" class="w-full text-black bg-white rounded-r-lg basis-3/12">Buat
              Pertanyaan</button>
          </div>
        </div>

      </div>
    </form>


    {{-- Question input start --}}
    <form wire:submit.prevent='store'>
      <input type="hidden" name="quiz_id" wire:model='quiz_id' value="{{ session('quiz_id') }}">
      @if (session()->has('number_of_question'))
        @for ($i = 0; $i < session('number_of_question'); $i++)
          <div class="p-6 mb-4 bg-glass rounded-xl">
            <div class="grid grid-cols-2 gap-3">
              <div class="col-span-2 mb-4 text-white">
                <div class="flex items-center justify-between mb-3">
                  <label for="question_{{ $i + 1 }}" class="block mb-2 text-lg font-bold text-white">Pertanyaan
                    {{ $i + 1 }}</label>
                  <input type="number" maxlength="3" class="w-20 p-2 rounded-md bg-lightGray"
                    name="point_{{ $i + 1 }}" placeholder="00" wire:model="points.{{ $i }}" required>
                </div>
                <textarea name="question_{{ $i + 1 }}" id="question_{{ $i + 1 }}" rows="4"
                  class="w-full px-3 py-3 text-white rounded-lg bg-lightGray" wire:model="questions.{{ $i }}" required></textarea>
              </div>
              @for ($j = 0; $j < 4; $j++)
                <div class="mb-4">

                  <div class="flex text-white">
                    <div
                      class="flex items-center justify-center w-12 h-12 font-semibold text-black bg-white rounded-l-lg">
                      {{ chr(65 + $j) }} <!-- A, B, C, D -->
                    </div>
                    <input type="text" name="option_{{ $j + 1 }}_{{ $i + 1 }}"
                      class="w-full px-3 py-3 text-white bg-lightGray"
                      wire:model="options.{{ $i }}.{{ $j }}" required>
                    <div
                      class="flex items-center justify-center w-12 h-12 font-semibold text-black rounded-r-lg bg-neutral-600">
                      <input id="hs-radio-group-1" type="radio" name="correct_answer_{{ $i + 1 }}"
                        class="shrink-0 mt-0.5 w-5 h-5 border-gray-200 rounded-full text-green-600 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-green-500 dark:checked:border-green-500 dark:focus:ring-offset-gray-800"
                        checked="" wire:model="correct_answers.{{ $i }}"
                        value="option_{{ $j + 1 }}" required>
                    </div>
                  </div>
                </div>
              @endfor
            </div>
          </div>
        @endfor
        <div class="flex justify-end mt-4">
          <button type="submit" class="inline-block px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
            <div class="flex items-center">
              Simpan
              <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
            </div>
          </button>
        </div>
      @endif
    </form>
    {{-- Question input end --}}
  </section>
</div>
