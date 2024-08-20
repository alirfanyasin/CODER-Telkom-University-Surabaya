<div>
  <form action="" class="mb-10">
    <div class="block md:flex gap-4">
      <div class="w-full lg:w-1/3 mb-5 md:mb-0">
        <div class="bg-glasses text-white border-transparent rounded-xl p-7">
          <div class="flex items-center justify-center bg-lightGray w-full h-40 rounded-lg mx-auto mb-7">
            <iconify-icon icon="tdesign:camera" class="text-4xl text-white"></iconify-icon>
          </div>
          <div class="flex flex-col items-center justify-center bg-lightGray w-full h-20 rounded-lg mx-auto p-4">
            <label class="block">
              <span class="sr-only">Choose profile photo</span>
              <input type="file"
                class="block w-full text-sm text-gray-500
                    file:me-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-[#4D5157] file:text-white
                    hover:file:bg-[#3A3D41]
                    file:disabled:opacity-50 file:disabled:pointer-events-none
                    file:cursor-pointer
                  "
                accept="image/png, image/jpeg">
            </label>
          </div>

        </div>
      </div>
      <div class="w-full lg:w-2/3 mb-5 md:mb-0">
        <div class="bg-glasses text-white border-transparent rounded-xl p-7">
          <div class="division-title mb-7">
            <h2 class="text-white font-semibold text-xl mb-3">Nama Divisi</h2>
            <div>
              <input
                class="py-3 px-4 bg-transparent block w-full border-2 border-gray-600 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                type="text" placeholder="insert text">
            </div>

          </div>
          <div class="division-desc">
            <h2 class="text-white font-semibold text-xl mb-3">Deskripsi</h2>
            <div>
              <textarea
                class="py-3 px-4 bg-transparent block w-full border-2 border-gray-600 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                rows="3" placeholder="This is a textarea placeholder"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block md:flex items-center justify-end space-x-4">

      <a href="{{ route('app.division') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-[#9E9E9E] bg-transparent rounded-md border border-[#9E9E9E] group hover:bg-white hover:text-black transition-colors"
        type="submit">Batal</a>
      <button type="submit"
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md"
        type="submit">Buat Divisi <iconify-icon icon="mingcute:arrow-right-line"
          class="text-xl ms-2"></iconify-icon></button>
    </div>
  </form>
</div>
