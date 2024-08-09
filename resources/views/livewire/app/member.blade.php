<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Anggota</h2>

    @role(['admin|super-admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.member.recruitment') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Rekrut Anggota
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.member.recruitment') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
            icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}



  {{-- Member Section Start --}}
  <section>
    <div class="grid grid-cols-1 gap-2 lg:grid-cols-4 md:grid-cols-2">
      @foreach ($datas as $data)
        <div
          class="relative px-5 pt-5 pb-16 text-center text-white rounded-lg bg-neutral-900 group hover:border hover:border-gray-500">
          <div class="w-20 h-20 mx-auto overflow-hidden rounded-full">
            <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar" class="object-cover w-full h-full">
          </div>
          <h4 class="mt-4 font-semibold text-md">{{ $data->name }}</h4>
          <p class="my-1 text-xs font-light text-gray-400">{{ $data->email }}</p>
          @if ($data->hasRole('admin'))
            <p class="text-xs font-light text-white">{{ $data->label }}</p>
          @endif
          <div class="absolute transform -translate-x-1/2 left-1/2 bottom-5">
            <a href="{{ route('app.member.detail') }}" wire:navigate
              class="inline-block py-2 text-xs border rounded-full px-9 group-hover:bg-white group-hover:text-black">
              Profile
            </a>
          </div>
          @role(['admin'])
            @if (Auth::user()->id !== $data->id)
              {{-- Action button start --}}
              <div class="absolute z-10 inline-flex top-5 right-5 hs-dropdown">
                <button id="hs-dropdown-custom-icon-trigger" type="button"
                  class="flex items-center justify-center text-sm font-semibold text-gray-800 bg-transparent rounded-lg shadow-sm hs-dropdown-toggle size-9 hover:bg-neutral-800 disabled:opacity-50 disabled:pointer-events-none">
                  <svg class="flex-none text-gray-600 size-4 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="12" cy="5" r="1" />
                    <circle cx="12" cy="19" r="1" />
                  </svg>
                </button>
                <div
                  class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                  aria-labelledby="hs-dropdown-custom-icon-trigger">
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="#" wire:click='makeALeader({{ $data->id }})'>
                    <iconify-icon icon="hugeicons:user-star-01"></iconify-icon>
                    Jadikan Ketua Divisi
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="#" wire:click='removeAsAMember({{ $data->id }})'>
                    <iconify-icon icon="hugeicons:user-star-01"></iconify-icon>
                    Keluarkan Dari Anggota
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="#">
                    <iconify-icon icon="mingcute:user-x-line"></iconify-icon>
                    Hapus
                  </a>
                </div>
              </div>
              {{-- Action button end --}}
            @endif
          @endrole
        </div>
      @endforeach

    </div>
  </section>
  {{-- Member Section End --}}
</div>
