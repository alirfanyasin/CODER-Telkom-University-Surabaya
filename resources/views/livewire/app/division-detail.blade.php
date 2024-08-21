<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Detail Divisi</h2>

    @role(['super-admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.division.edit', ['slug' => $division->slug]) }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-[#9E9E9E] bg-transparent rounded-md border border-[#9E9E9E] group hover:bg-white hover:text-black transition-colors">Edit
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2 group-hover:text-black:"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.division.edit', ['slug' => $division->slug]) }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
            icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}

  {{-- section content --}}
  <section class="mb-10">
    <div class="items-center block gap-4 md:flex">
      <div class="w-full mb-5 lg:w-1/3 md:mb-0">
        <div class="text-white border-transparent bg-glass rounded-xl p-7">
          <div class="flex items-center justify-center w-40 h-40 mx-auto rounded-lg bg-lightGray">
            @php
                $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'];
                $fileExtension = strtolower(pathinfo($division->logo, PATHINFO_EXTENSION));
            @endphp
            @if(in_array($fileExtension, $validImageExtensions))
                <img class="h-full object-cover" src="{{ asset('/storage/file/division/' . $division->logo) }}" alt="Image">
            @else
                <iconify-icon icon="{{ $division->logo }}" class="text-4xl text-white"></iconify-icon>
            @endif
          </div>
        </div>
      </div>
      <div class="w-full mb-5 lg:w-2/3 md:mb-0">
        <div class="text-white border-transparent bg-glass rounded-xl p-7">
          <div class="division-title mb-7">
            <h2 class="mb-3 text-xl font-semibold text-white">Nama Divisi</h2>
            <p class="text-[#9E9E9E]">{{ $division->name }}</p>
          </div>
          <div class="division-desc">
            <h2 class="mb-3 text-xl font-semibold text-white">Deskripsi</h2>
            <p class="text-[#9E9E9E]">{{ $division->description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="mb-10">
    <div class="flex flex-col bg-glass rounded-xl p-7">
      <div class="flex items-center gap-4 mb-5">
        <h2 class="text-3xl font-bold text-white">Daftar Anggota</h2>
        <div class="px-4 py-2 border rounded-lg border-neutral-700">
          <p class="text-[#9E9E9E] font-semibold">{{$division->user->count()}} Anggota</p>
        </div>
      </div>
      <div class="grid items-center gap-4 md:grid-cols-3">
        @foreach ($division->user as $user)
          <div class="flex flex-col p-4 text-white border-transparent rounded-lg bg-lightGray">
            <div class="flex items-center">
              <img class="inline-block size-[46px] rounded-full" src="{{ asset('assets/images/avatar.png') }}" alt="Avatar">
              <div class="ml-5">
                <h2 class="text-xl font-bold text-white">{{$user->name}}</h2>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
</div>
