<div>
    <header class="flex items-center justify-between my-7">
        <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Pengumpulan</h2>
    </header>

    @role(['super-admin|admin'])
        <section class="p-5 mb-7 rounded-lg text-white bg-glass">
            <h3 class="text-2xl font-semibold mb-4">Terkumpul <span
                    class="text-gray-400">({{ $data['count']['done'] }})</span></h3>

            @if ($data['users']->where('submission', '!=', null)->isEmpty())
                <h4 class="text-3xl font-normal mb-4">None</h4>
            @else
                @foreach ($data['users'] as $user)
                    @if ($user->submission)
                        <div class="flex justify-between gap-4 bg-[#27292C] rounded-md p-2 mb-4">
                            <div class="flex items-center">
                                <img src="{{ $user->avatar ?? 'https://placehold.co/500' }}" alt="Avatar"
                                    class="w-10 h-100 object-cover rounded-full me-4">
                                <p>{{ $user->name }}</p>
                            </div>
                            <a href="{{ $user->submission->submission }}" target="_blank"
                                class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass hover:bg-white hover:text-black">Lihat
                                Tugas</a>
                        </div>
                    @endif
                @endforeach
            @endif
        </section>

        <section class="p-5 mb-7 rounded-lg text-white bg-glass">
            <h3 class="text-2xl font-semibold mb-4">Belum Terkumpul <span
                    class="text-gray-400">({{ $data['count']['not_done'] }})</span></h3>

            @if ($data['users']->where('submission', null)->isEmpty())
                <h4 class="text-gray-400 text-center font-normal mb-4">None</h4>
            @else
                @foreach ($data['users'] as $user)
                    @if (!$user->submission)
                        <div class="flex justify-between gap-4 bg-[#27292C] rounded-md p-2 mb-4">
                            <div class="flex items-center">
                                <img src="{{ $user->avatar ?? 'https://placehold.co/500' }}" alt="Avatar"
                                    class="w-10 h-100 object-cover rounded-full me-4">
                                <p>{{ $user->name }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </section>

    @endrole

    @role(['user'])
        @if ($submission)
            <section class="p-5 mb-7 rounded-lg text-white bg-glass">
                <h3 class="text-2xl font-semibold mb-4">Anda Sudah Mengumpulkan Tugas</h3>
            </section>
        @else
            <form action="" class="mb-10" wire:submit.prevent="store">
                <section class="p-5 mb-7 rounded-lg text-white bg-glass">
                    <h3 class="text-2xl font-semibold mb-4">Kumpulkan Tugas</h3>
                    <input type="url" name="submission_link" id="submission_link" autocomplete="submission_link"
                        class="block w-full p-3 text-white rounded-lg bg-lightGray" wire:model="submission_link"
                        placeholder="Link Tugas">
                    @error('submission_link')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </section>
                <section class="flex items-center justify-end">
                    <a href="{{ route('app.e-learning.task') }}" wire:navigate
                        class="flex items-center px-5 py-3 text-sm font-semibold text-gray-300 rounded-md me-4 bg-glass hover:text-black hover:bg-white">
                        Batal
                    </a>
                    <button class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">
                        Kumpulkan Tugas <iconify-icon icon="fa-solid:save" class="text-xl ms-2"></iconify-icon>
                    </button>
                </section>
            </form>
        @endif
    @endrole
</div>
