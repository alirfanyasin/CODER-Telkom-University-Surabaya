<div>
  {{-- Header Start --}}
  <header class="flex my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Jawaban Anggota ({{ $datas->count() }})</h2>
  </header>
  {{-- Header End --}}

  <section>
    @foreach ($datas as $data)
      <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <div class="w-12 h-12 overflow-hidden rounded-full md:w-14 md:h-14">
              @if (str_starts_with($data->user->avatar, 'https://lh3.googleusercontent.com/'))
                <img src="{{ $data->user->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
              @else
                <img
                  src="{{ $data->user->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $data->user->avatar) }}"
                  alt="Avatar" class="object-cover w-full h-full rounded-full">
              @endif
            </div>

            <div class="ms-4">
              <h3 class="block text-base text-white break-words md:hidden">
                {{ Str::limit($data->user->name, 20, '...') }}
              </h3>
              <h3 class="hidden text-base text-white break-words md:block">{{ $data->user->name }}
              </h3>
              <p class="text-sm text-gray-400">{{ $data->user->major ?: '-' }}</p>
            </div>
          </div>

          <a href="{{ $data->submission }}" target="_blank"
            class="flex items-center justify-center w-16 h-8 text-sm text-black bg-white rounded-md">
            Lihat
          </a>
        </div>


      </div>
    @endforeach

  </section>
</div>
