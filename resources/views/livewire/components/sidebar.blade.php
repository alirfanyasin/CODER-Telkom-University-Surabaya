<aside class="relative hidden h-screen px-5 py-10 overflow-y-auto bg-glass xl:basis-3/12 xl:block">
  <div class="flex justify-center">
    <a href="{{ route('app.dashboard') }}" wire:navigate class="block">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="w-36">
    </a>
  </div>
  <nav class="flex flex-col flex-wrap w-full p-6 hs-accordion-group" data-hs-accordion-always-open>
    <ul class="mt-10">
      <li class="mb-4">
        <a href="{{ route('app.dashboard') }}" wire:navigate
          class="flex items-center px-8 py-3 font-medium rounded-lg text-md hover:bg-white hover:text-black {{ Request::is('app') ? 'active-menu' : 'text-gray-400' }}">
          <iconify-icon icon="material-symbols:dashboard-outline" class="mr-3 text-2xl"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li class="mb-4">
        <a href="{{ route('app.division') }}" wire:navigate
          class="flex items-center px-8 py-3 font-medium rounded-lg text-md hover:bg-white hover:text-black {{ Request::is('app/division/*') ? 'active-menu' : 'text-gray-400' }}">
          <iconify-icon icon="material-symbols:dashboard-outline" class="mr-3 text-2xl"></iconify-icon>
          Divisi
        </a>
      </li>
      <li class="mb-4 hs-accordion {{ Request::is('app/e-learning/*') ? 'active' : '' }}" id="e-learning-accordion">
        <button type="button"
          class="hs-accordion-toggle hs-accordion-active:text-gray-400 hs-accordion-active:hover:text-black  w-full text-start flex items-center gap-x-3.5 py-3 hover:text-black hover:bg-white px-8 text-md font-medium text-gray-400 bg-transparent rounded-lg">
          <iconify-icon icon="game-icons:spell-book" class="text-2xl"></iconify-icon>
          E-Learning

          <svg
            class="hidden text-gray-600 hs-accordion-active:block ms-auto size-4 group-hover:text-gray-500 dark:text-neutral-400"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 15-6-6-6 6" />
          </svg>

          <svg
            class="block text-gray-600 hs-accordion-active:hidden ms-auto size-4 group-hover:text-gray-500 dark:text-neutral-400"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>

        <div id="e-learning-accordion"
          class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::is('app/e-learning/*') ? 'block' : 'hidden' }}">
          <ul class="pt-2 hs-accordion-group" data-hs-accordion-always-open>
            <li class="hs-accordion" id="e-learning-accordion-sub-1">
              <a href="{{ route('app.e-learning.modul') }}" wire:navigate
                class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white hover:text-black ps-16 {{ Request::is('app/e-learning/modul/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/e-learning/modul') ? 'active-menu' : 'text-gray-400' }}">
                <iconify-icon icon="fluent-emoji-high-contrast:open-book" class="mr-3 text-2xl"></iconify-icon>
                Modul
              </a>
            </li>
            <li class="hs-accordion" id="e-learning-accordion-sub-2">
              <a href=""
                class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white hover:text-black ps-16">
                <iconify-icon icon="bx:task" class="mr-3 text-2xl"></iconify-icon>
                Tugas
              </a>
            </li>
            <li class="hs-accordion" id="e-learning-accordion-sub-3">
              <a href="{{ route('app.e-learning.meeting') }}" wire:navigate
                class="flex py-3 font-medium rounded-lg text-md item-center hover:bg-white hover:text-black ps-16 {{ Request::is('app/e-learning/meeting/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/e-learning/meeting') ? 'active-menu' : 'text-gray-400' }}">
                <iconify-icon icon="fluent:video-24-regular" class="mr-3 text-2xl"></iconify-icon>
                Pertemuan
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="mb-4">
        <a href=""
          class="flex items-center px-8 py-3 font-medium text-gray-400 bg-transparent rounded-lg hover:bg-white hover:text-black text-md">
          <iconify-icon icon="ph:user-check" class="mr-3 text-2xl"></iconify-icon>
          Presensi
        </a>
      </li>
      <li class="mb-4">
        <a href="{{ route('app.member') }}" wire:navigate
          class="flex items-center px-3.5 py-3 font-medium rounded-lg hover:bg-white hover:text-black text-md {{ Request::is('app/member') ? 'active-menu' : 'text-gray-400' }}">
          <iconify-icon icon="ph:users-three" class="mr-3 text-2xl"></iconify-icon>
          Anggota
        </a>
      </li>
      <li class="mb-4">
        <a href=""
          class="flex items-center px-8 py-3 font-medium text-gray-400 bg-transparent rounded-lg hover:bg-white hover:text-black text-md">
          <iconify-icon icon="teenyicons:attachment-outline" class="mr-3 text-2xl"></iconify-icon>
          Laporan
        </a>
      </li>

      <li class="mb-4 hs-accordion {{ Request::is('app/event/*') ? 'active' : '' }}" id="event-accordion">
        <button type="button"
          class="hs-accordion-toggle hs-accordion-active:hover:bg-white w-full text-start flex items-center gap-x-3.5 py-3 hover:text-black hover:bg-white px-8 text-md font-medium text-gray-400 bg-transparent rounded-lg">
          <iconify-icon icon="carbon:event" class="text-2xl"></iconify-icon>
          Events

          <svg
            class="hidden text-gray-600 hs-accordion-active:block ms-auto size-4 group-hover:text-gray-500 dark:text-neutral-400"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 15-6-6-6 6" />
          </svg>

          <svg
            class="block text-gray-600 hs-accordion-active:hidden ms-auto size-4 group-hover:text-gray-500 dark:text-neutral-400"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>

        <div id="event-accordion"
          class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::is('app/event/*') ? 'block' : 'hidden' }}">
          <ul class="pt-2 hs-accordion-group" data-hs-accordion-always-open>
            <li class="hs-accordion" id="event-accordion-sub-1">
              <a href=""
                class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white hover:text-black ps-16">
                <iconify-icon icon="ic:outline-announcement" class="mr-3 text-2xl"></iconify-icon>
                Pengumuman
              </a>
            </li>
            <li class="hs-accordion" id="event-accordion-sub-2">
              <a href="{{ route('app.event.reqrutment') }}" wire:navigate
                class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white hover:text-black ps-16 {{ Request::is('app/event/reqrutment/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/event/reqrutment') ? 'active-menu' : 'text-gray-400' }}">
                <iconify-icon icon="ph:user-plus" class="mr-3 text-2xl"></iconify-icon>
                Rekrutmen Panitia
              </a>
            </li>
            <li class="hs-accordion" id="event-accordion-sub-3">
              <a href="{{ route('app.event.management-event') }}" wire:navigate
                class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white hover:text-black ps-16  {{ Request::is('app/event/management-event/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/event/management-event') ? 'active-menu' : 'text-gray-400' }}">
                <iconify-icon icon="mdi:todo-auto" class="mr-3 text-2xl"></iconify-icon>
                Management Event
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
</aside>
