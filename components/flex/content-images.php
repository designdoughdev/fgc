<?php
// $row = get_row_index() - 0;
// $padding = get_sub_field('padding'); 
// $layout = get_sub_field('layout'); 
// // count rows in images
// $slides_to_show = get_sub_field('slides_to_show');
// $images = get_sub_field('images', $post->ID);
// $full_width = get_sub_field('full_width');
// $portrait = get_sub_field('make_portrait');
// $remove_border_radius = get_sub_field('remove_border_radius');
// $background = get_sub_field('background');
// $og_dimensions = get_sub_field('og_dimensions');

// if($images) { 
// $rows = count($images);
// }

?>
<section class="section_images row-<?php // echo $row; 
                                    ?>">

    <div class="splide images-carousel container section-wrapper" aria-label="Splide Basic HTML Example">

        <div class="text-container">
            <p class="title-tag">In action</p>
            <h3 class="heading h1">The moments that matter</h3>
            <div class="button-container">
                <button class="splide__arrow custom-prev btn-prev" aria-label="Previous slide">
                    Previous
                </button>
                <button class="splide__arrow custom-next btn-next" aria-label="Next slide">
                    Next
                </button>
            </div>


        </div>

        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide relative"><img src="https://picsum.photos/2000/1333" alt="">
                    <p class="caption h5 light-navy">Lorem ipsum dolor sit amet,</p>
                </li>
                <li class="splide__slide"><img src="https://picsum.photos/2000/1333" alt="">
                    <p class="caption h5 light-mint">Lorem ipsum dolor sit amet,</p>
                </li>
                <li class="splide__slide"><img src="https://picsum.photos/2000/1333" alt="">
                    <p class="caption h5 light-sky">Lorem ipsum dolor sit amet,</p>
                </li>
            </ul>
        </div>
    </div>




</section>