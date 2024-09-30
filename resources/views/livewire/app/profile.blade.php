<div>

  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Profil Saya</h2>

    <div class="flex gap-2">
      @role(['user|admin'])
        <div class="hidden md:block">
          <a href="#" wire:click.prevent='downloadActivityLetter' wire:loading.remove
            class="flex items-center px-5 py-3 text-sm font-semibold text-white border rounded-md"><iconify-icon
              icon="ph:download-bold" class="text-xl"></iconify-icon> &nbsp; Seritifikat </a>
        </div>

        <div wire:loading wire:target="downloadActivityLetter"
          class="flex items-center justify-center px-12 py-3 text-sm font-semibold border rounded-md">
          <div
            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
          </div>
        </div>

        <div class="block md:hidden">
          <a href="#" wire:click.prevent='downloadActivityLetter'
            class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
              icon="ph:download-bold" class="text-xl"></iconify-icon></a>
        </div>
      @endrole

      <div class="hidden md:block">
        <a href="{{ route('app.profile.edit') }}" wire:navigate
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Perbarui Profil
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.profile.edit') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md"><iconify-icon
            icon="lucide:edit" class="text-2xl"></iconify-icon></a>
      </div>
    </div>
  </header>
  {{-- Header End --}}

  {{-- Profile Start --}}
  <section class="flex flex-col gap-4 mb-6 md:flex-row">
    <div class="p-6 text-center rounded-lg md:w-4/12 bg-glass h-fit">
      <div class="w-40 h-40 mx-auto mb-3 overflow-hidden rounded-full">
        @if (Auth::check() && str_starts_with(Auth::user()->avatar, 'https://lh3.googleusercontent.com/'))
          <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
        @else
          <img
            src="{{ Auth::user()->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . Auth::user()->avatar) }}"
            alt="Avatar" class="object-cover w-full h-full rounded-full">
        @endif
      </div>
      <h2 class="mb-3 text-xl font-semibold text-white break-words">{{ Auth::user()->name }}</h2>
      <p class="mb-3 text-xs font-light text-white">-
        {{ Auth::user()->division_id != null ? Auth::user()->division->name : 'Belum Ada Divisi' }} -</p>
      <p class="mb-3 text-xs font-light text-white">{{ Auth::user()->identity_code }}</p>
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
                <td class="py-2 text-sm font-light text-white break-words whitespace-nowrap">
                  {{ $data->nim ?? 'Belum ada' }}</td>
                <td class="py-2 text-sm font-light text-white break-words whitespace-nowrap">
                  {{ $data->major ?? 'Belum ada' }}</td>
                <td class="py-2 text-sm font-light text-white break-words whitespace-nowrap">
                  {{ $data->batch ?? 'Belum ada' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  {{-- Profile End --}}

</div>
