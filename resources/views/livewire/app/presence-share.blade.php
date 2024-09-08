<div class="container">
    <div class="flex items-center justify-center h-screen">
      <div class="w-11/12 lg:w-4/12 md:w-8/12">
        <div class="block shadow-xl rounded-xl p-7 bg-glass">
          <div class="flex justify-center mb-4">
            <img src="{{ asset('assets/images/logo/logo.png') }}" width="100" alt="">
          </div>
          <form wire:submit='absensi'>
            <div class="block text-left">
              <div class="mb-4">
                <label for="email" class="text-xs font-normal text-white">Identity Code</label>
                <div class="relative">
                  <input type="text" id="userid" wire:model='userId'
                    class="block w-full px-4 py-3 pl-12 mt-1 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="ID">
                  @error('userId')
                    <small class="text-red-600"> {{ $message }} </small>
                  @enderror
                  <iconify-icon icon="mdi:user"
                    class="absolute text-2xl text-neutral-600 top-3 left-3"></iconify-icon>
                </div>
              </div>
            </div>
            <button type="submit"
              class="inline-flex items-center justify-center w-full px-4 py-3 mb-6 text-sm bg-white border border-transparent rounded-lg gap-x-2 bg-opacity-30 disabled:opacity-50 disabled:pointer-events-none">
              <span class="font-semibold text-white" wire:loading.remove>
                Absensi
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
