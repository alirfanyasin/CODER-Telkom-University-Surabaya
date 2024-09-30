<div>

  {{-- Header Start --}}
  <header class="flex items-center justify-between mb-6 mt-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Profil</h2>
  </header>
  {{-- Header End --}}

  {{-- Member Detail Start --}}
  <section class="flex flex-col gap-4 mb-6 md:flex-row">
    <div class="p-6 text-center rounded-lg md:w-4/12 bg-glass h-fit">
      <div class="w-40 h-40 mx-auto mb-3 overflow-hidden rounded-full">
        @if (str_starts_with($data->avatar, 'https://lh3.googleusercontent.com/'))
          <img src="{{ $data->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
        @else
          <img
            src="{{ $data->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $data->avatar) }}"
            alt="Avatar" class="object-cover w-full h-full rounded-full">
        @endif
      </div>
      <h2 class="mb-3 text-xl font-semibold text-white">{{ $data->name }}</h2>
      <p class="mb-3 text-xs font-light text-white">-
        {{ $data->division_id != null ? $data->division->name : 'Belum Ada Divisi' }} -</p>

      <div class="flex items-center justify-center gap-6">
        <a href="">
          <iconify-icon icon="ic:round-whatsapp" class="text-gray-400 hover:text-green-600"
            height="25"></iconify-icon>
        </a>
        <a href="">
          <iconify-icon icon="mdi:github" class="text-gray-400 hover:text-white" height="25"></iconify-icon>
        </a>
        <a href="">
          <iconify-icon icon="lucide:mail" class="text-gray-400 hover:text-red-600" height="25"></iconify-icon>
        </a>
      </div>
    </div>
    <div class="flex flex-col w-full gap-4">
      <div class="flex w-full h-auto gap-2 md:gap-4">
        <div
          class="flex flex-col items-center w-4/12 p-6 text-center shadow-sm bg-glass md:items-start md:text-start rounded-xl">
          <div class="bg-[#27292C] p-2 flex items-center justify-center rounded-full w-fit mb-6">
            <iconify-icon icon="ph:user-check" class="text-gray-400 hover:text-red-600" height="30"></iconify-icon>
          </div>
          <h2 class="mb-6 text-xl font-semibold text-white">Presensi</h2>
          <h1 class="text-3xl font-bold text-white">{{ $presence }}%</h1>
        </div>
        <div
          class="flex flex-col items-center w-4/12 p-6 text-center shadow-sm bg-glass md:items-start md:text-start rounded-xl">
          <div class="bg-[#27292C] p-2 flex items-center justify-center rounded-full w-fit mb-6">
            <iconify-icon icon="ph:coin-light" class="text-gray-400 hover:text-yellow-600"
              height="30"></iconify-icon>
          </div>
          <h2 class="mb-6 text-xl font-semibold text-white">Poin</h2>
          <h1 class="text-3xl font-bold text-white">{{ $point }}</h1>
        </div>
        <div
          class="flex flex-col items-center w-4/12 p-6 text-center shadow-sm bg-glass md:items-start md:text-start rounded-xl">
          <div class="bg-[#27292C] p-2 flex items-center justify-center rounded-full w-fit mb-6">
            <iconify-icon icon="mdi:work-outline" class="text-gray-400 hover:text-lime-600"
              height="30"></iconify-icon>
          </div>
          <h2 class="mb-6 text-xl font-semibold text-white">Project</h2>
          <h1 class="text-3xl font-bold text-white">0</h1>
        </div>
      </div>
      <div class="flex flex-col w-full p-6 bg-glass rounded-xl">
        <div class="flex items-center gap-4 mb-6">
          <h1 class="text-gray-400 ">Informasi Terkait</h1>
          <hr class="flex-grow border-[#4F4F55] mb-3">
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead>
              <tr>
                <th scope="col" class="py-2 text-sm font-semibold text-white text-start">NIM</th>
                <th scope="col" class="py-2 text-sm font-semibold text-white text-start">Program
                  Studi</th>
                <th scope="col" class="py-2 text-sm font-semibold text-white text-start">Tahun
                  Angkatan</th>
              </tr>
            </thead>
            <tbody class="">
              <tr>
                <td class="py-2 text-sm font-light text-white whitespace-nowrap">{{ $data->nim ?? 'Belum ada' }}</td>
                <td class="py-2 text-sm font-light text-white whitespace-nowrap">{{ $data->major ?? 'Belum ada' }}</td>
                <td class="py-2 text-sm font-light text-white whitespace-nowrap">{{ $data->batch ?? 'Belum ada' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  {{-- Member Detail End --}}

  <div class="flex justify-end mb-6">
    <a href="{{ route('app.member') }}" wire:navigate
      class="flex items-center px-5 py-3 font-semibold text-black bg-white rounded-md ms-3">Kembali
      <iconify-icon icon="system-uicons:jump-backward" class="text-2xl ms-2"></iconify-icon>
    </a>
  </div>

</div>
