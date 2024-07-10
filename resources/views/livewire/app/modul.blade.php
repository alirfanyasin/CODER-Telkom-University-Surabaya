<div>
    {{-- Header Start --}}
    <header class="flex items-center justify-between my-7">
        <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Modul</h2>

        <div class="hidden md:block">
            <a href="{{ route('app.e-learning.modul.create') }}" wire:navigate
                class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat
                Modul Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></a>
        </div>

        <div class="block md:hidden">
            <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
                class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
                    icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
        </div>
    </header>
    {{-- Header End --}}

    {{-- View All Modul Start --}}
    <div class="">
        <div class="mb-6">
            <div class="flex items-center text-white gap-4 mb-2">
                <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
                <span class="flex-shrink-0">Pertemuan 1</span>
                <hr class="flex-grow border-[#27272A]">
            </div>
            <div class="bg-glass w-full p-6 rounded-xl">
                <h1 class="font-semibold text-white text-xl mb-1"><a href="">Fundamental HTML dan CSS Dasar</a>
                </h1>
                <div class="inline md:flex md:justify-between items-center">
                    <span class="text-[#9E9E9E] text-base font-medium">Mengenal Fundamental HTML dan CSS Dasar untuk
                        Pemula</span>
                    <div class="flex gap-6 mt-4 md:mt-0 text-[#9E9E9E]">
                        <button type="button"
                            class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-4 py-1">
                            <iconify-icon icon="mdi:trash"></iconify-icon><span>Hapus</span>
                        </button>
                        <button type="button"
                            class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-4 py-1">
                            <iconify-icon icon="lucide:edit"></iconify-icon><span>Edit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <div class="flex items-center text-white gap-4 mb-2">
                <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
                <span class="flex-shrink-0">Pertemuan 2</span>
                <hr class="flex-grow border-[#27272A]">
            </div>
            <div class="bg-glass w-full p-6 rounded-xl">
                <h1 class="font-semibold text-white text-xl mb-1"><a href="">Belajar Framework Tailwind</a></h1>
                <div class="inline md:flex md:justify-between items-center">
                    <span class="text-[#9E9E9E] text-base font-medium">Belajar Pemrograman Web menggunakan Framework
                        Tailwind</span>
                    <div class="flex gap-6 mt-4 md:mt-0 text-[#9E9E9E]">
                        <button type="button"
                            class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-4 py-1">
                            <iconify-icon icon="mdi:trash"></iconify-icon><span>Hapus</span>
                        </button>
                        <button type="button"
                            class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-4 py-1">
                            <iconify-icon icon="lucide:edit"></iconify-icon><span>Edit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <div class="flex items-center text-white gap-4 mb-2">
                <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
                <span class="flex-shrink-0">Pertemuan 3</span>
                <hr class="flex-grow border-[#27272A]">
            </div>
            <div class="bg-glass w-full p-6 rounded-xl">
                <h1 class="font-semibold text-white text-xl mb-1"><a href="">Belajar PHP Dasar</a></h1>
                <div class="inline md:flex md:justify-between items-center">
                    <span class="text-[#9E9E9E] text-base font-medium">Belajar Bahasa Pemrograman PHP untuk
                        Pemula</span>
                    <div class="flex gap-6 mt-4 md:mt-0 text-[#9E9E9E]">
                        <button type="button"
                            class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-4 py-1">
                            <iconify-icon icon="mdi:trash"></iconify-icon><span>Hapus</span>
                        </button>
                        <button type="button"
                            class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-4 py-1">
                            <iconify-icon icon="lucide:edit"></iconify-icon><span>Edit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- View All Modul End --}}

</div>
