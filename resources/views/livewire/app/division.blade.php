<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Dvisi</h2>

    @role(['super-admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.division.create') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
          Divisi Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.division.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
            icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}

  {{-- View Division List --}}
  <section class="mb-10">
    <div class="grid items-center gap-4 md:grid-cols-2">
      @foreach ($divisions as $item)
        <a href="{{ route('app.division.detail', ['slug' => $item->slug]) }}"
          class="flex flex-col text-white border-transparent shadow-sm bg-glass rounded-xl p-7">

          <div class="flex items-center justify-center mb-10 rounded-lg bg-lightGray w-14 h-14">
            @php
                $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'];
                $fileExtension = strtolower(pathinfo($item->logo, PATHINFO_EXTENSION));
            @endphp
            @if(in_array($fileExtension, $validImageExtensions))
                <img src="{{ asset('/storage/file/division/' . $item->logo) }}" alt="Image">
            @else
                <iconify-icon icon="{{ $item->logo }}" class="text-4xl text-white"></iconify-icon>
            @endif

          </div>

          <h2 class="mb-2 text-2xl font-bold md:text-4xl">{{ $item->name }}</h2>
          <p class="font-medium text-[#9E9E9E]">{{ $item->description }}</p>
        </a>
      @endforeach
    </div>
  </section>
  {{-- View Division List End --}}
</div>
