<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Pertemuan</h2>

    @role(['admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
          Pertemuan <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
            icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}


  {{-- Division Start --}}
  @role('super-admin')
    <div class="flex w-full gap-3 p-3 mb-10 overflow-auto flex-nowrap scroll-div">
      @foreach ($allDivision as $division)
        <a href="#" wire:click.prevent='selectDivision({{ $division->id }})'
          class="inline-block px-5 py-2  border border-white rounded-lg text-nowrap hover:bg-white hover:text-black {{ session('active-meeting') === $division->id ? 'bg-white text-black' : 'text-white' }}">{{ $division->name }}</a>
      @endforeach
    </div>
  @endrole
  {{-- Division End --}}


  {{-- View All Meeting Section Start --}}
  <section class="mb-10">
    @foreach ($meetings as $meet)
      <a href="{{ route('app.e-learning.meeting.show', ['id' => $meet->slug]) }}" wire:navigate class="block">
        <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
          <header class="flex items-center justify-between mb-3 text-white">
            <div class="flex items-center">
              <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
              <span
                class="text-sm font-light">{{ \Carbon\Carbon::parse($meet->date_time)->translatedFormat('l, d F Y') }}</span>
              <span class="text-sm font-light ms-2"> - {{ \Carbon\Carbon::parse($meet->date_time)->format('H:i') }}
                WIB</span>
            </div>
            @if ($meet->status == 'aktif')
              <div class="px-2 py-2 text-xs bg-blue-600 rounded-full"></div>
            @elseif ($meet->status == 'selesai')
              <div class="px-2 py-2 text-xs bg-green-600 rounded-full"></div>
            @else
              <div class="px-2 py-2 text-xs bg-yellow-600 rounded-full"></div>
            @endif
          </header>
          <div>
            <div>
              <h3 class="text-2xl font-semibold text-white">{{ $meet->name }}</h3>
              <p class="font-light text-gray-400">{{ $meet->description }}</p>
            </div>

            <div class="flex items-center justify-between w-full mt-4">
              {{-- Icon meeting type start --}}
              @if ($meet->type == 'offline')
                <div class="flex items-center w-full">
                  <a href=""
                    class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                    <iconify-icon icon="carbon:location"
                      class="text-3xl text-white group-hover:text-black"></iconify-icon>
                  </a>
                  <p class="text-white ms-3">{{ $meet->location }}</p>
                </div>
              @elseif($meet->type == 'online')
                <div class="flex items-center w-full">
                  <a target="_blank" href="{{ $meet->link }}"
                    class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                    <iconify-icon icon="fluent:video-24-regular"
                      class="text-3xl text-white group-hover:text-black"></iconify-icon>
                  </a>
                  @php
                    $host = '';
                    $parsedUrl = parse_url($meet->link);
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

              @role(['admin'])
                {{-- Icon action start --}}
                <div class="inline md:flex md:justify-between">

                  <div class="flex gap-2 text-gray-400 md:gap-4">
                    <button type="button" wire:click="delete('{{ $meet->slug }}')"
                      class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
                      <iconify-icon icon="tabler:trash"></iconify-icon><span class="hidden md:block">Hapus</span>
                    </button>
                    <a href="{{ route('app.e-learning.meeting.edit', ['id' => $meet->slug]) }}"
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
    @endforeach
  </section>
  {{-- View All Meeting Section End --}}



</div>
