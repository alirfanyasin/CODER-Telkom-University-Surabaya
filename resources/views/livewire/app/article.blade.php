<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Artikel</h2>

    @role(['admin|super-admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.content.article.create') }}" wire:navigate 
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Artikel
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
        </a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.content.article.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full">
            <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
        </a>
      </div>
    @endrole
  </header>

  <section>
    <div class="space-y-10">
      @for ($i = 0; $i < 3; $i++)
        @include('livewire.components.utilities.article-items', [
          'wrapperClass' => 'p-5 bg-[#18181B] raounded-lg space-x-1'
        ])
      @endfor
    </div>

    {{-- pagination center --}}
    <div class="flex justify-center mt-12">
      <nav class="flex items-center gap-6" aria-label="Pagination">
        {{-- <a href="#" class="text-white hover:text-[#9E9E9E]">
          <iconify-icon icon="bi:chevron-left" class="text-2xl"></iconify-icon>
        </a> --}}
        <a href="#" class="text-white hover:text-[#9E9E9E] text-lg border-b-2 border-white pb-2 px-3">1</a>
        <a href="#"
          class="text-white hover:text-[#9E9E9E] text-lg pb-2 px-3 hover:border-b-2 hover:border-white">2</a>
        <a href="#"
          class="text-white hover:text-[#9E9E9E] text-lg pb-2 px-3 hover:border-b-2 hover:border-white">3</a>
        <a href="#" class="px-3 pb-2 text-lg text-white">...</a>
        <a href="#"
          class="text-white hover:text-[#9E9E9E] text-lg pb-2 px-3 hover:border-b-2 hover:border-white">5</a>
        {{-- <a href="#" class="text-white
          hover:text-[#9E9E9E]">
          <iconify-icon icon="bi:chevron-right" class="text-2xl"></iconify-icon>
        </a> --}}
      </nav>
    </div>
  </section>
</div>
