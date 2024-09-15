<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Galeri</h2>

    @role(['admin|super-admin'])
      <div class="hidden md:block">
        <a href="{{route('app.content.gallery.create')}}" wire:navigate
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
    <div class="flex flex-wrap gap-4">
        @foreach ($galleries as $item)
            <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105" onclick="openModal('{{asset('/storage/gallery/'. $item->img)}}', '{{$item->caption}}', '{{$item->caption}}', '{{$item->id}}', true)">
                <img src="{{ asset('/storage/gallery/'. $item->img) }}" alt="{{$item->caption}}" class="object-cover w-full h-full">
            </div>
        @endforeach
      </div>

    @include('livewire.components.utilities.gallery-modal')
  </section>
</div>
