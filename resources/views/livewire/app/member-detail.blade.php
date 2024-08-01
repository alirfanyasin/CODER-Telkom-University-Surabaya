<div>

    {{-- Header Start --}}
    <header class="flex items-center justify-between mb-6 mt-7">
        <h2 class="text-2xl font-bold text-white md:text-3xl">Profil</h2>
    </header>
    {{-- Header End --}}

    {{-- Member Detail Start --}}
    <section class="flex flex-col gap-6 mb-6 md:flex-row">
        <div class="p-6 text-center rounded-lg md:w-4/12 bg-glasses">
            <div class="w-20 h-20 mx-auto mb-3 overflow-hidden rounded-full">
                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar" class="object-cover w-full h-full">
            </div>
            <h2 class="mb-1 text-lg font-semibold text-white">Irfan Yasin</h2>
            <p class="text-[#4F4F55] mb-3 text-sm">1201222222</p>
            <hr class="flex-grow mb-3 border-white">
            <h2 class="mb-1 text-white">Divisi</h2>
            <p class="text-[#4F4F55] mb-3 text-sm">Web Development</p>
            <h2 class="mb-1 text-white">Tahun Angkatan</h2>
            <p class="text-[#4F4F55] mb-3 text-sm">2022</p>
            <h2 class="mb-1 text-white">Program Studi</h2>
            <p class="text-[#4F4F55] mb-3 text-sm">Informatika</p>

        </div>
        <div class="flex flex-col w-full gap-6">
            <div class="flex w-full h-auto gap-2 md:gap-6">
                <div
                    class="flex flex-col items-center w-4/12 p-6 text-center shadow-sm bg-glasses md:items-start md:text-start rounded-xl">
                    <div class="bg-[#27292C] p-2 flex items-center justify-center rounded-full w-fit mb-6">
                        <iconify-icon icon="ph:user-check" class="text-gray-400 hover:text-red-600"
                            height="30"></iconify-icon>
                    </div>
                    <h2 class="mb-6 text-xl font-semibold text-white">Presensi</h2>
                    <h1 class="text-3xl font-bold text-white">100%</h1>
                </div>
                <div
                    class="flex flex-col items-center w-4/12 p-6 text-center shadow-sm bg-glasses md:items-start md:text-start rounded-xl">
                    <div class="bg-[#27292C] p-2 flex items-center justify-center rounded-full w-fit mb-6">
                        <iconify-icon icon="ph:coin-light" class="text-gray-400 hover:text-yellow-600"
                            height="30"></iconify-icon>
                    </div>
                    <h2 class="mb-6 text-xl font-semibold text-white">Poin</h2>
                    <h1 class="text-3xl font-bold text-white">120</h1>
                </div>
                <div
                    class="flex flex-col items-center w-4/12 p-6 text-center shadow-sm bg-glasses md:items-start md:text-start rounded-xl">
                    <div class="bg-[#27292C] p-2 flex items-center justify-center rounded-full w-fit mb-6">
                        <iconify-icon icon="mdi:work-outline" class="text-gray-400 hover:text-lime-600"
                            height="30"></iconify-icon>
                    </div>
                    <h2 class="mb-6 text-xl font-semibold text-white">Project</h2>
                    <h1 class="text-3xl font-bold text-white">08</h1>
                </div>
            </div>
            <div class="flex flex-col w-full h-auto gap-6 md:flex-row">
                <div
                    class="flex flex-col items-center justify-center w-full p-6 text-center shadow-sm bg-glasses md:w-4/12 rounded-xl">
                    <div class="bg-[#27292C] p-3 flex text-center justify-center rounded-full w-fit mb-6">
                        <iconify-icon icon="ic:round-whatsapp" class="text-gray-400 hover:text-green-600"
                            height="70"></iconify-icon>
                    </div>
                    <h2 class="text-xl font-semibold text-white">Whatsapp</h2>
                    <h1 class="text-[#4F4F55] font-bold text-sm">0812345678</h1>
                </div>
                <div
                    class="flex flex-col items-center justify-center w-full p-6 text-center shadow-sm bg-glasses md:w-4/12 rounded-xl">
                    <div class="bg-[#27292C] p-3 flex text-center justify-center rounded-full w-fit mb-6">
                        <iconify-icon icon="lucide:mail" class="text-gray-400 hover:text-teal-600"
                            height="70"></iconify-icon>
                    </div>
                    <h2 class="text-xl font-semibold text-white">Email</h2>
                    <h1 class="text-[#4F4F55] font-bold text-sm">0812345678</h1>
                </div>
                <div
                    class="flex flex-col items-center justify-center w-full p-6 text-center shadow-sm bg-glasses md:w-4/12 rounded-xl">
                    <div class="bg-[#27292C] p-3 flex text-center justify-center rounded-full w-fit mb-6">
                        <iconify-icon icon="mdi:github" class="text-gray-400 hover:text-violet-600"
                            height="70"></iconify-icon>
                    </div>
                    <h2 class="text-xl font-semibold text-white">Github</h2>
                    <h1 class="text-[#4F4F55] font-bold text-sm">0812345678</h1>
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
