<div>
  <header class="flex items-center justify-between my-7">
    <h2 class="text-2xl font-bold text-white md:text-3xl">Daftar Pengumpulan</h2>
  </header>

  <section class="p-5 mb-7 rounded-lg text-white bg-glass">
    <h3 class="text-2xl font-semibold mb-4">Terkumpul <span class="text-gray-400">(3)</span></h3>
    
    @for ($i = 0; $i < 3; $i++)
      <div class="flex justify-between gap-4 bg-[#27292C] rounded-md p-2 mb-4">
        <div class="flex items-center">
          <img src="https://placehold.co/500" alt="Avatar" class="w-10 h-100 object-cover rounded-full me-4">
          <p>Deo Farady Santoso</p>
        </div>
        <div>
          <a href="{{ route('app.e-learning.task') }}" wire:navigate
            class="flex items-center px-5 py-3 text-sm font-semibold text-white bg-[#3b3e43] hover:text-black hover:bg-white rounded-md">
            Lihat Detail
          </a>
        </div>
      </div>    
    @endfor
  </section>

  <section class="p-5 mb-7 rounded-lg text-white bg-glass">
    <h3 class="text-2xl font-semibold mb-4">Belum Terkumpul <span class="text-gray-400">(3)</span></h3>
    
    @for ($i = 0; $i < 3; $i++)
      <div class="flex justify-between gap-4 bg-[#27292C] rounded-md p-2 mb-4">
        <div class="flex items-center">
          <img src="https://placehold.co/500" alt="Avatar" class="w-10 h-100 object-cover rounded-full me-4">
          <p>Deo Farady Santoso</p>
        </div>
      </div>    
    @endfor
  </section>
</div>
