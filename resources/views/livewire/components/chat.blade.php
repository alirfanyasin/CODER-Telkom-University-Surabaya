<div class="absolute z-50 bottom-10 right-10">
  <div class="relative inline-flex">
    <button id="btn-chat" type="button"
      class="inline-flex items-center px-3 py-3 text-sm font-medium text-white border rounded-lg shadow-lg hs-dropdown-toggle gap-x-2 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-neutral-800 border-neutral-700 hover:bg-neutral-700 focus:bg-neutral-700"
      aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" style="z-index: 50;">
      <iconify-icon icon="lucide:messages-square" class="text-2xl"></iconify-icon>
    </button>

    <div
      class="chat-div hs-dropdown-menu absolute bottom-16 right-0 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 md:w-[680px] w-[320px] bg-white shadow-md rounded-lg p-1 space-y-0.5 divide-y bg-glass border border-neutral-700 divide-neutral-700 hidden"
      role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons" wire:ignore.self
      style="z-index: 40;" data-popper-placement="top-start">
      <div class="relative grid grid-cols-1 md:grid-cols-3">
        <div class="hidden py-2 pb-5 overflow-auto first:pt-0 last:pb-0 scroll-custom h-96 md:block">
          {{-- <header class="w-full p-2 mb-4 text-black bg-white rounded-t-md">
              <h4 class="font-bold text-center">Chat</h4>
            </header> --}}

          {{-- User Account Start --}}
          @foreach ($datas as $data)
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm focus:outline-none text-neutral-400 hover:bg-neutral-700 hover:text-neutral-300 focus:bg-neutral-700"
              href="#" wire:click='getUser({{ $data->id }})'>
              <div class="w-8 h-8 overflow-hidden">
                @if (str_starts_with($data->avatar, 'https://lh3.googleusercontent.com/'))
                  <img src="{{ $data->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
                @else
                  <img
                    src="{{ $data->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $data->avatar) }}"
                    alt="Avatar" class="object-cover w-full h-full rounded-full">
                @endif
              </div>
              <div class="">
                <p class="text-white">{{ Str::limit($data->name, 17, '...') }}</p>
                <p class="text-xs font-light">Masukkan pesan...</p>
              </div>
            </a>
          @endforeach
          {{-- User Account End --}}


        </div>
        <div class="relative col-span-2 first:pt-0 last:pb-0 h-96">
          <header class="sticky top-0 w-full p-2 rounded-t-md bg-neutral-800">
            <div class="flex items-start justify-between">

              <div class="hidden md:block">
                @if ($userTo)
                  @php
                    $selectedUser = $datas->where('id', $userTo)->first();
                  @endphp
                  @if ($selectedUser)
                    <div class="flex items-center gap-2 mb-3">
                      <div class="w-8 h-8 overflow-hidden">
                        @if (str_starts_with($selectedUser->avatar, 'https://lh3.googleusercontent.com/'))
                          <img src="{{ $selectedUser->avatar }}" alt="Avatar"
                            class="object-cover w-full h-full rounded-full">
                        @else
                          <img
                            src="{{ $selectedUser->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $selectedUser->avatar) }}"
                            alt="Avatar" class="object-cover w-full h-full rounded-full">
                        @endif
                        {{-- <img
                          src="{{ $selectedUser->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $selectedUser->avatar) }}"
                          alt="Avatar" class="object-cover w-full h-full rounded-full"> --}}
                      </div>
                      <div>
                        <p class="text-sm text-white">{{ $selectedUser->name }}</p>
                      </div>
                    </div>
                  @endif
                @else
                  <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 overflow-hidden border rounded-full border-neutral-500">
                    </div>
                    <div>
                      <p class="text-sm font-light text-white">Belum Ada User</p>
                    </div>
                  </div>
                @endif
              </div>

              <select name="" id="" class="block mb-3 text-xs text-white bg-transparent md:hidden">
                <option value="" class="text-xs bg-glass">Irfan Yasin</option>
                <option value="" class="text-xs bg-glass">Dandy Ainul Yakin</option>
                <option value="" class="text-xs bg-glass">Fakhri Alauddin</option>
                <option value="" class="text-xs bg-glass">Raihan Siyun</option>
                <option value="" class="text-xs bg-glass">Ananda Bintang</option>
                <option value="" class="text-xs bg-glass">Rama</option>
              </select>

              <button id="btn-close" class="flex items-center justify-center text-white">
                <iconify-icon icon="uil:times"></iconify-icon>
              </button>
            </div>
            <hr class="border border-neutral-600">
          </header>

          <div class="h-[277px] overflow-auto scroll-custom">
            <div class="p-2" wire:poll.7s>
              @forelse ($chats as $chat)
                @if ($chat->from_user_id == Auth::user()->id)
                  <div class="flex justify-end">
                    <div class="w-8/12 mb-3 text-end">
                      <span class="inline-block px-3 py-1 text-sm text-white bg-green-800 rounded-lg">
                        {{ $chat->chat }}
                      </span>
                      <small
                        class="block text-xs text-neutral-500">{{ \Carbon\Carbon::parse($chat->time)->format('H:i') }}</small>
                    </div>
                  </div>
                @elseif ($chat->to_user_id == Auth::user()->id)
                  <div class="flex justify-start">
                    <div class="w-8/12 mb-3 text-left">
                      <span class="inline-block px-3 py-1 text-sm text-white rounded-lg bg-neutral-600">
                        {{ $chat->chat }}
                      </span>
                      <small
                        class="block text-xs text-neutral-500">{{ \Carbon\Carbon::parse($chat->time)->format('H:i') }}</small>
                    </div>
                  </div>
                @endif
              @empty
                <p class="text-center text-white">Belum ada pesan</p>
              @endforelse
            </div>
          </div>

          {{-- Input chat start --}}
          <div class="sticky w-full px-2 py-2 top-10 bg-neutral-600">
            <form wire:submit.prevent='sendChat' class="flex">
              @if ($userTo)
                @php
                  $selectedUser = $datas->where('id', $userTo)->first();
                @endphp
                @if ($selectedUser)
                  <input type="text" name="" id="" wire:model='chat' autofocus autocomplete="false"
                    class="w-full px-2 py-1 text-xs font-light text-neutral-300 bg-neutral-700 rounded-l-md focus:border-0 focus:outline-none">
                  <button type="submit" class="px-2 py-1 text-sm text-white bg-green-800 rounded-r-md"><iconify-icon
                      icon="fa:send"></iconify-icon></button>
                @endif
              @else
                <input type="text" name="" id="" disabled autofocus autocomplete="false"
                  class="w-full px-2 py-1 text-xs font-light text-neutral-300 bg-neutral-700 rounded-l-md focus:border-0 focus:outline-none">
                <button type="button" disabled
                  class="px-2 py-1 text-sm text-white bg-neutral-500 rounded-r-md"><iconify-icon
                    icon="fa:send"></iconify-icon></button>
              @endif

            </form>
          </div>
          {{-- Input chat end --}}
        </div>
      </div>
    </div>
  </div>
</div>
