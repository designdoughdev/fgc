import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';
 
// initialise Alpine
window.Alpine = Alpine
Alpine.start();

// header menu

const headerMenu = document.querySelector('.header-menu-btns');

if(headerMenu){

   document.addEventListener('mouseover', (e)=> {
      

      const actionNav = document.querySelector('.menu-content');

      if(headerMenu.contains(e.target) || actionNav.contains(e.target)){
         actionNav.classList.add('show');
      }else{
         actionNav.classList.remove('show');

      }
   })

   // headerMenu.addEventListener('mouseover', ()=>{
   //  console.log('hover')
   //  document.querySelector('header').classList.add('header-menu-show')
   // })
}


