<div>
  {{-- Header Start --}}
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">PlayBox Session 6</h2>

    <div class="hidden md:block">
      <button type="button" class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md"
        data-hs-overlay="#create-workspace">Buat Bagian
        <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon></button>
    </div>

    <div class="block md:hidden">
      <a href="{{ route('app.e-learning.meeting.create') }}" wire:navigate
        class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full"><iconify-icon
          icon="majesticons:plus-line" class="text-2xl"></iconify-icon></a>
    </div>
  </header>
  {{-- Header End --}}


  {{-- Section Start --}}
  <section>
    <div class="hs-accordion-group">
      <div
        class="mb-5 border border-transparent bg-glass hs-accordion hs-accordion-active:border-gray-200 {{ session()->has('addTask') ? 'border-gray-200' : '' }} rounded-xl"
        id="hs-active-bordered-heading-one">
        <button
          class="inline-flex items-center justify-between w-full px-5 py-4 font-semibold text-gray-800 hs-accordion-toggle hs-accordion-active:text-blue-600 gap-x-3 text-start hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400"
          aria-controls="hs-basic-active-bordered-collapse-one">
          Kepanitiaan
          <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5v14"></path>
          </svg>
          <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
          </svg>
        </button>

        <div id="hs-basic-active-bordered-collapse-one"
          class="hs-accordion-content  {{ session()->has('addTask') ? 'block' : 'hidden' }} w-full overflow-hidden transition-[height] duration-300"
          aria-labelledby="hs-active-bordered-heading-one">
          <div class="px-5 pb-4">
            {{-- Task Start --}}
            <div class="flex justify-end mb-3">
              @if (session()->has('addTask'))
                <button type="button"
                  class="px-3 py-1 text-sm font-semibold text-white border border-gray-700 rounded-md hover:text-red-500 me-2"
                  wire:click.prevent='cancel'>Batal</button>
              @endif
              <button type="button" class="px-3 py-1 text-sm font-semibold bg-white rounded-md"
                wire:click.prevent='addTask'>Tambah
                Tugas</button>

            </div>
            <div class="flex flex-col">
              <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                  <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                      <thead>
                        <tr>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Nama</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Penerima Tugas</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Tenggat Waktu</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Status</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">
                            Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                          <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Membuat Proposal Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, hic?
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                            <div class="flex">
                              <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                                  class="object-cover w-full h-full">
                              </div>
                              <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                                  class="object-cover w-full h-full">
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">7 Januari
                            2024</td>

                          <td class="px-6 py-4 text-xs whitespace-nowrap text-neutral-200">
                            <span class="px-3 py-1 bg-green-600 rounded-md">Selesai</span>
                          </td>
                          <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                            <div class="flex items-center">
                              <a href="{{ route('app.e-learning.meeting.edit') }}" wire:navigate class="me-2">
                                <iconify-icon icon="uil:edit" class="text-xl text-gray-400"></iconify-icon>
                              </a>
                              <a href="">
                                <iconify-icon icon="tabler:trash" class="text-xl text-gray-400"></iconify-icon>
                              </a>
                            </div>
                          </td>
                        </tr>

                        <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                          <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Lorem ipsum dolor sit amet
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                            <div class="flex">
                              <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                                  class="object-cover w-full h-full">
                              </div>
                              <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                                  class="object-cover w-full h-full">
                              </div>
                              <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                                  class="object-cover w-full h-full">
                              </div>
                              <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                                  class="object-cover w-full h-full">
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">17
                            Februari
                            2024</td>

                          <td class="px-6 py-4 text-xs whitespace-nowrap text-neutral-200">
                            <span class="px-3 py-1 bg-blue-600 rounded-md">Proses</span>
                          </td>
                          <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                            <div class="flex items-center">
                              <a href="{{ route('app.e-learning.meeting.edit') }}" wire:navigate class="me-2">
                                <iconify-icon icon="uil:edit" class="text-xl text-gray-400"></iconify-icon>
                              </a>
                              <a href="">
                                <iconify-icon icon="tabler:trash" class="text-xl text-gray-400"></iconify-icon>
                              </a>
                            </div>
                          </td>
                        </tr>

                        <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                          <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Lorem ipsum dolor sit amet
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                            <div class="flex">
                              <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                                  class="object-cover w-full h-full">
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">17
                            Februari
                            2024</td>

                          <td class="px-6 py-4 text-xs whitespace-nowrap text-neutral-200">
                            <span class="px-3 py-1 bg-gray-600 rounded-md">Tidak Ada</span>
                          </td>
                          <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                            <div class="flex items-center">
                              <a href="{{ route('app.e-learning.meeting.edit') }}" wire:navigate class="me-2">
                                <iconify-icon icon="uil:edit" class="text-xl text-gray-400"></iconify-icon>
                              </a>
                              <a href="">
                                <iconify-icon icon="tabler:trash" class="text-xl text-gray-400"></iconify-icon>
                              </a>
                            </div>
                          </td>
                        </tr>

                        @if (session()->has('addTask'))
                          <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                            <form action="">
                              <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                <input type="text" name="" id="" class="w-full p-3 bg-glass">
                              </td>
                              <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                <select name="assignee" id="assignee" class="w-full h-10 p-3 bg-glass">
                                  <option value="Irfan Yasin">Irfan Yasin</option>
                                  <option value="Dandy Ainul Yaqin">Dandy Ainul Yaqin</option>
                                  <option value="Fakhri Alauddin">Fakhri Alauddin</option>
                                </select>
                              </td>
                              <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                <input type="date" name="" id="" class="w-full p-3 bg-glass">
                              </td>

                              <td class="px-6 py-4 text-xs whitespace-nowrap text-neutral-200">
                                <select name="" id="" class="w-full p-3 bg-glass">
                                  <option value="">Tidak Ada</option>
                                  <option value="">Proses</option>
                                  <option value="">Selesai</option>
                                </select>
                              </td>
                              <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                <button class="flex items-center px-2 py-1 text-sm bg-white rounded-md"
                                  wire:click.prevent='save' type="button">Simpan
                                  <iconify-icon icon="material-symbols:save-outline"
                                    class="text-xl ms-2"></iconify-icon>
                                </button>
                              </td>
                            </form>
                          </tr>
                        @endif



                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{-- Task End --}}
          </div>
        </div>
      </div>


      <div class="mb-5 border border-transparent bg-glass hs-accordion hs-accordion-active:border-gray-200 rounded-xl"
        id="hs-active-bordered-heading-two">
        <button
          class="inline-flex items-center justify-between w-full px-5 py-4 font-semibold text-gray-800 hs-accordion-toggle hs-accordion-active:text-blue-600 gap-x-3 text-start hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400"
          aria-controls="hs-basic-active-bordered-collapse-two">
          Kepanitiaan
          <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5v14"></path>
          </svg>
          <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
          </svg>
        </button>

        <div id="hs-basic-active-bordered-collapse-two"
          class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
          aria-labelledby="hs-active-bordered-heading-one">
          <div class="px-5 pb-4">
            {{-- Task Start --}}
            <div class="flex flex-col">
              <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                  <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                      <thead>
                        <tr>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Nama</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Penerima Tugas</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Tenggat Waktu</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                            Status</th>
                          <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">
                            Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{-- Task End --}}
          </div>
        </div>
      </div>


    </div>
  </section>
  {{-- Section End --}}


</div>


@push('js-custom')
  <script>
    $(document).ready(function() {

      $("#assigneee").select2({

        placeholder: "Silahkan Pilih"

      });

    });
  </script>
@endpush
