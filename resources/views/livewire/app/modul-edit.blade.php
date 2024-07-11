<div>
    {{-- Header Start --}}
    <header class="flex my-7">
        <h2 class="text-2xl font-bold text-white md:text-3xl">Edit Modul</h2>
    </header>
    {{-- Header End --}}

    {{-- Informasi Modul Start --}}
    <div class="bg-glass w-full mb-6 rounded-xl p-6">
        <h2 class="text-white text-xl font-medium mb-6">Informasi Modul</h2>
        <div class="block mb-6 md:flex justify-between gap-9">
            <div class="w-full mb-6 md:mb-0">
                <label for="input-label" class="block text-sm font-normal mb-2 text-white">Nama Modul</label>
                <input type="text" id="input-label"
                    class="py-3 px-4 block w-full text-white border-gray-200 rounded-lg text-sm bg-[#27272A] focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    value="Fundamental HTML dan CSS Dasar" placeholder="Nama Modul">
            </div>
            <div class="w-full">
                <label for="input-label" class="block text-sm font-normal mb-2 text-white">Pilih Pertemuan</label>
                <select
                    class="py-3 px-4 pe-9 block w-full text-white border-gray-200 bg-[#27272A] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <option disabled>Pertemuan ke-</option>
                    <option selected>Pertemuan ke-1</option>
                    <option>Pertemuan ke-2</option>
                    <option>Pertemuan ke-3</option>
                </select>
            </div>
        </div>
        <div class="w-full">
            <label for="textarea-label" class="block text-sm text-white font-normal mb-2">Deskripsi</label>
            <textarea id="textarea-label"
                class="py-3 px-4 block w-full text-white bg-[#27272A] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                rows="3" placeholder="Deskripsi">Mengenal Fundamental HTML dan CSS Dasar untuk Pemula</textarea>
        </div>
    </div>
    {{-- Informasi Modul End --}}

    {{-- Upload File Start --}}
    <div class="bg-glass w-full rounded-xl p-6 mb-6">
        <h2 class="text-white text-xl font-medium mb-6">Refrensi / File Pendukung</h2>
        <div class="block mb-6 md:flex justify-between gap-9">
            <div class="w-full mb-6 md:mb-0">
                <label for="input-label" class="block text-sm font-normal mb-2 dark:text-white">Jenis File
                    Pendukung</label>
                <select
                    class="py-3 px-4 pe-9 block w-full text-white border-gray-200 bg-[#27272A] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <option disabled>Jenis File</option>
                    <option selected>Power Point</option>
                    <option>PDF</option>
                    <option>Ms.Word</option>
                    <option>Ms.Excel</option>
                    <option>Blog</option>
                    <option>Notepad (.txt)</option>
                </select>
            </div>
            <div class="w-full">
                <label for="input-label" class="block text-sm font-normal mb-2 dark:text-white">Upload File <span
                        class="text-[#9E9E9E] text-xs">(Maksimal 5 Mb)</span></label>
                <input type="file" id="file-input" class="hidden">
                <label for="file-input"
                    class="flex items-center cursor-pointer bg-[#27272A] gap-2 text-white rounded-md px-4 py-3">
                    <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
                    <span class="text-xs" id="file-name">Belum ada file yang dipilih.</span>
                </label>
            </div>
        </div>
    </div>
    {{-- Upload File End --}}

    <div class="flex justify-end mb-6">
        <a href="{{ route('app.e-learning.modul') }}" wire:navigate
            class="inline-block px-5 py-3 text-sm font-semibold text-gray-400 border border-gray-400 rounded-md">Batal</a>
        <button type="submit"
            class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md ms-3">Simpan
            Perubahan
            <iconify-icon icon="material-symbols:save-outline" class="text-2xl ms-2"></iconify-icon>
        </button>
    </div>

</div>

<script>
    const fileInput = document.getElementById('file-input');
    const fileName = document.getElementById('file-name');

    fileInput.addEventListener('change', (event) => {
        const files = event.target.files;
        if (files.length > 0) {
            fileName.textContent = files[0].name;
        } else {
            fileName.textContent = 'Belum ada file yang dipilih.';
        }
    });
</script>
