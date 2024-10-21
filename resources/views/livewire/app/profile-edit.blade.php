<div>

  {{-- Header Start --}}
  <header class="flex items-center justify-between mb-6 mt-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Perbarui Profil</h2>
  </header>
  {{-- Header End --}}

  <form wire:submit.prevent='updateProfile' enctype="multipart/form-data">
    @csrf
    <section class="flex flex-col gap-6 mb-6 md:flex-row">
      <div class="flex flex-col gap-6 md:w-5/12">
        <div class="w-full p-6 text-center rounded-lg bg-glass h-fit">
          <div class="w-40 h-40 mx-auto mb-6 overflow-hidden rounded-full">
            @if (Auth::check() && str_starts_with(Auth::user()->avatar, 'https://lh3.googleusercontent.com/'))
              <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
            @else
              <img
                src="{{ Auth::user()->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . Auth::user()->avatar) }}"
                alt="Avatar" class="object-cover w-full h-full rounded-full">
            @endif
          </div>
          <div class="w-full">
            <input type="file" id="avatar" class="hidden" wire:model='avatar'>
            <label for="avatar" class="flex items-center gap-2 p-3 text-white rounded-md cursor-pointer bg-lightGray">
              <span class="text-xs bg-[#43474C] py-1 px-1.5">Pilih File</span>
              <span class="text-xs" id="file-name">Belum ada file yang dipilih.</span>
            </label>
            @error('avatar')
              <small class="text-left text-red-600"> {{ $message }} </small>
            @enderror
          </div>
        </div>
        <div class="w-full p-6 rounded-lg text-start bg-glass h-fit">
          <label for="github-input" class="block mb-2 font-medium text-white">Github
            <span class="text-xs text-[#7a7a81]">(opsional)</span></label>
          <input type="url" id="github-input" class="block w-full p-3 text-white rounded-lg bg-lightGray"
            wire:model='github' value="{{ $this->github }}" placeholder="">
        </div>
        @role(['guest'])
          <div class="w-full p-6 rounded-lg text-start bg-glass h-fit">
            <label for="tag" class="block mb-2 font-medium text-white">Tag
              <span class="text-xs text-[#7a7a81]">(opsional)</span></label>
            <select name="tag" id="tag" class="block w-full p-3 text-white rounded-lg bg-lightGray"
              wire:model='tag'>
              <option value="Empty">Konsongkan Tag</option>
              <option value="#web">#web</option>
              <option value="#ui/ux">#ui/ux</option>
              <option value="#ai">#ai</option>
              <option value="#mobile">#mobile</option>
              <option value="#compe">#compe</option>
              <option value="#data">#data</option>
            </select>

          </div>
        @endrole
      </div>
      <div class="flex flex-col gap-6 md:w-full">
        <div class="w-full p-6 bg-glass rounded-xl">
          <h4 class="mb-6 text-xl font-semibold text-white ">Informasi Profil</h4>
          <div class="flex flex-wrap gap-6">
            <div class="flex flex-col w-full gap-6 md:flex-row">
              <div class="md:w-1/2">
                <label for="name-input" class="block mb-2 font-medium text-white">Nama</label>
                <input type="text" id="name-input" class="block w-full p-3 text-white rounded-lg bg-lightGray"
                  wire:model='name' value="{{ $this->name }}" placeholder="">
                @error('name')
                  <small class="text-red-600"> {{ $message }} </small>
                @enderror
              </div>
              <div class="md:w-1/2">
                <label for="nim" class="block mb-2 font-medium text-white">Nim</label>
                <input type="number" inputmode="numeric" id="nim"
                  class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="" wire:model='nim'
                  value="{{ $this->nim }}">
                @error('nim')
                  <small class="text-red-600"> {{ $message }} </small>
                @enderror
              </div>
            </div>
            <div class="flex flex-col w-full gap-6 md:flex-row">
              <div class="md:w-1/2">
                <label for="program-studi-input" class="block mb-2 font-medium text-white">Program
                  Studi</label>
                <select id="program-studi-input" class="block w-full p-3 text-white rounded-lg pe-9 bg-lightGray"
                  wire:model='major'>
                  <option>Pilih Prodi</option>
                  <option>Rekayasa Perangkat Lunak</option>
                  <option>Sains Data</option>
                  <option>Informatika</option>
                  <option>Sistem Informasi</option>
                  <option>Teknologi Informasi</option>
                  <option>Bisnis Digital</option>
                  <option>Teknik Telekomunikasi</option>
                  <option>Teknik Industri</option>
                  <option>Teknik Elektro</option>
                  <option>Teknik Komputer</option>
                  <option>Teknik Logistik</option>
                </select>
              </div>
              <div class="md:w-1/2">
                <label for="angkatan" class="block mb-2 font-medium text-white">Tahun Angkatan</label>
                <input type="text" inputmode="numeric" id="angkatan" maxlength="4"
                  class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="20xx" wire:model='batch'
                  value="{{ $this->batch }}">
                @error('batch')
                  <small class="text-red-600"> {{ $message }} </small>
                @enderror
              </div>
            </div>
            <div class="flex flex-col w-full gap-6 md:flex-row">
              <div class="md:w-1/2">
                <label for="phone-input" class="block mb-2 font-medium text-white">Nomer Telepon / WA</label>
                <input type="number" id="phone-input" pattern="^0\d{9,12}$"
                  class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder="08xx"
                  wire:model='phone_number' value="{{ $this->phone_number }}">
                @error('phone_number')
                  <small class="text-red-600"> {{ $message }} </small>
                @enderror
              </div>
              <div class="md:w-1/2">
                <label for="divisi-input" class="block mb-2 font-medium text-white">Divisi</label>
                <select id="divisi-input" @role(['guest|admin|user|super-admin']) disabled @endrole
                  class="block w-full p-3 text-white rounded-lg pe-9 bg-lightGray">
                  <option selected="" disabled>Pilih Divisi</option>
                  <option {{ Auth::user()->division_id === 1 ? 'selected' : '' }}>Web Development</option>
                  <option {{ Auth::user()->division_id === 2 ? 'selected' : '' }}>UI/UX</option>
                  <option {{ Auth::user()->division_id === 3 ? 'selected' : '' }}>AI Software</option>
                  <option {{ Auth::user()->division_id === 4 ? 'selected' : '' }}>Mobile Development</option>
                  <option {{ Auth::user()->division_id === 5 ? 'selected' : '' }}>Competitive Programming</option>
                  <option {{ Auth::user()->division_id === 6 ? 'selected' : '' }}>Data Engineering</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full p-6 bg-glass rounded-xl">
          <h4 class="mb-6 text-xl font-semibold text-white ">Informasi Akun</h4>
          <div class="flex gap-6">
            <div class="flex flex-col w-full gap-6 md:flex-row">
              <div class="md:w-1/2">
                <label for="name-input" class="block mb-2 font-medium text-white">Email</label>
                <input type="email" id="email-input" disabled
                  class="block w-full p-3 text-white rounded-lg bg-lightGray" wire:model='email'
                  value="{{ $this->email }}" placeholder="">
              </div>
              <div class="md:w-1/2">
                <label class="block mb-2 font-medium text-white">Kata Sandi</label>
                <div class="relative">
                  <input id="hs-toggle-password" type="password"
                    class="block w-full p-3 text-white rounded-lg bg-lightGray" placeholder=""
                    value="Ciee Kepooo..wkwkw" disabled>
                  <button type="button" data-hs-toggle-password='{"target": "#hs-toggle-password"}'
                    class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer end-0 rounded-e-md focus:outline-none focus:text-blue-600">
                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                      </path>
                      <path class="hs-password-active:hidden"
                        d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                      </path>
                      <path class="hs-password-active:hidden"
                        d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                      </path>
                      <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                        y2="22"></line>
                      <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                      </path>
                      <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <div class="flex justify-end mb-6">
      <a href="{{ route('app.change-password') }}" wire:navigate
        class="inline-block px-5 py-3 mx-3 text-sm font-semibold text-gray-400 border border-gray-400 rounded-md hover:text-black hover:bg-white">Ubah
        Password</a>
      <button type="submit" wire:loading.remove
        class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Simpan
        Profil
      </button>

      {{-- Loaading event start --}}
      <div wire:loading wire:target="updateProfile"
        class="flex items-center py-3 text-sm font-semibold text-black bg-white rounded-md px-14">
        <div
          class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-black rounded-full"
          role="status" aria-label="loading">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      {{-- Loaading event end --}}
    </div>
  </form>
</div>

<script>
  const fileInput = document.getElementById('avatar');
  const fileName = document.getElementById('file-name');

  fileInput.addEventListener('change', (event) => {
    const files = event.target.files;
    if (files.length > 0) {
      fileName.textContent = files[0].name;
    } else {
      fileName.textContent = 'Belum ada file yang dipilih.';
    }
  });

  document.getElementById("nim").addEventListener("input", (e) => {
    const value = e.target.value;
    const notDigit = /\D/;
    if (notDigit.test(value)) {
      e.target.value = value.replace(notDigit, "");
    }
  });

  document.getElementById("angkatan").addEventListener("input", (e) => {
    const value = e.target.value;
    const notDigit = /\D/;
    if (notDigit.test(value)) {
      e.target.value = value.replace(notDigit, "");
    }
  });
</script>
