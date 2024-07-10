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
            <div class="flex flex-col items-center justify-between py-12 lg:flex-row">
              <div class="order-last w-full mt-5 lg:w-2/3 lg:pr-8 lg:order-first lg:mt-0">
                <a href="{{ url('article/detail') }}"
                  class="text-2xl font-bold text-white cursor-pointer hover:underline lg:text-3xl">
                  <h2 class="">7 Software Paling
                    Rekomenasi untuk Web Developers</h2>
                </a>
                <p class="text-[#9E9E9E] text-base mt-4 font-medium mb-7">
                  Lorem ipsum dolor sit amet consectetur. A quam senectus sit in felis rutrum urna pellentesque quam.
                  Quis
                  tellus interdum a vestibulum. Rhoncus consectetur diam commodo eu non cursus. Consectetur quis
                  dignissim
                  molestie at.
                </p>
                <div class="block lg:flex items-center gap-4 text-[#9E9E9E] space-y-3 lg:space-y-0">
                  <div class="flex items-center">
                    <iconify-icon icon="basil:user-outline" class="text-2xl"></iconify-icon>
                    <span class="font-medium ml-3.5">Deo Farady Santoso</span>
                  </div>
                  <iconify-icon icon="mdi:dot" class="hidden text-2xl lg:block"></iconify-icon>
                  <div class="flex items-center">
                    <iconify-icon icon="ri:calendar-line" class="text-2xl"></iconify-icon>
                    <span class="font-medium ml-3.5">17 November 2022</span>
                  </div>
                </div>

              </div>
              <div class="w-full lg:w-1/3">
                <img src="{{ asset('assets/images/blog-dummy.png') }}" alt="Article Image"
                  class="object-cover w-full h-48 rounded-lg lg:h-64">
              </div>
            </div>
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
