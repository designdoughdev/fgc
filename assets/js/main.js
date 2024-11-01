import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';
 
// initialise Alpine
window.Alpine = Alpine
Alpine.start();

// header menu

const headerMenu = document.querySelector('.header-menu-btns');

if(headerMenu){

   document.addEventListener('mouseover', (e)=> {
      
      const mainHeader = document.querySelector('main-header');
      const actionNav = document.querySelector('.action-nav');

      if(headerMenu.contains(e.target)){
         actionNav.classList.add('show');
      }

      if(!actionNav.contains(e.target) && !headerMenu.contains(e.target)){
         actionNav.classList.remove('show');
      }

     

      



   })

   // headerMenu.addEventListener('mouseover', ()=>{
   //  console.log('hover')
   //  document.querySelector('header').classList.add('header-menu-show')
   // })
}


