<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo.png') }}">

  <title>{{ $title . ' | CODER' ?? 'CODER' }}</title>

  {{-- JQuery --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  {{-- Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body class="h-screen overflow-y-hidden bg-black">
  <header
    class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-transparent text-sm py-2.5 sm:py-4 lg:ps-96">
    <nav class="flex items-center w-full px-4 mx-auto basis-full sm:px-6" aria-label="Global">
      <div class="me-5 lg:me-0 lg:hidden">
        <!-- Logo -->
        <a class="flex-none inline-block text-xl font-semibold rounded-xl focus:outline-none focus:opacity-80"
          href="#" aria-label="Preline">
          <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="w-36">
        </a>
        <!-- End Logo -->
      </div>

      <div class="flex items-center justify-end w-full ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
        <div class="sm:hidden">
          <button type="button"
            class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.3-4.3" />
            </svg>
          </button>
        </div>

        <div class="hidden sm:block">
          <label for="icon" class="sr-only">Search</label>
          <div class="relative min-w-72 md:min-w-80">
            <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none start-0 ps-4">
              <iconify-icon icon="lucide:search" class="flex-shrink-0 text-gray-400 size-5"></iconify-icon>

            </div>
            <input type="text" id="icon" name="icon"
              class="block w-full px-4 py-2 text-sm border-gray-200 rounded-lg ps-11 bg-lightGray focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Search">
          </div>
        </div>

        <div class="flex flex-row items-center justify-end gap-2">
          <button type="button" class="disabled:opacity-50 disabled:pointer-events-none">
            <iconify-icon icon="carbon:notification"
              class="w-[2.375rem] h-[2.375rem] inline-flex justify-center text-2xl items-center gap-x-2  font-semibold rounded-full border border-transparent text-[#9E9E9E] hover:bg-gray-100 hover:text-black "></iconify-icon>
          </button>
          <hr class="border-[#3D3D3D] border-l-2 h-10 mr-3">

          <div class="hs-dropdown [--placement:bottom-right] relative inline-flex items-center">
            <button id="hs-dropdown-with-header" type="button"
              class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
              <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                class="object-cover w-full h-full rounded-full">
            </button>

            <div
              class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-[#18181B] border border-[#27292C] shadow-md rounded-lg p-2"
              aria-labelledby="hs-dropdown-with-header">
              <div class="py-3 px-5 -m-2 text-white hover:bg-[#27292C] rounded-t-lg block md:hidden">
                <p class="text-sm">Irfan Yasin</p>
                <p class="text-sm font-medium">Ketua Web Development</p>
              </div>
              <div class="py-2 mt-2 first:pt-0 last:pb-0">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-white hover:bg-[#27292C]"
                  href="#">
                  <iconify-icon icon="carbon:user" class="text-lg"></iconify-icon>
                  Logout
                </a>
              </div>
            </div>
            <div class="ml-2.5 text-white hidden md:block">
              <h5 class="text-white font-mediom">Irfan Yasin</h5>
              <p class="text-xs font-light text-gray-400">Ketua Web Development</p>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="sticky inset-x-0 top-0 z-20 px-4 border-t bg-glass sm:px-6 md:px-8 lg:hidden">
    <div class="flex items-center justify-between py-2">
      <!-- Breadcrumb -->
      <ol class="flex items-center ms-3 whitespace-nowrap">
        <li class="flex items-center text-sm text-white">
          App
          <iconify-icon icon="ic:baseline-chevron-right" class="mx-3 text-lg text-white"></iconify-icon>
        </li>
        <li class="text-sm font-semibold text-white truncate" aria-current="page">
          {{ $title }}
        </li>
      </ol>
      <!-- End Breadcrumb -->

      <!-- Sidebar -->
      <button type="button"
        class="py-2 px-3 flex justify-center items-center gap-x-1.5 text-xs rounded-lg border border-gray-200 text-gray-500 hover:text-gray-600"
        data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Sidebar">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13" />
        </svg>
        <span class="sr-only">Sidebar</span>
      </button>
      <!-- End Sidebar -->
    </div>
  </div>


  <div id="application-sidebar"
    class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 
    -translate-x-full transition-all duration-300 transform w-[380px] hidden fixed inset-y-0 start-0 z-[60] 
    bg-glass overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0">
    <div class="flex justify-center px-8 py-12">
      <!-- Logo -->
      <a href="{{ route('app.dashboard') }}" wire:navigate class="block">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="w-36">
      </a>
      <!-- End Logo -->
    </div>

    <nav class="flex flex-col flex-wrap w-full p-8 pt-0 hs-accordion-group" data-hs-accordion-always-open>
      <ul class="space-y-1.5">
        <li class="mb-3">
          <a href="{{ route('app.dashboard') }}" wire:navigate
            class="flex items-center px-3.5 py-3 font-medium rounded-lg text-md hover:bg-white mb-1.5 hover:text-black {{ Request::is('app') ? 'active-menu' : 'text-gray-400' }}">
            <iconify-icon icon="material-symbols:dashboard-outline" class="mr-3 text-2xl"></iconify-icon>
            Dashboard
          </a>
        </li>
        <li class="mb-4 hs-accordion {{ Request::is('app/e-learning/*') ? 'active' : '' }}"
          id="e-learning-accordion">
          <button type="button"
            class="hs-accordion-toggle hs-accordion-active:text-gray-400 hs-accordion-active:hover:text-black  w-full text-start flex items-center gap-x-3.5 py-3 hover:text-black hover:bg-white mb-1.5 px-3 text-md font-medium text-gray-400 bg-transparent rounded-lg">
            <iconify-icon icon="game-icons:spell-book" class="text-2xl"></iconify-icon>
            E-Learning

            <iconify-icon icon="mdi:chevron-up"
              class="hidden text-xl text-gray-600 hs-accordion-active:block ms-auto size-4 group-hover:text-gray-500"></iconify-icon>
            <iconify-icon icon="mdi:chevron-down"
              class="block text-xl text-gray-600 hs-accordion-active:hidden ms-auto size-4 group-hover:text-gray-500"></iconify-icon>

          </button>

          <div id="e-learning-accordion"
            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::is('app/e-learning/*') ? 'block' : 'hidden' }}">
            <ul class="pt-2 hs-accordion-group" data-hs-accordion-always-open>
              <li class="hs-accordion" id="e-learning-accordion-sub-1">
                <a href="{{ route('app.e-learning.modul') }}" wire:navigate
                  class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white mb-1.5 hover:text-black ps-10 {{ Request::is('app/e-learning/modul/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/e-learning/modul') ? 'active-menu' : 'text-gray-400' }}">
                  <iconify-icon icon="fluent-emoji-high-contrast:open-book" class="mr-3 text-2xl"></iconify-icon>
                  Modul
                </a>
              </li>
              <li class="hs-accordion" id="e-learning-accordion-sub-2">
                <a href="{{ route('app.e-learning.task') }}" wire:navigate
                  class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white mb-1.5 hover:text-black ps-10 {{ Request::is('app/e-learning/task/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/e-learning/task') ? 'active-menu' : 'text-gray-400' }}">
                  <iconify-icon icon="bx:task" class="mr-3 text-2xl"></iconify-icon>
                  Tugas
                </a>
              </li>
              <li class="hs-accordion" id="e-learning-accordion-sub-3">
                <a href="{{ route('app.e-learning.meeting') }}" wire:navigate
                  class="flex py-3 font-medium rounded-lg text-md item-center hover:bg-white mb-1.5 hover:text-black ps-10 {{ Request::is('app/e-learning/meeting/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/e-learning/meeting') ? 'active-menu' : 'text-gray-400' }}">
                  <iconify-icon icon="fluent:video-24-regular" class="mr-3 text-2xl"></iconify-icon>
                  Pertemuan
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="mb-4">
          <a href=""
            class="flex items-center px-3 py-3 font-medium text-gray-400 bg-transparent rounded-lg hover:bg-white mb-1.5 hover:text-black text-md">
            <iconify-icon icon="ph:user-check" class="mr-3 text-2xl"></iconify-icon>
            Presensi
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('app.member') }}" wire:navigate
            class="flex items-center px-3 py-3 font-medium text-gray-400 bg-transparent rounded-lg hover:bg-white mb-1.5 hover:text-black text-md">
            <iconify-icon icon="ph:users-three" class="mr-3 text-2xl"></iconify-icon>
            Anggota
          </a>
        </li>
        <li class="mb-4">
          <a href=""
            class="flex items-center px-3 py-3 font-medium text-gray-400 bg-transparent rounded-lg hover:bg-white mb-1.5 hover:text-black text-md">
            <iconify-icon icon="teenyicons:attachment-outline" class="mr-3 text-2xl"></iconify-icon>
            Laporan
          </a>
        </li>

        <li class="mb-4 hs-accordion {{ Request::is('app/event/*') ? 'active' : '' }}" id="event-accordion">
          <button type="button"
            class="hs-accordion-toggle hs-accordion-active:hover:bg-white mb-1.5 w-full text-start flex items-center gap-x-3.5 py-3 hover:text-black hover:bg-white px-3 text-md font-medium text-gray-400 bg-transparent rounded-lg">
            <iconify-icon icon="carbon:event" class="text-2xl"></iconify-icon>
            Events

            <iconify-icon icon="mdi:chevron-up"
              class="hidden text-xl text-gray-600 hs-accordion-active:block ms-auto size-4 group-hover:text-gray-500"></iconify-icon>
            <iconify-icon icon="mdi:chevron-down"
              class="block text-xl text-gray-600 hs-accordion-active:hidden ms-auto size-4 group-hover:text-gray-500"></iconify-icon>
          </button>

          <div id="event-accordion"
            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::is('app/event/*') ? 'block' : 'hidden' }}">
            <ul class="pt-2 hs-accordion-group" data-hs-accordion-always-open>
              <li class="hs-accordion" id="event-accordion-sub-1">
                <a href=""
                  class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white mb-1.5 hover:text-black ps-10">
                  <iconify-icon icon="ic:outline-announcement" class="mr-3 text-2xl"></iconify-icon>
                  Pengumuman
                </a>
              </li>
              <li class="hs-accordion" id="event-accordion-sub-2">
                <a href="{{ route('app.event.reqrutment') }}" wire:navigate
                  class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white mb-1.5 hover:text-black ps-10 {{ Request::is('app/event/reqrutment/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/event/reqrutment') ? 'active-menu' : 'text-gray-400' }}">
                  <iconify-icon icon="ph:user-plus" class="mr-3 text-2xl"></iconify-icon>
                  Rekrutmen Panitia
                </a>
              </li>
              <li class="hs-accordion" id="event-accordion-sub-3">
                <a href="{{ route('app.event.management-event') }}" wire:navigate
                  class="flex py-3 font-medium text-gray-400 rounded-lg text-md item-center hover:bg-white mb-1.5 hover:text-black ps-10  {{ Request::is('app/event/management-event/*') ? 'active-menu' : 'text-gray-400' }} {{ Request::is('app/event/management-event') ? 'active-menu' : 'text-gray-400' }}">
                  <iconify-icon icon="mdi:todo-auto" class="mr-3 text-2xl"></iconify-icon>
                  Management Event
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
  </div>
  <!-- End Sidebar -->

  <div class="w-full lg:ps-96">
    <div class="h-screen p-5 space-y-4 overflow-y-auto sm:p-6 sm:space-y-6">
      <div class="mb-28">
        {{ $slot }}
      </div>
    </div>
  </div>


  {{-- <div class="flex">
    @livewire('components.sidebar')
    <main class="relative h-screen overflow-y-auto basis-full xl:basis-9/12">
      <div class="container px-4 md:px-6 lg:px-8">
        <div class="w-full mx-auto">
          @livewire('components.navbar-app')
          {{ $slot }}
        </div>
      </div>
    </main>
  </div> --}}
  <img src="{{ asset('assets/images/shape/object-5.png') }}" alt=""
    class="absolute right-0 w-1/3 top-10 -z-20">


  {{-- Iconify --}}
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  @livewireScripts

  @stack('js-custom')
</body>

</html>
