<div class="absolute z-50 bottom-10 right-10">
  <div class="relative inline-flex">
    <button id="btn-chat" type="button"
      class="inline-flex items-center px-3 py-3 text-sm font-medium text-white border rounded-lg shadow-lg hs-dropdown-toggle gap-x-2 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-neutral-800 border-neutral-700 hover:bg-neutral-700 focus:bg-neutral-700"
      aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" style="z-index: 50;">
      <iconify-icon icon="lucide:messages-square" class="text-2xl"></iconify-icon>
    </button>

    <div
      class="chat-div hs-dropdown-menu absolute bottom-16 right-0 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 md:w-[650px] w-[320px] bg-white shadow-md rounded-lg p-1 space-y-0.5 divide-y divide-gray-200 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 hidden"
      role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons" style=" z-index: 40;"
      data-popper-placement="top-start">
      <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="hidden py-2 pb-5 overflow-auto first:pt-0 last:pb-0 scroll-custom h-96 md:block">
          {{-- <header class="w-full p-2 mb-4 text-black bg-white rounded-t-md">
              <h4 class="font-bold text-center">Chat</h4>
            </header> --}}
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Irfan Yasin</p>
              <p class="text-xs font-light">Belum ada pesan</p>
            </div>
          </a>
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Dandy Ainul Yakin</p>
              <p class="text-xs font-light">Halo admin</p>
            </div>
          </a>
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Fakhri Alauddin</p>
              <p class="text-xs font-light">Belum ada pesan</p>
            </div>
          </a>
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Raihan Siyun</p>
              <p class="text-xs font-light">Belum ada pesan</p>
            </div>
          </a>
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Raihan Siyun</p>
              <p class="text-xs font-light">Belum ada pesan</p>
            </div>
          </a>
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Raihan Siyun</p>
              <p class="text-xs font-light">Belum ada pesan</p>
            </div>
          </a>
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Raihan Siyun</p>
              <p class="text-xs font-light">Belum ada pesan</p>
            </div>
          </a>
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
            href="#">
            <div class="w-8 h-8 overflow-hidden">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </div>
            <div>
              <p class="text-white">Raihan Siyun</p>
              <p class="text-xs font-light">Belum ada pesan</p>
            </div>
          </a>
        </div>
        <div class="relative col-span-2 overflow-auto first:pt-0 last:pb-0 h-96 scroll-custom">
          <header class="sticky top-0 hidden w-full p-2 rounded-t-md bg-neutral-800 md:block">
            <div class="flex items-start justify-between">
              <div class="flex items-center gap-2 mb-3">
                <div class="w-8 h-8 overflow-hidden">
                  <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                    class="object-cover w-full h-full rounded-full">
                </div>
                <div>
                  <p class="text-sm text-white">Irfan Yasin</p>
                </div>
              </div>
              <button id="btn-close" class="flex items-center justify-center text-white">
                <iconify-icon icon="uil:times"></iconify-icon>
              </button>
            </div>
            <hr class="border border-neutral-600">
          </header>
          <header class="sticky top-0 block w-full p-2 rounded-t-md bg-neutral-800 md:hidden">
            <div class="flex items-start justify-between">
              <div class="flex items-center gap-2 mb-3">
                <select name="" id="" class="text-xs text-white bg-transparent">
                  <option value="" class="text-xs bg-glass">Irfan Yasin</option>
                  <option value="" class="text-xs bg-glass">Dandy Ainul Yakin</option>
                  <option value="" class="text-xs bg-glass">Fakhri Alauddin</option>
                  <option value="" class="text-xs bg-glass">Raihan Siyun</option>
                  <option value="" class="text-xs bg-glass">Ananda Bintang</option>
                  <option value="" class="text-xs bg-glass">Rama</option>
                </select>
              </div>
              <button id="btn-close" class="flex items-center justify-center text-white">
                <iconify-icon icon="uil:times"></iconify-icon>
              </button>
            </div>
            <hr class="border border-neutral-600">
          </header>

          <div>
            <div class="p-2">
              <div class="flex justify-start">
                <div class="w-8/12 mb-3 text-left">
                  <span class="inline-block px-3 py-1 text-sm text-white rounded-lg bg-neutral-600">
                    Haloo Admin
                  </span>
                  <small class="block text-xs text-neutral-500">1 hours ago</small>
                </div>
              </div>
              <div class="flex justify-end">
                <div class="w-8/12 mb-3 text-end">
                  <span class="inline-block px-3 py-1 text-sm text-white bg-green-800 rounded-lg">
                    Halo Irfan Yasin
                  </span>
                  <small class="block text-xs text-neutral-500">1 hours ago</small>
                </div>
              </div>
              <div class="flex justify-start">
                <div class="w-8/12 mb-3 text-left">
                  <span class="inline-block px-3 py-1 text-sm text-white rounded-lg bg-neutral-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis alias dolor illo voluptatem aliquid
                    eos!
                  </span>
                  <small class="block text-xs text-neutral-500">1 hours ago</small>
                </div>
              </div>
              <div class="flex justify-end">
                <div class="w-8/12 mb-3 text-end">
                  <span class="inline-block px-3 py-1 text-sm text-white bg-green-800 rounded-lg">
                    Lorem ipsum dolor sit amet.
                  </span>
                  <small class="block text-xs text-neutral-500">1 hours ago</small>
                </div>
              </div>
              <div class="flex justify-start">
                <div class="w-8/12 mb-3 text-left">
                  <span class="inline-block px-3 py-1 text-sm text-white rounded-lg bg-neutral-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis alias dolor illo voluptatem aliquid
                    eos!
                  </span>
                  <small class="block text-xs text-neutral-500">1 hours ago</small>
                </div>
              </div>
              <div class="flex justify-end">
                <div class="w-8/12 mb-3 text-end">
                  <span class="inline-block px-3 py-1 text-sm text-white bg-green-800 rounded-lg">
                    Lorem ipsum dolor sit amet.
                  </span>
                  <small class="block text-xs text-neutral-500">1 hours ago</small>
                </div>
              </div>
            </div>

          </div>

          {{-- Input chat start --}}
          <div class="sticky bottom-0 flex w-full px-2 py-2 bg-neutral-600">
            <input type="text" name="" id=""
              class="w-full px-2 py-1 text-xs font-light text-neutral-300 bg-neutral-700 rounded-l-md focus:border-0 focus:outline-none">
            <button class="px-2 py-1 text-sm text-white bg-green-800 rounded-r-md"><iconify-icon
                icon="fa:send"></iconify-icon></button>
          </div>
          {{-- Input chat end --}}

        </div>
      </div>

    </div>
  </div>
</div>
