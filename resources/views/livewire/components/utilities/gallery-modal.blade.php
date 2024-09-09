<div id="galleryModal" class="fixed inset-0 z-50 items-center hidden justify-center bg-black bg-opacity-50">
    <div class="max-w-3xl mx-auto">
      <div class="relative pb-9/16">
        <div id="adminControls" class="pb-2 flex flex-row hidden"> <!-- Set default to hidden -->
            <div class="hidden md:block">
                <a id="editLink" href="#" wire:navigate
                class="flex items-center px-5 py-3 text-sm font-semibold bg-white text-black bg-transparent rounded-md border border-[#9E9E9E] group transition-colors">Edit
                <iconify-icon icon="mingcute:arrow-right-line" class="text-xl ms-2 group-hover:text-black:"></iconify-icon></a>
            </div>
            <form wire:submit='delete' method="post" class="ml-2">
                @csrf
                <button class="flex items-center px-5 py-3 text-sm font-semibold bg-white text-black bg-transparent rounded-md border border-[#9E9E9E] group transition-colors" type="submit">Delete</button>
            </form>
        </div>
        <img id="modalImage" src="" alt="" class="inset-0 object-contain w-full h-full">
        <a id="modalLink" href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-300">
        </a>
      </div>
    </div>
  </div>

@push('js-custom')
<script>
    function openModal(imageSrc, imageAlt, Caption, id, isAdmin) {
      const modal = document.getElementById('galleryModal');
      const modalContent = modal.childNodes[1];
      const modalImage = modal.querySelector('#modalImage');
      const modalLink = modal.querySelector('#modalLink');
      const editLink = modal.querySelector('#editLink');
      const adminControls = modal.querySelector('#adminControls');
      const deleteForm = modal.querySelector('#deleteForm');

      modalImage.src = imageSrc;
      modalImage.alt = imageAlt;
      modalLink.href = imageSrc;
      modalLink.innerText = Caption;

      editLink.href = `/app/content/gallery/${id}/edit`;

      if (isAdmin) {
        adminControls.classList.remove('hidden');
      } else {
        adminControls.classList.add('hidden');
      }

      modal.classList.remove('hidden');
      modal.classList.add('flex');

      modal.addEventListener('click', (event) => {
        if (!modalContent.contains(event.target)) {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        }
      });
      @this.set('selectedId', id, false);
    }
  </script>
@endpush
