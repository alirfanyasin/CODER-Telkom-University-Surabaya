<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Galeri</h2>

    @role(['admin|super-admin'])
      <div class="hidden md:block">
        <a href="#" wire:navigate 
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Tambah Gambar
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
    @include('livewire.components.utilities.gallery-modal')
  </section>
</div>
  