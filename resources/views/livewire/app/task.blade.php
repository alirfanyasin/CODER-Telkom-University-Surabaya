<div>
    {{-- Header Start --}}
    <header class="flex items-center justify-between my-7">
        <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Tugas</h2>
        @role(['admin'])
            <div class="hidden md:block">
                <a href="{{ route('app.e-learning.task.create') }}" wire:navigate
                    class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
                    Buat Tugas Baru <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
                </a>
            </div>

            <div class="block md:hidden">
                <a href="{{ route('app.e-learning.task.create') }}" wire:navigate
                    class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-md">
                    <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
                </a>
            </div>
        @endrole
    </header>
    {{-- Header End --}}

    {{-- View All Task Section Start --}}
    <section class="mb-10">
        @foreach ($groupedTasks as $meetingNumber => $tasks)
            <div>
                <div class="flex items-center gap-4 mb-2 text-white">
                    <iconify-icon class="" icon="lucide:calendar"></iconify-icon>
                    <h2 class="flex-shrink-0">Pertemuan {{ $meetingNumber }}</h2>
                    <div class="flex-grow border border-gray-600"></div>
                </div>

                @foreach ($tasks as $task)
                    <a href="{{ route('app.e-learning.task.detail', $task->slug) }}" wire:navigate class="block">
                        <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
                            <h3 class="text-2xl font-semibold text-white">Tugas {{ $task->title['task'] }}</h3>
                            <p class="font-light text-gray-400">{{ $task->name }}</p>

                            <div class="@role(['admin']) flex items-center @endrole mt-4">
                                @role(['admin'])
                                    <div class="flex items-center w-full">
                                        <a href="{{ route('app.e-learning.task.submission', $task->slug) }}" wire:navigate
                                            class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass hover:bg-white hover:text-black">
                                            Lihat pengumpulan
                                        </a>
                                    </div>
                                @endrole
                                @role(['user'])
                                    <div class="flex items-center justify-between">
                                        <div class="flex justify-start w-full gap-2">
                                            <div class="flex items-center w-full">
                                                <a href="{{ route('app.e-learning.task.submission', $task->slug) }}"
                                                    wire:navigate
                                                    class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass hover:bg-white hover:text-black">
                                                    Kumpulkan Tugas
                                                </a>
                                                <a href="" class="mt-2 ms-4">
                                                    <iconify-icon icon="vscode-icons:file-type-pdf2"
                                                        class="text-3xl"></iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-slate-400">{{ $task->due_date }}</p>
                                        </div>
                                    </div>
                                @endrole

                                @role(['admin'])
                                    <div class="inline md:flex md:justify-between">
                                        <div class="flex gap-2 text-gray-400 md:gap-4">
                                            <a href="#" wire:click.prevent="destroy({{ $task->id }})"
                                                class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-red-600 border-[#27272A] px-2 md:px-4 py-1">
                                                <iconify-icon icon="tabler:trash"></iconify-icon>
                                                <span class="hidden md:block">Hapus</span>
                                            </a>
                                            <a href="{{ route('app.e-learning.task.edit', $task->slug) }}"
                                                class="flex gap-1 rounded-md items-center text-base font-medium border hover:text-yellow-600 border-[#27272A] px-2 md:px-4 py-1">
                                                <iconify-icon icon="lucide:edit"></iconify-icon><span
                                                    class="hidden md:block">Edit</span>
                                            </a>
                                        </div>
                                    </div>
                                @endrole
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach

    </section>
    {{-- View All Task Section End --}}
</div>
