<div>
  {{-- Hero Section Start --}}
  <section class="relative flex items-center justify-center h-screen md:pt-32 sm:pt-20">
    <div>
      <div class="relative z-10">
        <h1 class="mb-10 text-4xl font-bold leading-tight text-center text-white lg:text-7xl md:text-6xl">Creativity On
          Digital
          Environment <br>
          in
          Room of
          Tecnology</h1>

        <p class="text-sm font-light text-center text-white md:text-lg">CODER: Komunitas Kreatif dan Inovatif di Telkom
          University
          Surabaya yang
          Fokus pada <br> Pengembangan Aplikasi dan Solusi Perangkat Lunak yang Inovatif.</p>

        <div class="mt-10 text-center">
          <a href="#event" class="inline-block px-6 py-3 bg-white rounded-full stext-black">Jelajahi Sekarang
            <span>
              <iconify-icon icon="fluent:arrow-up-20-filled" class="rotate-45"></iconify-icon>
            </span>
          </a>
        </div>
      </div>

      {{-- Object --}}
      <img src="assets/images/shape/ellipse-2.png" alt="" class="absolute top-0 left-0 w-1/2">
      <img src="assets/images/shape/ellipse-1.png" alt="" class="absolute top-0 right-0 w-1/2">
      <img src="assets/images/shape/object-1.png" alt="" class="absolute top-10 md:right-20 -right-32">
      <img src="assets/images/shape/object-2.png" alt="" class="absolute hidden bottom-20 left-52 lg:block">
      <img src="assets/images/shape/object-3.png" alt="" class="absolute bottom-0 right-72">
    </div>
  </section>
  {{-- Hero Section End --}}



  {{-- Event Section Start --}}
  <section class="my-32" id="event">
    <div class="container">
      <div class="w-10/12 mx-auto">
        <div class="flex flex-wrap items-center justify-between">
          <div class="lg:basis-3/12 basis-6/12">
            <img src="assets/images/logo/playbox.png" alt="Logo PlayBox" class="w-40 mx-auto md:w-56">
          </div>
          <div class="lg:basis-3/12 basis-6/12">
            <img src="assets/images/logo/waow.png" alt="Logo Waow" class="w-40 mx-auto md:w-56">
          </div>
          <div class="lg:basis-3/12 basis-6/12">
            <img src="assets/images/logo/wezaa.png" alt="Logo Weza" class="w-40 mx-auto md:w-56">
          </div>
          <div class="lg:basis-3/12 basis-6/12">
            <img src="assets/images/logo/dojo.png" alt="Logo DoJo" class="w-40 mx-auto md:w-56">
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Event Section End --}}


  {{-- About Us Section Start --}}
  <section class="relative my-36" id="about-us">
    <div class="container">
      <div class="w-10/12 mx-auto lg:border-l-4 lg:border-white">
        <div class="flex flex-wrap items-center">
          <div class="lg:basis-4/12 basis-full">
            <div class="flex justify-center">
              <h2 class="hidden text-5xl font-bold leading-tight text-white lg:block">Tentang <br> Kami</h2>
              <h2 class="block mb-10 text-3xl font-bold text-white lg:hidden">Tentang Kami</h2>
            </div>
          </div>
          <div class="lg:basis-8/12 basis-full">
            <div class="w-full p-10 mb-5 bg-glass rounded-xl">
              <h3 class="mb-5 text-2xl font-bold text-white">Visi</h3>
              <p class="text-gray-400">Mewadahi bakat dan minat mahasiswa di bidang Teknologi, Informasi, dan
                Komunikasi
                untuk berkontribusi
                terhadap Telkom University Surabaya dan lingkungan sekitar.</p>
            </div>
            <div class="w-full p-10 mb-5 bg-glass rounded-xl">
              <h3 class="mb-5 text-2xl font-bold text-white">Misi</h3>
              <ol type="1" class="text-gray-400 list-decimal ms-3">
                <li>Membantu dan mendukung untuk mewadahi mahasiswa Telkom University Surabaya yang memiliki bakat dan
                  minat dalam bidang Teknologi Informasi dan Komunikasi.</li>
                <li>Membantu dan mendukung Telkom University Surabaya untuk melakukan pengembangan Teknologi Informasi
                  dan Komunikasi.</li>
                <li>Berkontribusi untuk lingkungan sekitar melalui Teknologi Informasi dan Komunikasi yang bermanfaat.
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>

    <img src="assets/images/shape/ellipse-3.png" alt="" class="absolute w-1/2 -top-20 left-36">
    <img src="assets/images/shape/object-4.png" alt="" class="absolute right-0 -top-20 -z-10">
  </section>
  {{-- About Us Section End --}}



  {{-- Division Section Start --}}
  <section class="mt-20 mb-32 md:mb-56 lg:mt-80" id="division">
    <div class="container">
      <div class="w-10/12 mx-auto">
        <header class="flex items-center justify-center mb-20 text-center">
          <div class="border border-gray-700 w-36"></div>
          <h2 class="mx-5 text-3xl font-bold text-white md:text-5xl">Divisi</h2>
          <div class="border border-gray-700 w-36"></div>
        </header>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
          @foreach ($allDivision as $division)
            <livewire:components.division-card name="{{ $division->name }}" logo="{{ $division->logo }}"
              description="{{ $division->description }}" />
          @endforeach
        </div>
      </div>
    </div>
  </section>
  {{-- Division Section End --}}


  {{-- Developer Team Start --}}
  {{-- <section>
    <div class="container">
      <div class="w-10/12 mx-auto">
        <header class="flex items-center justify-center mb-10 text-center md:mb-20">
          <div class="border border-gray-700 w-36"></div>
          <h2 class="mx-5 text-3xl font-bold text-white md:text-5xl">Tim Developer</h2>
          <div class="border border-gray-700 w-36"></div>
        </header>

        <div class="w-full developer-slider">
          @foreach ($dataDeveloperTeam as $data)
            <livewire:components.developer-team-card name="{{ $data['name'] }}" image="{{ $data['image'] }}"
              role="{{ $data['role'] }}" whatsapp="{{ $data['whatsapp'] }}" github="{{ $data['github'] }}"
              linkedin="{{ $data['linkedin'] }}" />
          @endforeach

        </div>
      </div>
    </div>
  </section> --}}
  {{-- Developer Team End --}}


  {{-- Article Section Start --}}
  <section class="my-32 md:my-52">
    <div class="container">
      <div class="w-10/12 mx-auto">
        <header class="flex items-center justify-between mb-10 md:mb-20">
          <h2 class="mx-5 text-3xl font-bold text-white md:text-5xl">Artikel</h2>
          <a href="/article" wire:navigate class="text-gray-400">Lihat Semua <iconify-icon
              icon="ph:arrow-right"></iconify-icon>
          </a>
        </header>

        <div class="w-full">
          <div class="">
            @for ($i = 0; $i < 3; $i++)
              @include('livewire.components.utilities.article-items')
            @endfor
            <img src="{{ asset('assets/images/shape/ellipse-2.png') }}" alt=""
              class="absolute top-0 left-0 w-1/2 -z-50">
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Article Section End --}}

</div>

@push('js-custom')
  <script>
    $(document).ready(function() {
      $('.developer-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 3000,
        infinite: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 500,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });


      $('.article-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 3000,
        infinite: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 700,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    })
  </script>
@endpush
