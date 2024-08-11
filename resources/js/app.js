import './bootstrap';
import 'preline'
import './shortcut';




document.addEventListener('livewire:navigated', (event) => {
  window.HSStaticMethods.autoInit();
  console.log('navigated')

  var navClass = document.querySelector('.navbar-fixed');


  window.onscroll = function () {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 50) {
      navClass.classList.add('navbar-solid');
      navClass.classList.remove('bg-transparent');
    } else {
      navClass.classList.remove('navbar-solid');
    }
  }

  var chatDiv = document.querySelector('.chat-div');
  var btnChat = document.getElementById('btn-chat');
  var btnClose = document.getElementById('btn-close');

  // Load chat state from localStorage
  if (localStorage.getItem('chatVisible') === 'true') {
      chatDiv.classList.add('opacity-100');
      chatDiv.classList.remove('opacity-0');
      chatDiv.style.display = 'block';
  } else {
      chatDiv.classList.remove('opacity-100');
      chatDiv.classList.add('opacity-0');
      chatDiv.style.display = 'none';
  }

  // Handle button click
  btnChat.addEventListener('click', function () {
      if (chatDiv.style.display === 'block') {
          chatDiv.classList.remove('opacity-100');
          chatDiv.classList.add('opacity-0');
          chatDiv.style.display = 'none';
          localStorage.setItem('chatVisible', 'false');
      } else {
          chatDiv.classList.add('opacity-100');
          chatDiv.classList.remove('opacity-0');
          chatDiv.style.display = 'block';
          localStorage.setItem('chatVisible', 'true');
      }
  });

  btnClose.addEventListener('click', function () {
      chatDiv.classList.remove('opacity-100');
      chatDiv.classList.add('opacity-0');
      chatDiv.style.display = 'none';
      localStorage.setItem('chatVisible', 'false');
  });
  if (localStorage.getItem('chatVisible') === 'true') {
    var chatDiv = document.querySelector('.chat-div');
    chatDiv.classList.add('opacity-100');
    chatDiv.classList.remove('opacity-0');
    chatDiv.style.display = 'block';
  }

});

