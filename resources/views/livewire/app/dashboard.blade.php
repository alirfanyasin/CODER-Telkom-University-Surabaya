<div>
  {{-- Header Section Start --}}
  <section class="my-10">
    <header>
      <h2 class="text-3xl font-semibold text-white">Halo, {{ Auth::user()->name }}</h2>
      <p class="text-gray-400">Siap untuk belajar sekarang!</p>
    </header>
  </section>
  {{-- Header Section End --}}


  {{-- Total Section Start --}}
  <section class="mb-3">
    <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
      @role(['super-admin'])
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">10</h3>
          <p class="text-gray-400">Total User</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">10</h3>
          <p class="text-gray-400">Total Laporan</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">18</h3>
          <p class="text-gray-400">Total Divisi</p>
        </div>
      @endrole
      @role(['admin'])
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">{{ $totalMeeting }}</h3>
          <p class="text-gray-400">Total Pertemuan</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">10</h3>
          <p class="text-gray-400">Total Tugas</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">{{ $totalQuiz }}</h3>
          <p class="text-gray-400">Total Kuis</p>
        </div>
      @endrole
      @role(['user'])
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">5</h3>
          <p class="text-gray-400">Pertemuan Diikuti</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">3</h3>
          <p class="text-gray-400">Tugas Terkumpul</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">{{ $point }}</h3>
          <p class="text-gray-400">Total Point</p>
        </div>
      @endrole

    </div>
  </section>
  {{-- Total Section End --}}

  {{-- Statistic and Meeting Schedule Section Start --}}
  <section class="mb-3">
    <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">
      <div class="col-span-2 p-6 rounded-xl bg-glass">
        <header class="mb-4">
          <h4 class="text-xl font-semibold text-white">Statistik Aktifitas</h4>
        </header>

        <div>
          {!! $activityCart->container() !!}
        </div>
      </div>
      {{-- Recent users start --}}
      <div class="col-span-1 p-6 rounded-xl bg-glass lg:-me-0 -me-3">
        <header class="mb-6">
          <h4 class="text-xl font-semibold text-white">Pengguna Terkini</h4>
        </header>
        <div class="h-[300px] overflow-auto">
          @foreach ($userActive as $user)
            <div class="flex items-center mb-3">
              <div class="relative">
                <div class="w-10 h-10 overflow-hidden rounded-full">
                  @if (str_starts_with($user->avatar, 'https://lh3.googleusercontent.com/'))
                    <img src="{{ $user->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
                  @else
                    <img
                      src="{{ $user->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $user->avatar) }}"
                      alt="Avatar" class="object-cover w-full h-full rounded-full">
                  @endif

                </div>
                @if ($user->status === 'active')
                  <div class="absolute w-2.5 h-2.5 bg-green-600 border border-white rounded-full right-0 top-1"></div>
                @endif
              </div>
              <div class="text-white ms-2">
                <h3 class="text-sm break-words">{{ Str::limit($user->user->name ?? '', 25, '...') }}</h3>
                <p class="text-xs font-light text-gray-500">{{ $user->user->label ?? '' }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    {{-- Recent users end --}}
  </section>
  {{-- Statistic and Meeting Schedule Section End --}}


  <section class="mb-10">
    <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
      {{-- Meeting Schedule Start --}}
      <div class="p-6 rounded-xl bg-glass">
        <div class="">
          <header class="mb-4">
            <h4 class="text-xl font-semibold text-white">Jadwal Pertemuan</h4>
          </header>
          @foreach ($meetingData as $meeting)
            @if ($meeting->status == 'aktif')
              <a href="" wire:navigate class="block" class="w-full bg-red-300">
                <div class="w-full p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
                  <header class="flex items-center justify-between mb-3 text-white">
                    <div class="flex items-center">
                      <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
                      <span
                        class="text-sm font-light">{{ \Carbon\Carbon::parse($meeting->date_time)->translatedFormat('l, d F Y') }}</span>
                      <span class="text-sm font-light ms-2"> -
                        {{ \Carbon\Carbon::parse($meeting->date_time)->format('H:i') }}
                        WIB</span>
                    </div>
                    <div class="px-2 py-2 text-xs bg-blue-600 rounded-full"></div>
                  </header>
                  <div>
                    <div>
                      <h3 class="text-2xl font-semibold text-white">{{ $meeting->name }}</h3>
                      <p class="font-light text-gray-400">{{ $meeting->description }}</p>
                    </div>

                    <div class="flex items-center justify-between w-full mt-4">
                      {{-- Icon meeting type start --}}
                      @if ($meeting->type == 'offline')
                        <div class="flex items-center w-full">
                          <a href=""
                            class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                            <iconify-icon icon="carbon:location"
                              class="text-3xl text-white group-hover:text-black"></iconify-icon>
                          </a>
                          <p class="text-white ms-3">{{ $meeting->location }}</p>
                        </div>
                      @elseif($meeting->type == 'online')
                        <div class="flex items-center w-full">
                          <a target="_blank" href="{{ $meeting->link }}"
                            class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                            <iconify-icon icon="fluent:video-24-regular"
                              class="text-3xl text-white group-hover:text-black"></iconify-icon>
                          </a>
                          @php
                            $host = '';
                            $parsedUrl = parse_url($meeting->link);
                            if ($parsedUrl && isset($parsedUrl['host'])) {
                                $host = $parsedUrl['host'];
                            }
                          @endphp
                          @if ($host == 'meet.google.com')
                            <p class="text-white ms-3">google meet</p>
                          @elseif($host == 'us05web.zoom.us')
                            <p class="text-white ms-3">Zoom</p>
                          @else
                            <p class="text-white ms-3">Online</p>
                          @endif

                        </div>
                      @endif

                      {{-- Icon meeting type end --}}
                    </div>
                  </div>
                </div>
              </a>
            @endif
          @endforeach

        </div>

      </div>
      {{-- Meeting Schedule End --}}

      {{-- Task task start --}}
      <div class="p-6 rounded-xl bg-glass">
        <div class="">
          <header class="mb-4">
            <h4 class="text-xl font-semibold text-white">Tugas</h4>
          </header>
          <a href="" wire:navigate class="block" class="w-full bg-red-300">
            <div class="w-full p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
              <header class="flex items-center justify-between mb-3 text-white">
                <div class="flex items-center">
                  <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
                  <span class="text-sm font-light">Sabtu, 14 September 2024</span>
                  <span class="text-sm font-light ms-2"> - 08:30
                    WIB</span>
                </div>
                {{-- @if ($meet->status == 'aktif') --}}
                <div class="px-2 py-2 text-xs bg-blue-600 rounded-full"></div>
                {{-- @elseif ($meet->status == 'selesai')
                  <div class="px-2 py-2 text-xs bg-green-600 rounded-full"></div>
                @else
                  <div class="px-2 py-2 text-xs bg-yellow-600 rounded-full"></div>
                @endif --}}
              </header>
              <div>
                <div>
                  <h3 class="text-lg font-semibold text-white">Tugas 1</h3>
                  <p class="font-light text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Dignissimos, placeat dolore impedit eius ullam voluptates neque nostrum possimus veniam repudiandae.
                  </p>
                </div>

                <div class="flex items-center justify-between w-full mt-4">
                  @role(['admin'])
                    {{-- Icon action start --}}
                    <div class="inline md:flex md:justify-between">

                      <div class="flex gap-2 text-gray-400 md:gap-4">
                        <button type="button" wire:click=""
                          class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
                          <iconify-icon icon="tabler:trash"></iconify-icon><span class="hidden md:block">Hapus</span>
                        </button>
                        <a href=""
                          class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 md:px-4 py-1">
                          <iconify-icon icon="lucide:edit"></iconify-icon><span class="hidden md:block">Edit</span>
                        </a>
                      </div>
                    </div>
                    {{-- Icon action end --}}
                  @endrole
                </div>
              </div>
            </div>
          </a>
        </div>

      </div>
      {{-- Task task end --}}




  </section>
  {{-- Meeting Schedule End --}}

</div>

@push('js-custom')
  <script src="{{ $activityCart->cdn() }}"></script>
  <script src="{{ $presenceChart->cdn() }}"></script>
  {{ $activityCart->script() }}
  {{ $presenceChart->script() }}
@endpush

{{-- 

<div>
  <div class="p-4 mb-4 border border-gray-500 rounded-xl">
    <header class="flex items-center">
      <h5 class="text-xs text-white">12.00 - 14.00</h5>
      <div class="mx-2 border-l-2 border-white">|</div>
      <h5 class="text-xs text-white">29 September 2024</h5>
    </header>
    <p class="mt-5 font-light text-gray-400">Belajar menggunakan Framework Tailwind.</p>
    <a href="" class="flex items-center justify-center w-10 h-10 mt-4 border border-gray-500 rounded-lg">
      <iconify-icon icon="fluent:video-24-regular" class="text-3xl text-white"></iconify-icon>
    </a>
  </div>
  <div class="p-4 mb-4 border border-gray-500 rounded-xl">
    <header class="flex items-center">
      <h5 class="text-xs text-white">12.00 - 14.00</h5>
      <div class="mx-2 border-l-2 border-white">|</div>
      <h5 class="text-xs text-white">29 September 2024</h5>
    </header>
    <p class="mt-5 font-light text-gray-400">Belajar menggunakan Framework Tailwind.</p>
    <a href="" class="flex items-center justify-center w-10 h-10 mt-4 border border-gray-500 rounded-lg">
      <iconify-icon icon="fluent:video-24-regular" class="text-3xl text-white"></iconify-icon>
    </a>
  </div>
  <div class="p-4 mb-4 border border-gray-500 rounded-xl">
    <header class="flex items-center">
      <h5 class="text-xs text-white">12.00 - 14.00</h5>
      <div class="mx-2 border-l-2 border-white">|</div>
      <h5 class="text-xs text-white">29 September 2024</h5>
    </header>
    <p class="mt-5 font-light text-gray-400">Belajar menggunakan Framework Tailwind.</p>
    <a href="" class="flex items-center justify-center w-10 h-10 mt-4 border border-gray-500 rounded-lg">
      <iconify-icon icon="fluent:video-24-regular" class="text-3xl text-white"></iconify-icon>
    </a>
  </div>
</div> --}}
