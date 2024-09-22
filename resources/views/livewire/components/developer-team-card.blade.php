<div class="mx-2 rounded-xl bg-[#0F0F0F] p-5">
  <div class="w-64 h-64 mx-auto overflow-hidden">
    <img src="{{ asset('assets/images/team/' . $image) }}" alt="{{ $name }}" class="object-cover w-full h-full">
  </div>
  <div class="mt-5 text-center text-white">
    <h2 class="text-lg font-semibold">{{ $name }}</h2>
    <p class="font-light text-md">{{ $role }}</p>
  </div>
  <div class="flex items-center justify-center gap-2 mt-5">
    <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo, ' . $name) }}" target="_blank">
      <iconify-icon icon="ic:round-whatsapp" class="text-[#585858] hover:text-green-600" height="23"></iconify-icon>
    </a>
    <a href="https://github.com/{{ $github }}" target="_blank">
      <iconify-icon icon="mdi:github" class="text-[#585858] hover:text-white" height="23"></iconify-icon>
    </a>
    <a href="https://www.linkedin.com/in/{{ $linkedin }}" target="_blank">
      <iconify-icon icon="mdi:linkedin" class="text-[#585858] hover:text-blue-400" height="23"></iconify-icon>
    </a>
  </div>
</div>
