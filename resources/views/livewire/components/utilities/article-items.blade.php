<div class="{{ $wrapperClass ?? 'py-12' }} flex flex-col items-center justify-between lg:flex-row">
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
    <img src="{{ asset('/assets/images/blog-dummy.png') }}" alt="Article Image"
      class="object-cover w-full h-48 rounded-lg lg:h-64">
  </div>
</div>
