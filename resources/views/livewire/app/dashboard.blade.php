<div>
  {{-- Header Section Start --}}
  <section class="my-10">
    <header>
      <h2 class="text-3xl font-semibold text-white">Halo, {{ Auth::user()->name }}</h2>
      <p class="text-gray-400">Siap untuk belajar sekarang!</p>
    </header>
  </section>
  {{-- Header Section End --}}

  {{-- Total Section Start --}}
  <section class="mb-3">
    <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
      @role(['super-admin'])
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">10</h3>
          <p class="text-gray-400">Total User</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">10</h3>
          <p class="text-gray-400">Total Laporan</p>
        </div>
        <div class="p-6 rounded-xl bg-glass">
          <h3 class="font-semibold text-white text-8xl">18</h3>
          <p class="text-gray-400">Total Divisi</p>
        </div>
      @endrole
      @role(['admin'])
        <div class="p-6 rounded-xl bg-glass" id="countMeeting">
          <h3 class="font-semibold text-white text-8xl">{{ $totalMeeting }}</h3>
          <p class="text-gray-400">Total Pertemuan</p>
        </div>
        <div class="p-6 rounded-xl bg-glass" id="countTask">
          <h3 class="font-semibold text-white text-8xl">{{ $totalTask }}</h3>
          <p class="text-gray-400">Total Tugas</p>
        </div>
        <div class="p-6 rounded-xl bg-glass" id="countQuiz">
          <h3 class="font-semibold text-white text-8xl">{{ $totalQuiz }}</h3>
          <p class="text-gray-400">Total Kuis</p>
        </div>
      @endrole
      @role(['user'])
        <div class="p-6 rounded-xl bg-glass" id="totalPresenceUser">
          <h3 class="font-semibold text-white text-8xl">{{ $totalPresenceUser }}</h3>
          <p class="text-gray-400">Pertemuan Diikuti</p>
        </div>
        <div class="p-6 rounded-xl bg-glass" id="totaltaskUser">
          <h3 class="font-semibold text-white text-8xl">{{ $totaltaskUser }}</h3>
          <p class="text-gray-400">Tugas Terkumpul</p>
        </div>
        <div class="p-6 rounded-xl bg-glass" id="pointUser">
          <h3 class="font-semibold text-white text-8xl">{{ $point }}</h3>
          <p class="text-gray-400">Total Point</p>
        </div>
      @endrole

    </div>
  </section>
  {{-- Total Section End --}}

  {{-- Statistic and Meeting Schedule Section Start --}}
  <section class="mb-3">
    <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">
      <div class="col-span-2 p-6 rounded-xl bg-glass" id="activityChart">
        <header class="mb-4">
          <h4 class="text-xl font-semibold text-white">Statistik Aktifitas</h4>
        </header>

        <div>
          {!! $activityCart->container() !!}
        </div>
      </div>
      {{-- Recent users start --}}
      <div class="col-span-1 p-6 rounded-xl bg-glass lg:-me-0 -me-3">
        <header class="mb-6">
          <h4 class="text-xl font-semibold text-white">Pengguna Terkini</h4>
        </header>
        <div class="h-[300px] overflow-auto scroll-cusrom">
          @foreach ($userActive as $user)
            <div class="flex items-center mb-3">
              <div class="relative">
                <div class="w-10 h-10 overflow-hidden rounded-full">
                  @if (str_starts_with($user->user->avatar, 'https://lh3.googleusercontent.com/'))
                    <img src="{{ $user->user->avatar }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
                  @else
                    <img
                      src="{{ $user->user->avatar === null ? asset('assets/images/avatar.png') : asset('storage/avatar/' . $user->user->avatar) }}"
                      alt="Avatar" class="object-cover w-full h-full rounded-full">
                  @endif

                </div>
                @if ($user->status === 'active')
                  <div class="absolute w-2.5 h-2.5 bg-green-600 border border-white rounded-full right-0 top-1"></div>
                @endif
              </div>
              <div class="text-white ms-2">
                <h3 class="text-sm break-words">{{ Str::limit($user->user->name ?? '', 25, '...') }}</h3>
                <p class="text-xs font-light text-gray-500">{{ $user->user->label ?? '' }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    {{-- Recent users end --}}
  </section>
  {{-- Statistic and Meeting Schedule Section End --}}


  <section class="mb-10">
    <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
      {{-- Meeting Schedule Start --}}
      <div class="p-6 rounded-xl bg-glass" id="meetingSchedule">
        <div class="">
          <header class="mb-4">
            <h4 class="text-xl font-semibold text-white">Jadwal Pertemuan</h4>
          </header>
          <div class="min-h-80 max-h-[500px] overflow-auto scroll-custom">
            @foreach ($meetingData as $meeting)
              <a href="" wire:navigate class="block" class="w-full bg-red-300">
                <div class="w-full p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
                  <header class="flex items-center justify-between mb-3 text-white">
                    <div class="flex items-center">
                      <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
                      <span
                        class="text-sm font-light">{{ \Carbon\Carbon::parse($meeting->date_time)->translatedFormat('l, d F Y') }}</span>
                      <span class="text-sm font-light ms-2"> -
                        {{ \Carbon\Carbon::parse($meeting->date_time)->format('H:i') }}
                        WIB</span>
                    </div>
                    <div class="px-2 py-2 text-xs bg-blue-600 rounded-full"></div>
                  </header>
                  <div>
                    <div>
                      <h3 class="text-2xl font-semibold text-white">{{ $meeting->name }}</h3>
                      <p class="font-light text-gray-400">{{ $meeting->description }}</p>
                    </div>
                    <div class="flex items-center justify-between w-full mt-4">
                      {{-- Icon meeting type start --}}
                      @if ($meeting->type == 'offline')
                        <div class="flex items-center w-full">
                          <a href=""
                            class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                            <iconify-icon icon="carbon:location"
                              class="text-3xl text-white group-hover:text-black"></iconify-icon>
                          </a>
                          <p class="text-white ms-3">{{ $meeting->location }}</p>
                        </div>
                      @elseif($meeting->type == 'online')
                        <div class="flex items-center w-full">
                          <a target="_blank" href="{{ $meeting->link }}"
                            class="flex items-center justify-center w-10 h-10 border border-gray-500 rounded-lg group hover:bg-white">
                            <iconify-icon icon="fluent:video-24-regular"
                              class="text-3xl text-white group-hover:text-black"></iconify-icon>
                          </a>
                          @php
                            $host = '';
                            $parsedUrl = parse_url($meeting->link);
                            if ($parsedUrl && isset($parsedUrl['host'])) {
                                $host = $parsedUrl['host'];
                            }
                          @endphp
                          @if ($host == 'meet.google.com')
                            <p class="text-white ms-3">google meet</p>
                          @elseif($host == 'us05web.zoom.us')
                            <p class="text-white ms-3">Zoom</p>
                          @else
                            <p class="text-white ms-3">Online</p>
                          @endif

                        </div>
                      @endif
                      {{-- Icon meeting type end --}}
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
      </div>
      {{-- Meeting Schedule End --}}

      {{-- Task task start --}}
      <div class="p-6 rounded-xl bg-glass " id="taskActive">
        <div class="">
          <header class="mb-4">
            <h4 class="text-xl font-semibold text-white">Tugas Aktif</h4>
          </header>

          <div class="min-h-80 max-h-[500px] overflow-auto scroll-custom">
            @foreach ($taskData as $task)
              @php
                $dueDate = \Carbon\Carbon::parse($task->due_date);
                $now = \Carbon\Carbon::now();
                $isExpired = $dueDate->isPast();
                $timeRemaining = $dueDate->diffForHumans($now, [
                    'parts' => 2,
                    'short' => true,
                    'syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                ]);
              @endphp
              @if (!$isExpired)
                @if (!in_array($task->id, $checkSubmission))
                  <div class="p-5 mb-4 rounded-lg bg-glass hover:border hover:border-gray-500">
                    <header class="mb-3 text-white md:flex md:items-center md:justify-between">
                      <div class="order-1 mb-3 md:order-2">

                        @if ($isExpired)
                          <div class="w-full px-3 py-1 text-xs text-center bg-red-600 rounded-md md:text-left">
                            Tugas Ditutup
                          </div>
                        @else
                          <div class="w-full px-3 py-1 text-xs text-center bg-green-600 rounded-md md:text-left ">
                            {{ $timeRemaining }}
                          </div>
                        @endif
                      </div>

                      <div class="flex items-center order-2 md:order-1">
                        <iconify-icon icon="iconoir:calendar" class="text-2xl me-3"></iconify-icon>
                        <span
                          class="text-sm font-light">{{ \Carbon\Carbon::parse($task->due_date)->translatedFormat('l, d F Y') }}</span>
                        <span class="text-sm font-light ms-2"> -
                          {{ \Carbon\Carbon::parse($task->due_date)->format('H:i') }}
                          WIB</span>
                      </div>
                    </header>

                    <h3 class="text-lg font-semibold text-white break-words md:text-2xl">{{ $task->name }}</h3>
                    <p class="text-sm font-light text-gray-400 break-words md:text-base">{{ $task->description }}</p>

                    @if ($task->file !== null)
                      <a href="{{ asset('storage/file/task/' . $task->file) }}" class="block mt-3" download>
                        <iconify-icon icon="vscode-icons:file-type-pdf2" class="text-5xl"></iconify-icon>
                      </a>
                    @endif

                    <div class="@role(['admin']) flex items-center @endrole mt-4">
                      @role(['admin'])
                        <div class="flex items-center w-full">
                          <a href="{{ route('app.e-learning.task.show-answer', $task->slug) }}" wire:navigate
                            class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white border rounded-lg border-[#3c3c41] gap-x-2 bg-glass hover:bg-white hover:text-black">
                            Lihat Jawaban
                          </a>
                        </div>
                      @endrole
                      @role(['user'])
                        <div class="flex items-center justify-between">
                          <div class="flex justify-start w-full gap-2">
                            <div class="flex items-center w-full">
                              @if (!$isExpired)
                                @if (in_array($task->id, $checkSubmission))
                                  <a href="{{ route('app.e-learning.task.submission.edit', $task->slug) }}"
                                    wire:navigate
                                    class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                                    <iconify-icon icon="lucide:edit"></iconify-icon><span class="md:block">Edit
                                      Jawaban</span>
                                  </a>
                                @else
                                  <a href="{{ route('app.e-learning.task.submission', $task->slug) }}" wire:navigate
                                    class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                                    Kumpulkan Tugas
                                  </a>
                                @endif
                              @else
                                @if (in_array($task->id, $checkSubmission))
                                  <a href="{{ route('app.e-learning.task.show-score', $task->slug) }}" wire:navigate
                                    class="inline-flex items-center px-4 py-3 text-sm font-semibold me-2 text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                                    Lihat Nilai
                                  </a>
                                @else
                                  <a href="#" wire:click.prevent='isExpired'
                                    class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white rounded-lg gap-x-2 bg-glass border border-[#3c3c41] hover:bg-white hover:text-black">
                                    Kumpulkan Tugas
                                  </a>
                                @endif
                              @endif
                            </div>
                          </div>
                        </div>
                      @endrole
                    </div>
                  </div>
                @endif
              @endif
            @endforeach
          </div>
        </div>
      </div>
      {{-- Task task end --}}
  </section>
  {{-- Meeting Schedule End --}}
</div>

@push('js-custom')
  @role('admin')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah tutorial sudah pernah ditampilkan
        if (!localStorage.getItem('driverTutorialShown')) {
          const driver = window.driver.js.driver;

          const driverObj = driver({
            showProgress: true,
            steps: [{
                element: '#application-sidebar',
                popover: {
                  title: 'Sidebar Menu',
                  description: 'Sidebar menu merupakan kumpulan menu-menu utama'
                }
              },
              {
                element: '#searching',
                popover: {
                  title: 'Pencarian',
                  description: 'Pencarian akan memudahkan Anda dalam menemukan data yang ingin dicari'
                }
              },
              {
                element: '#countMeeting',
                popover: {
                  title: 'Total Pertemuan',
                  description: 'Jumlah dari keseluruhan total pertemuan yang Anda ikuti'
                }
              },
              {
                element: '#countTask',
                popover: {
                  title: 'Total Tugas',
                  description: 'Total tugas yang sudah dikumpulkan'
                }
              },
              {
                element: '#countQuiz',
                popover: {
                  title: 'Total Kuis',
                  description: 'Jumlah keseluruhan kuis yang sudah Anda kerjakan'
                }
              },
              {
                element: '#activityChart',
                popover: {
                  title: 'Statistik Aktifitas',
                  description: 'Statistik aktifitas dapat merecord aktifitas Anda dalam mengikuti pertemuan, tugas, kuis dan presensi'
                }
              },
              {
                element: '#meetingSchedule',
                popover: {
                  title: 'Jadwal Pertemuan',
                  description: 'Jadwal pertemuan yang akan datang akan dan dapat Anda ikuti'
                }
              },
              {
                element: '#taskActive',
                popover: {
                  title: 'Tugas Aktif',
                  description: 'Tugas yang aktif dan belum Anda kerjakan atau kumpulkan'
                }
              },
              {
                element: '#btn-chat',
                popover: {
                  title: 'Chatting',
                  description: 'Fitur chatting berguna untuk mengobrol kepada teman secara end-to-end'
                }
              },
            ]
          });

          driverObj.drive();
          localStorage.setItem('driverTutorialShown', 'true');
        }
      });
    </script>
  @endrole

  @role('user')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah tutorial sudah pernah ditampilkan
        if (!localStorage.getItem('driverTutorialShown')) {
          const driver = window.driver.js.driver;

          const driverObj = driver({
            showProgress: true,
            steps: [{
                element: '#application-sidebar',
                popover: {
                  title: 'Sidebar Menu',
                  description: 'Sidebar menu merupakan kumpulan menu-menu utama'
                }
              },
              {
                element: '#searching',
                popover: {
                  title: 'Pencarian',
                  description: 'Pencarian akan memudahkan Anda dalam menemukan data yang ingin dicari'
                }
              },
              {
                element: '#totalPresenceUser',
                popover: {
                  title: 'Total Pertemuan',
                  description: 'Jumlah dari keseluruhan total pertemuan yang Anda ikuti'
                }
              },
              {
                element: '#totaltaskUser',
                popover: {
                  title: 'Total Tugas',
                  description: 'Total tugas yang sudah dikumpulkan'
                }
              },
              {
                element: '#pointUser',
                popover: {
                  title: 'Total Point',
                  description: 'Jumlah keseluruhan point yang sudah Anda kumpulkan'
                }
              },
              {
                element: '#activityChart',
                popover: {
                  title: 'Statistik Aktifitas',
                  description: 'Statistik aktifitas dapat merecord aktifitas Anda dalam mengikuti pertemuan, tugas, kuis dan presensi'
                }
              },
              {
                element: '#meetingSchedule',
                popover: {
                  title: 'Jadwal Pertemuan',
                  description: 'Jadwal pertemuan yang akan datang akan dan dapat Anda ikuti'
                }
              },
              {
                element: '#taskActive',
                popover: {
                  title: 'Tugas Aktif',
                  description: 'Tugas yang aktif dan belum Anda kerjakan atau kumpulkan'
                }
              },
              {
                element: '#btn-chat',
                popover: {
                  title: 'Chatting',
                  description: 'Fitur chatting berguna untuk mengobrol kepada teman secara end-to-end'
                }
              },
            ]
          });

          driverObj.drive();
          localStorage.setItem('driverTutorialShown', 'true');
        }
      });
    </script>
  @endrole

  <script src="{{ $activityCart->cdn() }}"></script>
  {{ $activityCart->script() }}
@endpush
