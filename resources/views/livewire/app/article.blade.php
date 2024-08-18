<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Artikel</h2>

    @role(['admin|super-admin'])
      <div class="hidden md:block">
        <a href="#" wire:navigate 
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Artikel
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
        </a>
      </div>

      <div class="block md:hidden">
        <a href="#" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full">
            <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
        </a>
      </div>
    @endrole
  </header>

  <section>
    @for ($i = 0; $i < 3; $i++)
      @include('livewire.components.utilities.article-items')
    @endfor
    <img src="{{ asset('assets/images/shape/ellipse-2.png') }}" alt="" class="absolute top-0 left-0 w-1/2 -z-50">
  </section>
</div>
