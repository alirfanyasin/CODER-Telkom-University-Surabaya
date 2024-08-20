<div>
  {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
  <section class="text-center text-white">
    <h1 class="text-3xl font-bold text-white">Halo, {{ Auth::user()->name }}</h1>
    <p class="text-xl">Dibawah ini hasil kuis kamu</p>

    <div class="grid w-full grid-cols-1 gap-5 mt-10 lg:grid-cols-3">
      <div class="">
        <table class="w-full">
          <tr class="border-b border-white">
            <td class="p-3 text-left">Jumlah Pertanyaan</td>
            <td class="w-20"></td>
            <td class="p-3">{{ $questionCount }}</td>
          </tr>
          <tr class="border-b border-white">
            <td class="p-3 text-left">Jawaban Benar</td>
            <td class="w-20"></td>
            <td class="p-3">{{ $dataResults->correct_answer }}</td>
          </tr>
          <tr class="border-b border-white">
            <td class="p-3 text-left">Jawaban Salah</td>
            <td class="w-20"></td>
            <td class="p-3">{{ $dataResults->wrong_answer }}</td>
          </tr>
          <tr class="border-b border-white">
            <td class="p-3 text-left">Skor</td>
            <td class="w-20"></td>
            <td class="p-3">{{ $dataResults->score }}/100</td>
          </tr>
          <tr class="border-b border-white">
            <td class="p-3 text-left">Grade</td>
            <td class="w-20"></td>
            <td class="p-3">{{ $dataResults->grade }} </td>
          </tr>
        </table>
      </div>

      <div class="col-span-2">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead>
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase dark:text-neutral-500">
                  No Pertanyaan
                </th>
                <th scope="col"
                  class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase dark:text-neutral-500">Poin
                </th>
                <th scope="col"
                  class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase dark:text-neutral-500">
                  Kunci Jawaban
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataQuestions as $index => $data)
                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                  <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">
                    {{ $index + 1 }}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                    {{ $data->point }}</td>
                  <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                    {{ $data->is_correct == 'option_1' ? 'A' : '' }}
                    {{ $data->is_correct == 'option_2' ? 'B' : '' }}
                    {{ $data->is_correct == 'option_3' ? 'C' : '' }}
                    {{ $data->is_correct == 'option_4' ? 'D' : '' }}
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>

    </div>

    <div class="text-end">
      <a href="{{ route('app.e-learning.quiz') }}" wire:navigate
        class="inline-block px-5 py-2 mt-5 font-semibold text-black bg-white rounded-md">
        Kembali
      </a>
    </div>
  </section>
</div>
