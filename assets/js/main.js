import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';

 
// initialise Alpine
window.Alpine = Alpine
Alpine.start();


//------------------------ Splide Carousels -------------------------------//


// images gallery


document.addEventListener('DOMContentLoaded', function () {
   // Select all carousel elements with the class `images-carousel`
   const carousels = document.querySelectorAll('.images-carousel');
 
   if (carousels) {
     // Loop over each carousel and initialize Splide
     carousels.forEach((carousel) => {
       // Find custom arrows within the current carousel
       const prevArrow = carousel.querySelector('.custom-prev');
       const nextArrow = carousel.querySelector('.custom-next');
 
       // Initialize Splide with default arrows disabled
       const splide = new Splide(carousel, {
         type: 'loop',
         arrows: false, // Disable default arrows completely
         updateOnMove: true,
         gap: '1vw',
         padding: '7vw',
         focus: 'center',
         pagination: false,
         breakpoints: {
           767: {
             gap: '6vw',
             padding: '6vw',
           },
         },
       }).mount();
 
       // Add custom event listeners for the custom arrows
       if (prevArrow) {
         prevArrow.addEventListener('click', () => splide.go('<')); // Go to previous slide
       }
 
       if (nextArrow) {
         nextArrow.addEventListener('click', () => splide.go('>')); // Go to next slide
       }
     });
   }
 });
 
 
  

//------------------------  -------------------------------//

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


