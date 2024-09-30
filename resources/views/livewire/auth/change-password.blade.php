<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Ubah Password</h2>
  </header>
  {{-- Header End --}}


  {{-- Form Change Password Start --}}
  <section>
    <form wire:submit='savePassword'>
      @csrf
      <div class="w-full p-6 mb-6 bg-glass rounded-xl">
        <header class="flex items-center justify-between mb-8 text-white">
          <div class="flex items-center">
            <a href="{{ route('app.profile.edit') }}" wire:navigate
              class="flex items-center justify-center w-8 h-8 rounded-full hover:border me-2 bg-lightGray">
              <iconify-icon icon="carbon:arrow-left"></iconify-icon>
            </a>
            <h4 class="text-xl font-semibold">Informasi Password</h4>
          </div>
        </header>
        <div class="">
          <div class="w-full mb-5">
            <label for="password" class="block mb-2 font-light text-white">Password</label>
            <div class="relative">
              <input type="password" id="password" class="block w-full p-3 text-white rounded-lg bg-lightGray"
                wire:model='password'>
              <button type="button" data-hs-toggle-password='{"target": "#password"}'
                class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer end-0 rounded-e-md focus:outline-none focus:text-blue-600">
                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                  </path>
                  <path class="hs-password-active:hidden"
                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                  </path>
                  <path class="hs-password-active:hidden"
                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                  </path>
                  <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22">
                  </line>
                  <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                  </path>
                  <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>
            @error('password')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="w-full mb-5">
            <label for="new_password" class="block mb-2 font-light text-white">Password Baru</label>
            <div class="relative">
              <input type="password" id="new_password" class="block w-full p-3 text-white rounded-lg bg-lightGray"
                placeholder="" wire:model='new_password'>

              <button type="button" data-hs-toggle-password='{"target": "#new_password"}'
                class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer end-0 rounded-e-md focus:outline-none focus:text-blue-600">
                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                  </path>
                  <path class="hs-password-active:hidden"
                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                  </path>
                  <path class="hs-password-active:hidden"
                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                  </path>
                  <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22">
                  </line>
                  <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                  </path>
                  <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>

            @error('new_password')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
          <div class="w-full mb-5">
            <label for="confirm_password" class="block mb-2 font-light text-white">Konfirmasi Password</label>
            <div class="relative">
              <input type="password" id="confirm_password" class="block w-full p-3 text-white rounded-lg bg-lightGray"
                placeholder="" wire:model='confirm_password'>
              <button type="button" data-hs-toggle-password='{"target": "#confirm_password"}'
                class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer end-0 rounded-e-md focus:outline-none focus:text-blue-600">
                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                  </path>
                  <path class="hs-password-active:hidden"
                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                  </path>
                  <path class="hs-password-active:hidden"
                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                  </path>
                  <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                    y2="22">
                  </line>
                  <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                  </path>
                  <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>

            @error('confirm_password')
              <small class="text-red-600"> {{ $message }} </small>
            @enderror
          </div>
        </div>
      </div>

      <div class="flex justify-end mb-6">
        <a href="{{ route('app.profile.edit') }}" wire:navigate
          class="inline-block px-5 py-3 text-sm font-semibold text-gray-400 border border-gray-400 rounded-md hover:border-red-700 hover:text-white hover:bg-red-700">Batal</a>
        <button type="submit" wire:loading.remove
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md ms-3">Simpan Password
        </button>

        {{-- Loaading event start --}}
        <div wire:loading wire:target="savePassword"
          class="flex items-center px-16 py-3 text-sm font-semibold text-black bg-white rounded-md ms-3">
          <div
            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-black rounded-full"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        {{-- Loaading event end --}}


      </div>
    </form>
  </section>
  {{-- Form Change Password End --}}
</div>
