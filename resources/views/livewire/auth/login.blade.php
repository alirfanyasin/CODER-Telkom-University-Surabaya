<div class="container ">
  <div class="flex items-center justify-center h-screen">
    <div class="w-11/12 lg:w-4/12 md:w-8/12">
      <div class="block shadow-xl rounded-xl p-7 bg-glass">
        <div class="flex justify-center mb-4">
          <img src="{{ asset('assets/images/logo/logo.png') }}" width="100" alt="">
        </div>
        <a href="#"
          class="inline-flex items-center justify-center w-full px-4 py-3 mb-2 text-sm bg-white border border-transparent rounded-lg gap-x-2 bg-opacity-30 disabled:opacity-50 disabled:pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
            <path fill="#ffc107"
              d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917" />
            <path fill="#ff3d00"
              d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691" />
            <path fill="#4caf50"
              d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44" />
            <path fill="#1976d2"
              d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917" />
          </svg>
          <span class="font-medium text-white">
            Masuk/Daftar dengan Google
          </span>
        </a>
        <p class="my-3 text-xs text-center text-white">
          <span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span>
          Atau
          <span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span><span>&#9135;</span>
        </p>
        <form action="">
          <div class="block text-left">
            <label for="input-label" class="text-xs font-normal text-white">Username / Alamat Email</label>
            <input type="text" id="input-label"
              class="block w-full px-4 py-3 mt-1 mb-4 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
              placeholder="">
            <label for="input-label" class="text-xs font-normal text-white">Kata Sandi</label>
            <input type="password" id="input-label"
              class="block w-full px-4 py-3 mt-1 mb-4 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
              placeholder="">
          </div>
        </form>
        <div class="flex justify-between mb-3 text-sm text-white">
          <div class="flex">
            <input type="checkbox"
              class="text-blue-600 border-gray-200 rounded shrink-0 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
              id="hs-default-checkbox">
            <label for="hs-default-checkbox" class="text-xs ms-3">Ingat
              Saya</label>
          </div>
          <a href="" class="text-xs">Lupa Kata Sandi</a>
        </div>
        <button type="submit"
          class="inline-flex items-center justify-center w-full px-4 py-3 mb-6 text-sm bg-white border border-transparent rounded-lg gap-x-2 bg-opacity-30 disabled:opacity-50 disabled:pointer-events-none">
          <span class="font-semibold text-white">
            Masuk
          </span>
        </button>
        <p class="text-xs text-center text-white">Apakah Anda belun mempunyai akun? <a href="{{ route('register') }}"
            wire:navigate class="font-semibold">Daftar</a>
        </p>
      </div>
      <p class="mt-8 text-xs text-center text-gray-700">&copy; CODER Version 2.0</p>
    </div>
  </div>


</div>
