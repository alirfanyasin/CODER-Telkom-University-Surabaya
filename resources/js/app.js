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
});