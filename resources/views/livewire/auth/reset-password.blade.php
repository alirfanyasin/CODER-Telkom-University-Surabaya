<div class="container ">
  <div class="flex items-center justify-center h-screen">
    <div class="w-11/12 lg:w-4/12 md:w-8/12">
      <div class="block shadow-xl rounded-xl p-7 bg-glass">
        <div class="flex justify-center mb-4">
          <img src="{{ asset('assets/images/logo/logo.png') }}" width="100" alt="">
        </div>
        <form wire:submit.prevent='resetPassword'>
          @csrf
          <input type="hidden" name="token" id="token" wire:model='token' value="{{ request()->token }}">
          <input type="hidden" name="email" id="email" wire:model='email' value="{{ request()->email }}">
          <div class="block text-left">
            <div class="mb-4">
              <label for="password" class="text-xs font-normal text-white">Kata Sandi Baru</label>
              <div class="relative">
                <div class="relative">
                  <input id="hs-new-password" type="password" wire:model='password'
                    class="block w-full px-4 py-3 pl-12 mt-1 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="">
                  <button type="button" data-hs-toggle-password='{"target": "#hs-new-password"}'
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
                        y2="22"></line>
                      <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                      </path>
                      <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                    </svg>
                  </button>
                </div>
                @error('password')
                  <small class="text-red-600"> {{ $message }} </small>
                @enderror
                <iconify-icon icon="bx:lock" class="absolute text-2xl text-neutral-600 top-3 left-3"></iconify-icon>
              </div>
            </div>

            <div class="mb-4">
              <label for="password" class="text-xs font-normal text-white">Konfirmasi Kata Sandi</label>
              <div class="relative">
                <div class="relative">
                  <input id="confirm-password" type="password" wire:model='password_confirmation'
                    class="block w-full px-4 py-3 pl-12 mt-1 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="">
                  <button type="button" data-hs-toggle-password='{"target": "#confirm-password"}'
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
                        y2="22"></line>
                      <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                      </path>
                      <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                    </svg>
                  </button>
                </div>
                @error('password_confirmation')
                  <small class="text-red-600"> {{ $message }} </small>
                @enderror
                <iconify-icon icon="bx:lock" class="absolute text-2xl text-neutral-600 top-3 left-3"></iconify-icon>
              </div>
            </div>
          </div>
          <button type="submit"
            class="inline-flex items-center justify-center w-full px-4 py-3 mb-6 text-sm bg-white border border-transparent rounded-lg gap-x-2 bg-opacity-30 disabled:opacity-50 disabled:pointer-events-none">
            <span class="font-semibold text-white" wire:loading.remove>
              Update Password
            </span>
            <span class="font-semibold text-white" wire:loading>
              Loading...
            </span>
          </button>
        </form>
      </div>
      <p class="mt-8 text-sm text-center text-gray-700">&copy; CODER Version 2.0</p>
    </div>
  </div>
</div>
