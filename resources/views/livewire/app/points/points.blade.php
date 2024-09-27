<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Sistem Poin</h2>

    <div class="hidden md:block">
      <a href="{{ route('app.system-points.letter-of.active') }}" wire:navigate
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Surat Keaktifan
        <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
      </a>
    </div>

    <div class="block md:hidden">
      <a href="{{ route('app.system-points.letter-of.active') }}" wire:navigate
        class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-xl">
        <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
      </a>
    </div>
  </header>
  {{-- Header End --}}

  {{-- System Points Start --}}
  <section>
    <div class="grid grid-cols-1 gap-3 lg:grid-cols-5 md:grid-cols-2">
      @foreach ($datas as $key => $data)
        <div class="relative p-6 text-center bg-glass rounded-xl {{ $key === 5 ? 'lg:col-span-2' : '' }}">
          <h1 class="mb-3 font-bold text-white text-8xl">{{ $data->points }}</h1>
          <p class="text-white text-md">{{ $data->times === 0 ? '' : $data->times . ' x ' }} {{ $data->name }}</p>
          <button type="button" class="absolute right-3 top-3" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-points-{{ $data->id }}" data-hs-overlay="#modal-points-{{ $data->id }}"
            wire:click.prevent="openModal({{ $data->id }})">
            <iconify-icon icon="lucide:edit" class="text-neutral-500 hover:text-yellow-600"></iconify-icon>
          </button>
        </div>

        {{-- Modal Start --}}
        <div id="modal-points-{{ $data->id }}"
          class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
          role="dialog" tabindex="-1" aria-labelledby="modal-points-label" wire:ignore.self>
          <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
              class="flex flex-col w-full border shadow-sm pointer-events-auto border-neutral-600 bg-neutral-900 rounded-xl">
              <div class="flex items-center justify-between px-4 py-3 border-b border-neutral-600">
                <h3 id="modal-points-label" class="font-bold text-white">
                  {{ $data->name }}
                </h3>
                <button type="button"
                  class="inline-flex items-center justify-center text-white border border-transparent rounded-full bg-neutral-800 size-8 gap-x-2 hover:bg-neutral-700 focus:outline-none focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
                  aria-label="Close" data-hs-overlay="#modal-points-{{ $data->id }}">
                  <span class="sr-only">Close</span>
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                  </svg>
                </button>
              </div>
              <div class="p-4 overflow-y-auto">
                <div class="grid grid-cols-2 gap-3">

                  <div class="mb-4">
                    <label for="points" class="text-white">Poin</label>
                    <input type="number" id="points" class="block w-full p-3 text-white rounded-lg bg-lightGray"
                      wire:model='points'>
                  </div>
                  <div class="mb-4">
                    <label for="times" class="text-white">Kali</label>
                    <input type="number" id="times" class="block w-full p-3 text-white rounded-lg bg-lightGray"
                      wire:model='times'>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-end px-4 py-3 border-t border-neutral-600 gap-x-2">
                <button type="button" wire:click.prevent='update'
                  class="inline-flex items-center px-3 py-2 text-sm font-medium text-black bg-white border border-transparent rounded-lg gap-x-2 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                  Perbarui
                </button>
              </div>
            </div>
          </div>
        </div>
        {{-- Modal End --}}
      @endforeach


      <div class="relative p-6 text-center lg:col-span-3 md:col-span-2 bg-glass rounded-xl">
        <h1 class="mb-3 font-bold text-white text-8xl">106</h1>
        <p class="text-white text-md">Poin Sempurna</p>
      </div>
    </div>
  </section>
  {{-- System Points End --}}
</div>
