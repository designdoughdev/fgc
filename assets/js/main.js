// import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';
import 'animate.css';
import AOS from 'aos';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";





// Initialize AOS
document.addEventListener("DOMContentLoaded", () => {
   AOS.init({
     duration: 1200,
     once: true,
   });
 });



 // Add delay to each AOS item

const wayfinderRows = document.querySelectorAll('.wayfinder-row');


if (wayfinderRows){
  wayfinderRows.forEach((item, index) => {
    const delay = index * 200; 
    item.setAttribute('data-aos-delay', delay);
 });

}




 
// initialise Alpine
// window.Alpine = Alpine
// Alpine.start();

//------------------------ GSAP animations -------------------------------//

gsap.registerPlugin(ScrollTrigger);

// timeline marker animation

gsap.registerPlugin(ScrollTrigger);
let tl = gsap.timeline({
    scrollTrigger: {
        trigger: ".scroll-container", // this is the parent container, which will trigger the animation
        start: "top center", // trigger when the TOP of the trigger element (above) enters middle of viewport
        end: () => `bottom-=${document.querySelector(".timeline_scroll_icon").offsetHeight} center`, // Adjust end dynamically        
        // scrub: true, // stylistic lagging
        // markers: true,
        pin: '.timeline_scroll_icon',
    },
});

// Function to refresh ScrollTrigger after accordion changes
function refreshScrollTrigger() {
  ScrollTrigger.refresh();
}

//------------------------ Mobile menu -------------------------------//


document.addEventListener("DOMContentLoaded", () => {
  const mobileNav = document.querySelector('.mobile-nav');
  const hamburgerBtn = document.querySelector('.hamburger-btn');
  const closeBtn = document.querySelector('.mobile-menu-close-btn');

  // Open menu
  hamburgerBtn.addEventListener('click', () => {
      mobileNav.classList.toggle('menu-open');

      if(mobileNav.classList.contains('menu-open')){
        document.body.style.overflow = 'hidden'; // Prevent scrolling

      }else{
        document.body.style.overflow = ''; // Prevent scrolling

      }
      
  });


});

document.addEventListener("DOMContentLoaded", () => {
  const rootMenuItems = document.querySelectorAll(".root-menu-item-button");

  rootMenuItems.forEach(item => {
      item.addEventListener("click", () => {
          // Toggle active class to show/hide sub-menu
          item.classList.toggle("active");
      });
  });
});

//------------------------ filter menu -------------------------------//

document.addEventListener("DOMContentLoaded", () => {
  const filterMenu = document.querySelector('.overlay-filter-menu');
  const filterBtn = document.querySelector('.filter-btn');
  // const closeBtn = document.querySelector('.mobile-menu-close-btn');

  // Open menu
  if(filterBtn){
    filterBtn.addEventListener('click', () => {
      filterMenu.classList.add('menu-open');

      if(filterMenu.classList.contains('menu-open')){
        document.body.style.overflow = 'hidden'; // Prevent scrolling

      }else{
        document.body.style.overflow = ''; // Prevent scrolling

      }
      
  });

  }



});



//------------------------ Mobile menu -------------------------------//

document.addEventListener("DOMContentLoaded", () => {
  const mobileNav = document.querySelector('.mobile-nav');
  const hamburgerBtn = document.querySelector('.hamburger-btn');
  const closeBtn = document.querySelector('.mobile-menu-close-btn');

  // Open menu
  hamburgerBtn.addEventListener('click', () => {
      mobileNav.classList.toggle('open');

      if(mobileNav.classList.contains('open')){
        document.body.style.overflow = 'hidden'; // Prevent scrolling

      }else{
        document.body.style.overflow = ''; 

      }
      
  });


});

document.addEventListener("DOMContentLoaded", () => {
  const rootMenuItems = document.querySelectorAll(".root-menu-item");

  rootMenuItems.forEach(item => {
      item.addEventListener("click", (e) => {
        
          // Toggle active class to show/hide sub-menu
          e.target.classList.toggle("active");
      });
  });
});

//------------------------ Filter overlay menu -------------------------------//

