<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Dvisi</h2>

    @role(['super-admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
          Divisi Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
            icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
      </div>
    @endrole
  </header>
  {{-- Header End --}}

  {{-- View Division List --}}
  <section class="mb-10">
    <div class="grid md:grid-cols-2 items-center gap-4">
      @foreach ($divisions as $item)
        <a href="{{ route('app.division.detail', ['slug' => $item->slug]) }}" class="flex flex-col bg-darkGray text-white border-transparent shadow-sm rounded-xl p-7">

          <div class="flex items-center justify-center bg-glasses w-14 h-14 rounded-lg mb-10">
            <iconify-icon icon="{{ $item->logo }}" class="text-4xl text-white"></iconify-icon>
          </div>

          <h2 class="font-bold text-2xl md:text-4xl mb-2">{{ $item->name }}</h2>
          <p class="font-medium text-[#9E9E9E]">{{ $item->description }}</p>
        </a>
      @endforeach
    </div>
  </section>
  {{-- View Division List End --}}
</div>
