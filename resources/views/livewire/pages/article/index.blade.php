<div>
  <section class="relative pt-24 pb-20 lg:pt-36">

    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
      <div class="w-10/12 mx-auto">
        <div class="border-b-2 border-[#454545] w-32 pb-8">
          <h1 class="text-3xl font-bold text-white lg:text-5xl">Artikel</h1>
        </div>

        {{-- Artikel List --}}
        <div class="">
          @for ($i = 0; $i < 3; $i++)
            @include('livewire.components.utilities.article-items')
          @endfor
          <img src="{{ asset('assets/images/shape/ellipse-2.png') }}" alt=""
            class="absolute top-0 left-0 w-1/2 -z-50">
        </div>
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


    </div>
  </section>
</div>
