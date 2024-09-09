<div class="py-36">
  {{-- Main content --}}
  <div class="container">
    <div class="w-10/12 mx-auto">
      <header class="flex items-center justify-center mb-10 text-center md:mb-20">
        <div class="border border-gray-700 w-36"></div>
        <h2 class="mx-5 text-3xl font-bold text-white md:text-5xl">Galeri</h2>
        <div class="border border-gray-700 w-36"></div>
      </header>
      <div class="flex flex-wrap gap-4">
        @foreach ($galleries as $item)
            <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105" onclick="openModal('{{asset('/storage/gallery/'. $item->img)}}', '{{$item->caption}}', '{{$item->caption}}', '{{$item->id}}', false)">
                <img src="{{ asset('/storage/gallery/'. $item->img) }}" alt="{{$item->caption}}" class="object-cover w-full h-full">
            </div>
        @endforeach
      </div>
      @include('livewire.components.utilities.gallery-modal')
    </div>
  </div>
</div>
