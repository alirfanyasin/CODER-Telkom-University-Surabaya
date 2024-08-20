<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Detail Kuis</h2>

  </header>
  {{-- Header End --}}


  @foreach ($datas as $key => $data)
    <div class="p-6 mb-4 bg-glass rounded-xl">
      <div class="grid grid-cols-2 gap-3">
        <div class="col-span-2 mb-4 text-white">
          <div class="flex items-center justify-between mb-3">
            <label for="question" class="block mb-2 text-lg font-bold text-white">Pertanyaan
              {{ $key + 1 }}</label>
            <input type="number" maxlength="3" class="w-20 p-2 rounded-md bg-lightGray" name="point" placeholder="00"
              value="{{ $data->point }}">
          </div>
          <textarea name="question" rows="4" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">{{ $data->question }}</textarea>
        </div>
        <div class="mb-4">
          <div class="flex text-white">
            <div class="flex items-center justify-center w-12 h-12 font-semibold text-black bg-white rounded-l-lg">
              A
            </div>
            <input type="text" name="option_1_" class="w-full px-3 py-3 text-white rounded-r-lg bg-lightGray"
              value="{{ $data->option_1 }}">
          </div>
        </div>
        <div class="mb-4">
          <div class="flex text-white">
            <div class="flex items-center justify-center w-12 h-12 font-semibold text-black bg-white rounded-l-lg">
              B
            </div>
            <input type="text" name="option_2_" class="w-full px-3 py-3 text-white rounded-r-lg bg-lightGray"
              value="{{ $data->option_2 }}">
          </div>
        </div>
        <div class="mb-4">
          <div class="flex text-white">
            <div class="flex items-center justify-center w-12 h-12 font-semibold text-black bg-white rounded-l-lg">
              C
            </div>
            <input type="text" name="option_3" class="w-full px-3 py-3 text-white rounded-r-lg bg-lightGray"
              value="{{ $data->option_3 }}">
          </div>
        </div>
        <div class="mb-4">
          <div class="flex text-white">
            <div class="flex items-center justify-center w-12 h-12 font-semibold text-black bg-white rounded-l-lg">
              D
            </div>
            <input type="text" name="option_4" class="w-full px-3 py-3 text-white rounded-r-lg bg-lightGray"
              value="{{ $data->option_4 }}">
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
