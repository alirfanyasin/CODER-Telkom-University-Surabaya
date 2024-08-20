<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Buat Kunci Jawaban</h2>

  </header>
  {{-- Header End --}}


  {{-- Form input answer key start --}}
  <section class="">
    {{-- Answer key input start --}}
    <form wire:submit.prevent="store">
      <input type="hidden" name="quiz_id" wire:model="quiz_id">

      @if (session()->has('number_of_question'))
        {{-- <p class="text-white">{{ session('code') }}</p> --}}
        @for ($i = 0; $i < session('number_of_question'); $i++)
          <div class="p-6 mb-4 bg-glass rounded-xl">
            <div class="grid grid-cols-2 gap-3">
              <div class="col-span-2 mb-4 text-white">
                <div class="flex items-center justify-between mb-3">
                  <label for="key_{{ $i + 1 }}" class="block mb-2 text-lg font-bold text-white">Pertanyaan
                    {{ $i + 1 }}</label>
                  <select name="key_{{ $i + 1 }}" id="key_{{ $i + 1 }}"
                    class="w-20 p-2 rounded-md bg-lightGray" wire:model="keys.{{ $i + 1 }}" required>
                    <option selected>Pilih</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        @endfor
        <div class="flex justify-end mt-4">
          <button type="submit" class="inline-block px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
            <div class="flex items-center">
              Selanjutnya
              <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
            </div>
          </button>
        </div>
      @endif
    </form>

    {{-- Answer key input end --}}
  </section>
  {{-- Form input answer key end --}}

</div>
