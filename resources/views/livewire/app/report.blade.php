<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Laporan</h2>

    @role(['admin|super-admin'])
      <div class="hidden md:block">
        <a href="{{ route('app.report.create') }}" wire:navigate 
          class="flex items-center px-5 py-3 text-sm font-semibold text-black bg-white rounded-md">Buat Laporan
          <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2"></iconify-icon>
        </a>
      </div>

      <div class="block md:hidden">
        <a href="{{ route('app.report.create') }}" wire:navigate
          class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-black bg-white rounded-full">
            <iconify-icon icon="majesticons:plus-line" class="text-2xl"></iconify-icon>
        </a>
      </div>
    @endrole
  </header>
	
	<section class="mb-10">
		<div class="p-5 mb-4 rounded-lg bg-glass">
			<div>
				<div class="grid grid-cols-1 gap-4 mb-3 lg:grid-cols-2">
					<div class="mb-3">
						<label for="presence" class="block mb-2 font-light text-white">Jenis Laporan</label>
						<select name="type" id="type" class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
							<option value="modul">Modul</option>
							<option value="offline">Offline</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="date-time" class="block mb-2 font-light text-white">Tanggal</label>
						<input type="datetime-local" name="date-time" id="date-time"
							class="w-full px-3 py-3 text-white rounded-lg bg-lightGray">
					</div>
				</div>

				<div class="mb-3">
					<div class="flex flex-col">
						<div class="-m-1.5 overflow-x-auto">
							<div class="p-1.5 min-w-full inline-block align-middle">
								<div class="overflow-hidden rounded-md">
									<table class="min-w-full bg-lightGray">
										<thead class="bg-[#43474C]">
											<tr>
												<th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">No</th>
												<th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">tanggal</th>
												<th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">Jenis Laporan</th>
												<th scope="col" class="px-6 py-3 text-sm font-medium text-white uppercase text-start">Action</th>
											</tr>
										</thead>
										<tbody class="">
											@for ($i = 1; $i < 4; $i++)
												<tr>
													<td class="px-6 py-4 text-base font-medium text-white">{{ $i }}</td>
													<td class="px-6 py-4 text-base font-medium text-white">Senin, 28 Maret 2024</td>
													<td class="px-6 py-4 text-base font-medium text-white">Modul {{ $i }}</td>
													<td class="px-6 py-4 text-base font-medium text-white flex items-center gap-4">
														<button type="button" class="flex gap-1 rounded-md items-center text-base font-medium border px-2 md:px-4 py-1.5">
															<iconify-icon icon="majesticons:edit-pen-2-line" class="text-2xl"></iconify-icon>
														</button>
														<button type="button" class="flex gap-1 rounded-md items-center text-base font-medium border px-2 md:px-4 py-1">
															<iconify-icon icon="majesticons:delete-bin-line" class="text-2xl"></iconify-icon>
														</button>
														<button type="button" class="flex gap-1 rounded-md items-center text-base font-medium border px-2 md:px-4 py-1.5">
															Lihat Detail
														</button>
													</td>
												</tr>
											@endfor
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </section>
</div>
