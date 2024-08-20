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
    <div class="block md:flex items-center gap-4">
      <div class="w-full lg:w-1/3 mb-5 md:mb-0">
        <div class="bg-glasses text-white border-transparent rounded-xl p-7">
          <div class="flex items-center justify-center bg-lightGray w-40 h-40 rounded-lg mx-auto">
            <iconify-icon icon="tdesign:camera" class="text-4xl text-white"></iconify-icon>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-2/3 mb-5 md:mb-0">
        <div class="bg-glasses text-white border-transparent rounded-xl p-7">
          <div class="division-title mb-7">
            <h2 class="text-white font-semibold text-xl mb-3">Nama Divisi</h2>
            <p class="text-[#9E9E9E]">{{ $division->name }}</p>
          </div>
          <div class="division-desc">
            <h2 class="text-white font-semibold text-xl mb-3">Deskripsi</h2>
            <p class="text-[#9E9E9E]">{{ $division->description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="mb-10">
    <div class="flex flex-col bg-glasses rounded-xl p-7">
      <div class="flex items-center gap-4 mb-5">
        <h2 class="text-white font-bold text-3xl">Daftar Anggota</h2>
        <div class="px-4 py-2 border border-neutral-700 rounded-lg">
          <p class="text-[#9E9E9E] font-semibold">11 Anggota</p>
        </div>
      </div>
      <div class="grid md:grid-cols-3 items-center gap-4">
        @for ($i = 0; $i < 9; $i++)
          <div class="flex flex-col bg-lightGray text-white border-transparent rounded-lg p-4">
            <div class="flex items-center">
              <img class="inline-block size-[46px] rounded-full"
                src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                alt="Avatar">
								<div class="ml-5">
									<h2 class="font-bold text-xl text-white">Deo Farady Santoso</h2>
								</div>
            </div>
          </div>
        @endfor
      </div>
    </div>
  </section>
</div>