document.addEventListener("DOMContentLoaded", () => {
  const filterMenu = document.querySelector('.overlay-filter-menu');
  const filterBtn = document.querySelector('.filter-btn');
  const closeBtn = document.querySelector('.filter-overlay-close-btn');
  // const closeBtn = document.querySelector('.mobile-menu-close-btn');

  // Open menu

  if(filterBtn){
    filterBtn.addEventListener('click', () => {
      filterMenu.classList.add('menu-open');

    
        document.body.style.overflow = 'hidden'; // Prevent scrolling
  });

  }


    // Close Menu

    if(closeBtn){
      closeBtn.addEventListener('click', () => {
        filterMenu.classList.remove('menu-open');
        document.body.style.overflow = ''; 
  
        
    });
      
    }






});






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
         padding: '10vw',
         focus: 'center',
         pagination: false,
         heightRatio: 0.5,
         breakpoints: {
           767: {
             gap: '7vw',
             padding: '7vw',
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



// single large tile carousel


document.addEventListener('DOMContentLoaded', function () {
  // Select all carousel elements with the class `images-carousel`
  const carousels = document.querySelectorAll('.single-tile-carousel');

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
        padding: { left: '6vw', right: '30vw' },
        focus: 'center',
        pagination: false,
        breakpoints: {
          767: {
            gap: '7vw',
            padding: '7vw',
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
         padding: { left: '12vw', right: '12vw' }, 
         focus: 'center',
         pagination: false,
         breakpoints: {
          
           767: {
             gap: '6vw',
             padding: '6vw',
             perPage: 1,
           },
           1200: {
            gap: '3vw',
            padding: '6vw',
            perPage: 2,
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
         gap: '7vw',  
         padding: { left: '6vw', right: '6vw' },  
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


// text dynamic carousel
document.addEventListener('DOMContentLoaded', function () {
	console.log('loaded text carousel');
	// Initialize Splide carousel with fade transition
	textDynamicCarousels = document.querySelectorAll('.text_dynamic_carousel');
	console.log(textDynamicCarousels);
	if (textDynamicCarousels) {
		textDynamicCarousels.forEach((c) => {
			textDynSplide = new Splide(c, {
				type: 'fade',
				perPage: 1,
				perMove: 1,
				pagination: true,
				arrows: false,
			}).mount();

			// Handle thumbnail navigation
			var thumbnails = document.querySelectorAll('.thumbnail_nav .thumbnail');

			thumbnails.forEach(function (thumbnail) {
				thumbnail.addEventListener('click', function () {
					var index = parseInt(thumbnail.getAttribute('data-index'));
					textDynSplide.go(index); // Navigate to the corresponding slide
					// Remove 'active' class from all other thumbnails
					thumbnails.forEach(function (thumb) {
						thumb.classList.remove('active');
					});
					thumbnail.classList.add('active');
				});
			});
		});
	}
});

document.addEventListener('DOMContentLoaded', function () {
  // Select all carousel elements with the class `images-carousel`
  const carousels = document.querySelectorAll('.info-card-carousel');

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
        perPage: 1,
        padding: { left: '3vw', right: '3vw' }, 
        gap: '6vw',
        focus: 'center',
        pagination: true,

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

const headerMenu = document.querySelector('.main-header-centre');

if(headerMenu){

   document.addEventListener('mouseover', (e)=> {
      
      const headerBar = document.querySelector('.header-bar');
      const actionNavContainer = document.querySelector('.action-nav-container');
      const actionNav = document.querySelector('.action-nav');
      const heroCont = document.querySelector('.hero-container');
      const headerHeight = headerBar.offsetHeight; // Get height of header bar

      // set 'top' property of action nav conatiner based on header bar height 

      
      actionNavContainer.style.top = `${headerHeight}px`; // Set top position
      actionNavContainer.style.display = `block`; 

      //  set hero section padding to header height
      
      if (heroCont) {

        heroCont.style.paddingTop = `${headerHeight}px`; // Set padding top 

        window.addEventListener('resize', ()=>{
          heroCont.style.paddingTop = `${headerHeight}px`; // Set padding top 

        });   

      }




      // display menu block
      if(headerMenu.contains(e.target)){
         actionNav.classList.add('show');
      }
      // remove menu block
      if(!actionNav.contains(e.target) && !headerMenu.contains(e.target)){
        
         actionNav.classList.remove('show');
         actionNavContainer.style.display = `none`; 
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

document.addEventListener("DOMContentLoaded", function () {
  const wayfinderRows = document.querySelectorAll(".wayfinder-row");

  const slideInOnScroll = () => {
    wayfinderRows.forEach((row) => {
      const rect = row.getBoundingClientRect();
      if (rect.top < window.innerHeight && rect.bottom >= 0) {
        row.classList.add("animate-slide-in");
      }
    });
  };

  window.addEventListener("scroll", slideInOnScroll);
  slideInOnScroll(); // Check on load as well
});


// accordion // todo: make this smoother!
//
const accordions = document.getElementsByClassName('accord_wrap');
for (let i = 0; i < accordions.length; i++) {
	accordions[i].addEventListener('click', function () {
		this.classList.toggle('active');
		// Find the accordion_down_arrow within the clicked accord_wrap
		// this.querySelector('.accordion_down_arrow').classList.toggle('active');

        // resfresh scroll trigger for GSAP animations
        setTimeout(refreshScrollTrigger, 500); // Delay slightly to wait for height transition

      let label = this.querySelector('span');

      if($label){
        label.textContent = 'Close Info';
      }

      

      
        

		// Close all other acc heads and arrows
		for (let j = 0; j < accordions.length; j++) {
			if (i !== j) {
				accordions[j].classList.remove('active');
				// const otherArrow = accordions[j].querySelector('.accordion_down_arrow');
				// if (otherArrow) {
				// 	otherArrow.classList.remove('active');
				// }
        let buttonLabel = accordions[j].querySelector('span');
        if($buttonLabel){
          buttonLabel.textContent = 'Learn more'

        }
        
       
			}
		}
    

    


	});
}


// public body post filtering

document.addEventListener('DOMContentLoaded', () => {
  const filterButtons = document.querySelectorAll('.filter-button');
  const taxonomyGroups = document.querySelectorAll('.taxonomy-group');

  filterButtons.forEach(button => {
      button.addEventListener('click', () => {
          const filter = button.getAttribute('data-filter');

          // Update the active class on buttons
          filterButtons.forEach(btn => btn.classList.remove('active'));
          button.classList.add('active');

          // Filter taxonomy groups
          taxonomyGroups.forEach(group => {
              const term = group.getAttribute('data-term');

              if (filter === 'all' || term === filter) {
                  group.style.display = 'block';
              } else {
                  group.style.display = 'none';
              }
          });
      });
  });
});


// news filtering


document.addEventListener('DOMContentLoaded', () => {
  // Find all filter bar containers
  const filterBarContainers = document.querySelectorAll('.filter-bar-container');
  const postsContainer = document.querySelector('.posts-container'); // Shared posts container
  const overlayFilterMenu = document.querySelector('.overlay-filter-menu'); // Overlay filter menu

  filterBarContainers.forEach((container) => {
    // Handle dropdown interactions within the scope of this container
    const dropdowns = container.querySelectorAll('.custom-dropdown');

    dropdowns.forEach((dropdown) => {
      const toggle = dropdown.querySelector('.dropdown-toggle');
      const menu = dropdown.querySelector('.dropdown-menu');
      const hiddenInput = dropdown.querySelector('input[type="hidden"]');
    
      toggle.addEventListener('click', () => {
        const expanded = toggle.getAttribute('aria-expanded') === 'true';
    
        // Close all other dropdowns
        dropdowns.forEach((otherDropdown) => {
          const otherToggle = otherDropdown.querySelector('.dropdown-toggle');
          const otherMenu = otherDropdown.querySelector('.dropdown-menu');
    
          if (otherDropdown !== dropdown) {
            otherToggle.setAttribute('aria-expanded', 'false');
            otherToggle.classList.remove('active');
            otherMenu.classList.remove('visible');
          }
        });
    
        // Toggle current dropdown
        toggle.setAttribute('aria-expanded', !expanded);
        toggle.classList.toggle('active');
        menu.classList.toggle('visible');
      });

      menu.addEventListener('click', (event) => {
        if (event.target.tagName === 'LI') {
          const value = event.target.getAttribute('data-value');
          const text = event.target.textContent;

          hiddenInput.value = value; // Update hidden input
          toggle.textContent = text; // Update toggle text
          toggle.classList.remove('active');
          toggle.setAttribute('aria-expanded', 'false');
          menu.classList.remove('visible');
        }
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', (event) => {
        if (!dropdown.contains(event.target)) {
          toggle.setAttribute('aria-expanded', 'false');
          menu.classList.remove('visible');
        }
      });
    });

    // Handle form submission
    const form = container.querySelector('form');

    if (form) {
      form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(form);

        fetch('/wp-admin/admin-ajax.php?action=filter_posts', {
          method: 'POST',
          body: new URLSearchParams(formData), // Serialize form data
        })
          .then((response) => response.text())
          .then((html) => {
            postsContainer.innerHTML = html; // Replace posts with filtered results

            // Remove 'menu-open' class from overlay filter menu
            if (overlayFilterMenu) {
              overlayFilterMenu.classList.remove('menu-open');
              document.body.style.overflow = '';
            }
          })
          .catch((error) => {
            console.error('Error:', error);
            postsContainer.innerHTML = '<p>Error loading posts. Please try again.</p>';
          });
      });
    }

    // Handle sort buttons within the scope of this container
    const sortButtons = container.querySelectorAll('.sort-container button');

    sortButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const sortValue = button.getAttribute('data-sort');
        const sortInput = form.querySelector('input[name="sort"]') || document.createElement('input');
        
        sortInput.type = 'hidden';
        sortInput.name = 'sort';
        sortInput.value = sortValue;

        if (!form.contains(sortInput)) {
          form.appendChild(sortInput); // Add sort input if not already present
        }

        // Toggle active class between buttons
        sortButtons.forEach((btn) => {
          btn.classList.remove('active'); // Remove 'active' from all buttons
        });
        button.classList.add('active'); // Add 'active' to the clicked button

        form.requestSubmit(); // Programmatically submit the form
      });
    });
  });
});




// search form dropdowns

document.addEventListener('DOMContentLoaded', () => {
  const searchForms = document.querySelectorAll('.big-search-form');

  searchForms.forEach((form) => {
      const dropdownToggle = form.querySelector('.dropdown-toggle');
      const dropdownMenu = form.querySelector('.dropdown-menu');
      const hiddenInput = form.querySelector('#post_type_input');

      // Toggle dropdown visibility
      dropdownToggle.addEventListener('click', (event) => {
          event.preventDefault();
          console.log('clicked');
          const isExpanded = dropdownToggle.getAttribute('aria-expanded') === 'true';

          // Toggle aria attributes and menu visibility
          dropdownToggle.setAttribute('aria-expanded', !isExpanded);
          dropdownMenu.setAttribute('aria-hidden', isExpanded ? 'true' : 'false');
      });

      // Handle option selection
      dropdownMenu.addEventListener('click', (event) => {
          if (event.target.matches('[role="option"]')) {
              const value = event.target.dataset.value;
              const text = event.target.textContent.trim();

              // Update button text and hidden input
              dropdownToggle.textContent = text;
              hiddenInput.value = value;

              // Close the dropdown
              dropdownToggle.setAttribute('aria-expanded', 'false');
              dropdownMenu.setAttribute('aria-hidden', 'true');
          }
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', (event) => {
          if (!form.contains(event.target)) {
              dropdownToggle.setAttribute('aria-expanded', 'false');
              dropdownMenu.setAttribute('aria-hidden', 'true');
          }
      });
  });
});

//------------------------ Video flex play buttons -------------------------------//

document.addEventListener("DOMContentLoaded", function() {
  videoFlexes = document.querySelectorAll(".video-wrapper");

  if (videoFlexes){

    videoFlexes.forEach(wrapper => {
      let video = wrapper.querySelector("video");
      let playButton = wrapper.querySelector(".play-button");

      playButton.addEventListener("click", function() {
          if (video.paused) {
              video.play();
              playButton.classList.add("hidden");
          }
      });

      video.addEventListener("click", function() {
          if (!video.paused) {
              video.pause();
              playButton.classList.remove("hidden");
          }
      });
  });

  }


});













