<div>
  <section class="py-24 lg:py-36">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="border-b-2 border-[#454545] w-32 pb-8">
        <h1 class="text-white text-3xl lg:text-5xl font-bold">Artikel</h1>
      </div>

      {{-- Artikel List --}}
      @for ($i = 0; $i < 3; $i++)
        <div class="flex flex-col lg:flex-row items-center justify-between py-12">
          <div class="w-full lg:w-2/3 lg:pr-8 order-last lg:order-first mt-5 lg:mt-0">
            <a href="#">
              <h2 class="text-white text-2xl lg:text-3xl font-bold hover:underline cursor-pointer">7 Software Paling
                Rekomenasi untuk Web Developer</h2>
            </a>
            <p class="text-[#9E9E9E] text-base mt-4 font-medium mb-7">
              Lorem ipsum dolor sit amet consectetur. A quam senectus sit in felis rutrum urna pellentesque quam. Quis
              tellus interdum a vestibulum. Rhoncus consectetur diam commodo eu non cursus. Consectetur quis dignissim
              molestie at.
            </p>
            <div class="block lg:flex items-center gap-4 text-[#9E9E9E] space-y-3 lg:space-y-0">
              <div class="flex items-center">
                <iconify-icon icon="basil:user-outline" class="text-2xl"></iconify-icon>
                <span class="font-medium ml-3.5">Deo Farady Santoso</span>
              </div>
              <iconify-icon icon="mdi:dot" class="text-2xl hidden lg:block"></iconify-icon>
              <div class="flex items-center">
                <iconify-icon icon="ri:calendar-line" class="text-2xl"></iconify-icon>
                <span class="font-medium ml-3.5">17 November 2022</span>
              </div>
            </div>

          </div>
          <div class="w-full lg:w-1/3">
            <img src="{{ asset('assets/images/blog-dummy.png') }}" alt="Article Image"
              class="w-full h-48 lg:h-64 object-cover rounded-lg">
          </div>
        </div>
      @endfor

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
          <a href="#" class="text-white text-lg pb-2 px-3">...</a>
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
