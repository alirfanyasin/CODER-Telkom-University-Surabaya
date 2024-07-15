<div>

  @php
    $datas = [
        [
            'name' => 'Irfan Yasin',
            'email' => 'irfanyasin@gmail.com',
        ],
        [
            'name' => 'Muhammad Dandy Ainul Yaqin',
            'email' => 'dandyainulyaqin@gmail.com',
        ],
        [
            'name' => 'Fakhri Alauddin',
            'email' => 'fakhri@gmail.com',
        ],
        [
            'name' => 'Raihan Siyun',
            'email' => 'raihansiyun@gmail.com',
        ],
        [
            'name' => 'Raihan Siyun',
            'email' => 'raihansiyun@gmail.com',
        ],
        [
            'name' => 'Raihan Siyun',
            'email' => 'raihansiyun@gmail.com',
        ],
    ];
  @endphp


  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Anggota</h2>
  </header>
  {{-- Header End --}}



  {{-- Member Section Start --}}
  <section>
    <div class="grid grid-cols-4 gap-2">
      @foreach ($datas as $data)
        <div
          class="relative px-5 pt-5 pb-20 text-center text-white rounded-lg bg-glass group hover:border hover:border-gray-500">
          <div class="w-20 h-20 mx-auto overflow-hidden rounded-full">
            <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar" class="object-cover w-full h-full">
          </div>
          <h4 class="mt-4 font-semibold text-md">{{ $data['name'] }}</h4>
          <p class="text-xs font-light text-gray-400">{{ $data['email'] }}</p>
          <div class="absolute mx-auto translate-x-1/2 bottom-5">
            <a href=""
              class="inline-block py-2 text-xs border rounded-full px-9 group-hover:bg-white group-hover:text-black">
              Profile
            </a>
            {{-- <a href="" class="flex items-center justify-center bg-white border rounded-full w-9 h-9">
              <iconify-icon icon="mage:whatsapp" class="text-xl text-black"></iconify-icon>
            </a> --}}
          </div>
        </div>
      @endforeach

    </div>
  </section>
  {{-- Member Section End --}}
</div>
