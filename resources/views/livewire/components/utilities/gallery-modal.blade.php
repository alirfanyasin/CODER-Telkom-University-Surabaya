<div class="flex flex-wrap gap-4">
  <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105"
    onclick="openModal('assets/images/img-1.png', 'Image 1')">
    <img src="assets/images/img-1.png" alt="Image 1" class="object-cover w-full h-full">
  </div>
  <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105"
    onclick="openModal('assets/images/img-2.png', 'Image 2')">
    <img src="assets/images/img-2.png" alt="Image 2" class="object-cover w-full h-full">
  </div>
  <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105"
    onclick="openModal('assets/images/img-3.png', 'Image 3')">
    <img src="assets/images/img-3.png" alt="Image 3" class="object-cover w-full h-full">
  </div>
  <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105"
    onclick="openModal('assets/images/img-2.png', 'Image 4')">
    <img src="assets/images/img-2.png" alt="Image 4" class="object-cover w-full h-full">
  </div>
  <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105"
    onclick="openModal('assets/images/img-1.png', 'Image 5')">
    <img src="assets/images/img-1.png" alt="Image 5" class="object-cover w-full h-full">
  </div>
  <div class="rounded-xl grow h-72 overflow-hidden transition-transform hover:scale-105"
    onclick="openModal('assets/images/img-3.png', 'Image 6')">
    <img src="assets/images/img-3.png" alt="Image 6" class="object-cover w-full h-full">
  </div>
</div>

{{-- Modal --}}
<div id="galleryModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
  <div class="max-w-3xl mx-auto">
    <div class="relative pb-9/16">
      <img id="modalImage" src="" alt="" class="inset-0 object-contain w-full h-full">
      <a id="modalLink" href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-300">
        Open in new tab
      </a>
    </div>
  </div>
</div>

@push('js-custom')
  <script>
    function openModal(imageSrc, imageAlt) {
      const modal = document.getElementById('galleryModal');
      const modalContent = modal.childNodes[1];
      const modalImage = modal.querySelector('#modalImage');
      const modalLink = modal.querySelector('#modalLink');
      
      modalImage.src = imageSrc;
      modalImage.alt = imageAlt;
      modalLink.href = imageSrc;
      
      modal.classList.remove('hidden');
      modal.addEventListener('click', (event) => {
        if (!modalContent.contains(event.target)) {
          modal.classList.add('hidden');
        }
      });
    }
  </script>
@endpush
