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

 // post feed carousel


document.addEventListener('DOMContentLoaded', function () {
   // Select all carousel elements with the class `images-carousel`
   const carousels = document.querySelectorAll('.post-feed-carousel');
 
   if (carousels) {
     // Loop over each carousel and initialize Splide
     carousels.forEach((carousel) => {
       // Find custom arrows within the current carousel
       const prevArrow = carousel.querySelector('.custom-prev');
       const nextArrow = carousel.querySelector('.custom-next');
 
       // Initialize Splide with default arrows disabled
       const splide = new Splide(carousel, {
         type: 'loop',
         arrows: false,
         updateOnMove: true,
         perPage: 3,
         padding: '7vw',
         focus: 'center',
         pagination: false,
         breakpoints: {
           767: {
             gap: '6vw',
             padding: '6vw',
             perPage: 1,
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


 // press releases carousel


document.addEventListener('DOMContentLoaded', function () {
   // Select all carousel elements with the class `images-carousel`
   const carousels = document.querySelectorAll('.press-releases-carousel');
 
   if (carousels) {
     // Loop over each carousel and initialize Splide
     carousels.forEach((carousel) => {
       // Find custom arrows within the current carousel
       const prevArrow = carousel.querySelector('.custom-prev');
       const nextArrow = carousel.querySelector('.custom-next');
 
       // Initialize Splide with default arrows disabled
       const splide = new Splide(carousel, {
         type: 'loop',        
         perPage: 1,           
         perMove: 1,          
         gap: '6vw',  
         padding: '6vw',    
         pagination: false,    
         arrows: false,       
         direction: 'ltr',    
         height: 'fit-content',      
         autoplay: false 

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


      // display menu block
      if(headerMenu.contains(e.target)){
         actionNav.classList.add('show');
      }
      // remove menu block
      if(!actionNav.contains(e.target) && !headerMenu.contains(e.target)){
         actionNav.classList.remove('show');
      }

      if(e.target.classList.contains('btn-menu')){
         const menuBtns = document.querySelectorAll('.btn-menu')
         console.log(menuBtns);

         menuBtns.forEach((i)=>{
            if(i.value == e.target.value){
               const menuPanels = document.querySelectorAll('.menu-content');

               menuPanels.forEach((j)=> {
                  if (j.classList.contains(`${i.value}-content`)){
                     j.classList.add('show');

                  }else{
                     j.classList.remove('show');
                  }
               })
             
            }
         })

      }

     

      



   })

   // headerMenu.addEventListener('mouseover', ()=>{
   //  console.log('hover')
   //  document.querySelector('header').classList.add('header-menu-show')
   // })
}


