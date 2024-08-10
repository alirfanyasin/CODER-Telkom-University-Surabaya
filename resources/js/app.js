import './bootstrap';
import 'preline'


document.addEventListener('livewire:navigated', () => {
  window.HSStaticMethods.autoInit();

  var navClass = document.querySelector('.navbar-fixed');


  window.onscroll = function () {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 50) {
      navClass.classList.add('navbar-solid');
      navClass.classList.remove('bg-transparent');
    } else {
      navClass.classList.remove('navbar-solid');
    }
  }

  // Ambil elemen tombol dan div
  const btnChat = document.getElementById('btn-chat');
  const btnClose = document.getElementById('btn-close');
  const chatDiv = document.querySelector('.chat-div');

  // Fungsi untuk toggle div saat btnChat diklik
  btnChat.addEventListener('click', function() {
      // Toggle kelas "opacity-100" dan "opacity-0"
      chatDiv.classList.toggle('opacity-100');
      chatDiv.classList.toggle('opacity-0');

      // Toggle display block dan none
      if (chatDiv.style.display === 'block') {
          chatDiv.style.display = 'none';
      } else {
          chatDiv.style.display = 'block';
      }
  });

  // Fungsi untuk menutup chat-div saat btnClose diklik
  btnClose.addEventListener('click', function() {
      // Ubah visibility atau sembunyikan elemen
      chatDiv.classList.remove('opacity-100');
      chatDiv.classList.add('opacity-0');
      chatDiv.style.display = 'none';
  });
});