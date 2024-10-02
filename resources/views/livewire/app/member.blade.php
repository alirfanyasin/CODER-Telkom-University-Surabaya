<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Anggota ({{ $datas->count() }})</h2>

    @role(['admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.member.recruitment') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Rekrut Anggota
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.member.recruitment') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
            icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}


  {{-- Count Member Start --}}
  @role('super-admin')
    <div class="grid grid-cols-1 gap-2 mb-5 lg:grid-cols-6 md:grid-cols-2">
      @foreach ($allDivision as $division)
        <div
          class="relative px-5 pt-5 pb-16 text-center text-white rounded-lg bg-neutral-900 group hover:border hover:border-gray-500">
          <h3 class="text-5xl font-bold">{{ $division->user_count }}</h3>
          <h5 class="absolute text-xs font-light text-center transform -translate-x-1/2 bottom-5 left-1/2">
            {{ $division->name }}</h5>
        </div>
      @endforeach
    </div>
  @endrole
  {{-- Count Member End --}}



  {{-- Member Section Start --}}
  <section>
    <div class="grid grid-cols-1 gap-2 lg:grid-cols-4 md:grid-cols-2">
      @foreach ($datas as $data)
        @if ($data->label !== 'Super Admin')
          <div
            class="relative px-5 pt-5 pb-16 text-center text-white rounded-lg bg-neutral-900 group hover:border hover:border-gray-500">
            <div class="w-20 h-20 mx-auto overflow-hidden rounded-full">
              @if (str_starts_with($data->avatar, 'https://lh3.googleusercontent.com/'))
                <img src="{{ $data->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
              @else
                <img
                  src="{{ $data->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $data->avatar) }}"
                  alt="Avatar" class="object-cover w-full h-full rounded-full">
              @endif
            </div>
            <h4 class="mt-4 font-semibold break-words text-md">{{ $data->name }}</h4>
            <div class="my-1 text-center">
              <p class="text-xs font-light text-gray-400 break-words">
                {{ $data->email }}
              </p>
            </div>
            @if ($data->hasRole(['admin']))
              <p class="text-xs font-light text-white break-words">{{ $data->label }}</p>
            @endif
            @role('super-admin')
              @if (!$data->hasRole(['admin']))
                <p class="text-xs font-light text-white break-words">{{ $data->label }}</p>
              @endif
            @endrole
            <div class="absolute transform -translate-x-1/2 left-1/2 bottom-5">
              <a href="{{ route('app.member.show', ['id' => $data->id, 'name' => $data->name]) }}" wire:navigate
                class="inline-block py-2 text-xs border rounded-full px-9 group-hover:bg-white group-hover:text-black">
                Profile
              </a>
            </div>
            @role(['admin|super-admin'])
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
                    @role(['super-admin|admin'])
                      @role(['super-admin'])
                        @foreach ($allDivision as $division)
                          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                            href="#" wire:click='makeALeader({{ $data->id }}, {{ $division->id }})'>
                            <iconify-icon icon="hugeicons:user-star-01"></iconify-icon>
                            Jadikan Admin Divisi {{ $division->name }}
                          </a>
                        @endforeach
                      @endrole
                      @role(['admin'])
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                          href="#" wire:click='makeALeader({{ $data->id }})'>
                          <iconify-icon icon="hugeicons:user-star-01"></iconify-icon>
                          Jadikan Admin Divisi
                        </a>
                      @endrole
                      @role(['super-admin'])
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                          href="#" wire:click='makeAlumni({{ $data->id }})'>
                          <iconify-icon icon="hugeicons:user-star-01"></iconify-icon>
                          Jadikan Alumni
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                          href="#" wire:click.prevent='givePointCommitee({{ $data->id }})'>
                          <iconify-icon icon="mingcute:star-line"></iconify-icon>
                          Berikan Point Kepanitian
                        </a>
                      @endrole
                      <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="#" wire:click='removeAsAMember({{ $data->id }})'>
                        <iconify-icon icon="mingcute:user-x-line"></iconify-icon>
                        Keluarkan Menjadi User
                      </a>
                      @role(['super-admin'])
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                          href="#" wire:click='destroy({{ $data->id }})'>
                          <iconify-icon icon="tabler:trash"></iconify-icon>
                          Hapus
                        </a>
                      @endrole
                    @endrole

                  </div>
                </div>
                {{-- Action button end --}}
              @endif
            @endrole
          </div>
        @endif
      @endforeach

    </div>
  </section>
  {{-- Member Section End --}}
</div>
