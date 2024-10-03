<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Jawaban Kuis ({{ $dataSubmissions->count() }})</h2>

  </header>
  {{-- Header End --}}


  {{-- View All Quiz Submission Start --}}
  <section class="">
    @foreach ($dataSubmissions as $key => $data)
      <div class="p-4 mb-4 bg-glass rounded-xl">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <div class="overflow-hidden rounded-full w-14 h-14">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar" class="object-cover w-full h-full">
            </div>
            <div class="ms-4">
              <h3 class="text-lg font-semibold text-white">{{ $data->user->name }}</h3>
              <p class="text-sm text-neutral-500">{{ $data->user->major ?? $data->user->division->name }}
              </p>
            </div>
          </div>
          <button type="button"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-black bg-white border border-transparent rounded-lg hs-collapse-toggle gap-x-2 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
            id="hs-basic-collapse" aria-expanded="false" aria-controls="hs-collapse-{{ $key }}"
            data-hs-collapse="#hs-collapse-{{ $key }}">
            Lihat
            <svg class="text-black hs-collapse-open:rotate-180 shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
              width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="m6 9 6 6 6-6"></path>
            </svg>
          </button>
        </div>
        <div id="hs-collapse-{{ $key }}"
          class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300"
          aria-labelledby="hs-basic-collapse">
          <div class="mt-5">
            <div class="">
              <table class="w-full">
                <tr class="text-white border-b border-white">
                  <td class="p-3 font-light text-left">Jumlah Pertanyaan</td>
                  <td class="w-20"></td>
                  <td class="p-3">{{ $questionCount }}</td>
                </tr>
                <tr class="text-white border-b border-white">
                  <td class="p-3 font-light text-left">Jawaban Benar</td>
                  <td class="w-20"></td>
                  <td class="p-3">{{ $data->correct_answer }}</td>
                </tr>
                <tr class="text-white border-b border-white">
                  <td class="p-3 font-light text-left">Jawaban Salah</td>
                  <td class="w-20"></td>
                  <td class="p-3">{{ $data->wrong_answer }}</td>
                </tr>
                <tr class="text-white border-b border-white">
                  <td class="p-3 font-light text-left">Skor</td>
                  <td class="w-20"></td>
                  <td class="p-3">{{ $data->score }}/100</td>
                </tr>
                <tr class="text-white border-b border-white">
                  <td class="p-3 font-light text-left">Grade</td>
                  <td class="w-20"></td>
                  <td class="p-3">{{ $data->grade }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    @endforeach

  </section>
  {{-- View All Quiz Submission End --}}


</div>
