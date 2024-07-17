<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Management Event</h2>

    <div class="hidden md:block">
      <button type="button" class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md"
        data-hs-overlay="#create-workspace">Buat Workspace
        <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></button>
    </div>

    <div class="block md:hidden">
      <button type="button"
        class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"
        data-hs-overlay="#create-workspace"><iconify-icon icon="majesticons:plus-line"
          class="text-2xl"></iconify-icon></button>
    </div>
  </header>
  {{-- Header End --}}




  {{-- Workspace Section Start --}}
  <section>
    <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
      <a href="{{ route('app.event.management-event.show') }}" class="block" wire:navigate>
        <div class="flex items-center justify-between">
          <h3 class="text-2xl font-semibold text-white">Irfan's Workspace</h3>
        </div>
        <p class="my-3 text-gray-400">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, dolores!
        </p>
      </a>
      <div class="flex items-center justify-between mt-5">
        <div class="flex items-center text-gray-400">
          <iconify-icon icon="material-symbols:event-outline" class="text-xl me-3"></iconify-icon>
          <p class="font-light">Dojo Event</p>
        </div>
        <div class="inline md:flex md:justify-between">
          <div class="flex gap-2 text-gray-400 md:gap-4">
            <a href=""
              class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
              <iconify-icon icon="tabler:trash"></iconify-icon><span class="hidden md:block">Hapus</span>
            </a>
            <a href=""
              class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 md:px-4 py-1">
              <iconify-icon icon="lucide:edit"></iconify-icon><span class="hidden md:block">Edit</span>
            </a>
          </div>
        </div>
      </div>
    </div>




    <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
      <a href="{{ route('app.event.management-event.show') }}" class="block" wire:navigate>
        <div class="flex items-center justify-between">
          <h3 class="text-2xl font-semibold text-white">PlayBox Session 6 Workspace</h3>
        </div>
        <p class="my-3 text-gray-400">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, dolores!
        </p>
      </a>
      <div class="flex items-center justify-between mt-5">
        <div class="flex items-center text-gray-400">
          <iconify-icon icon="material-symbols:event-outline" class="text-xl me-3"></iconify-icon>
          <p class="font-light">PlayBox Event</p>
        </div>
        <div class="inline md:flex md:justify-between">
          <div class="flex gap-2 text-gray-400 md:gap-4">
            <a href=""
              class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
              <iconify-icon icon="tabler:trash"></iconify-icon><span class="hidden md:block">Hapus</span>
            </a>
            <a href=""
              class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 md:px-4 py-1">
              <iconify-icon icon="lucide:edit"></iconify-icon><span class="hidden md:block">Edit</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Workspace Section End --}}


  {{-- Modal Create Workspace Start --}}
  <div id="create-workspace"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
      class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
      <div
        class="flex flex-col w-full bg-white shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:shadow-neutral-700/70">
        <div class="flex items-center justify-end px-4 py-3">
          <button type="button"
            class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-transparent rounded-full size-7 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
            data-hs-overlay="#create-workspace">
            <span class="sr-only">Close</span>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>
        </div>
        <div class="p-4 overflow-y-auto">
          <form action="">
            <div class="mb-4">
              <label for="name-workspace" class="text-center text-white">Nama Workspace</label>
              <input type="text" name="name" id="name-workspace"
                class="w-full p-4 mt-3 text-white rounded-lg bg-glass">
            </div>
            <div class="mb-4">
              <label for="name-workspace" class="text-center text-white">Tema Event</label>
              <select name="type" id="type-workspace" class="w-full p-4 mt-3 text-white rounded-lg bg-glass">
                <option value="PlayBox Session 6">PlayBox Session 6</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="type-workspace" class="text-center text-white">Jenis Event</label>
              <select name="type" id="type-workspace" class="w-full p-4 mt-3 text-white rounded-lg bg-glass">
                <option value="Dojo">Dojo</option>
                <option value="PlayBox">PlayBox</option>
                <option value="Waow">Waow</option>
              </select>
            </div>
          </form>
        </div>
        <div class="flex items-center justify-end px-4 py-3 border-t gap-x-2 dark:border-neutral-700">
          <button type="submit"
            class="inline-flex px-5 py-3 text-sm font-semibold text-black bg-white rounded-md ms-3">Simpan
          </button>

        </div>
      </div>
    </div>
  </div>
  {{-- Modal Create Workspace End --}}
</div>
