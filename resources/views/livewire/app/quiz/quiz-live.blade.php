<div>
  <section>
    <div class="mb-10">
      @if ($question)
        {{-- Header start --}}
        <header class="flex items-center justify-between mb-5">
          <h2 class="text-lg font-semibold text-white">Pertanyaan ke {{ $currentQuestionIndex + 1 }}</h2>
          {{-- <p class="text-lg text-white" id="countdown">{{ $countdown }}</p> --}}
        </header>
        {{-- Header end --}}

        <div>
          <div class="p-8 overflow-auto font-light text-white h-60 bg-glass rounded-xl">
            <p>{{ $question->question }}</p>
          </div>

          <div class="grid grid-cols-2 gap-4 mt-5">
            @foreach (['option_1' => 'A', 'option_2' => 'B', 'option_3' => 'C', 'option_4' => 'D'] as $option => $label)
              <label class="rounded-lg cursor-pointer hover:border hover:border-gray-500">
                <input type="radio" name="option" id="{{ $option }}" value="{{ $option }}" class="hidden"
                  wire:click="nextQuestion('{{ $option }}')">
                <div class="flex w-full font-light text-left text-white rounded-lg bg-glass">
                  <div
                    class="flex items-center justify-center w-16 text-xl font-semibold text-black bg-white rounded-l-lg">
                    {{ $label }}
                  </div>
                  <p class="p-4">{{ $question->$option }}</p>
                </div>
              </label>
            @endforeach
          </div>
        </div>
      @else
        <p class="text-white">Semua pertanyaan telah dijawab.</p>
      @endif
    </div>
  </section>
</div>


{{-- @push('js-custom')
  <script>
    function startCountdown() {
      let timer = {{ $countdown }},
        seconds;
      const countdownElement = document.getElementById('countdown');

      let interval = setInterval(() => {
        seconds = parseInt(timer, 10);
        countdownElement.textContent = seconds;

        if (--timer < 1) {
          clearInterval(interval);
          console.log('pindah pertanyaan')
          Livewire.dispatch('timeUp');
        }
      }, 1000); // Update setiap detik
    }

    document.addEventListener('livewire:navigated', (event) => {
    startCountdown();
    });
  </script>
@endpush --}}
