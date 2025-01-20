<?php
$row = get_row_index() - 0;
$small_title = get_sub_field('small_title');
$big_title = get_sub_field('big_title');



?>
<section class="section_images row-<?php echo $row;
                                    ?>" data-aos="fade-left" data-aos-anchor-placement="top-bottom">

    <div class="splide images-carousel container_big section-wrapper" aria-label="Image Gallery">

        <div class="text-container">
            <?php if ($small_title): ?>
            <h2 class="title-tag"><?php echo $small_title; ?></h2>
            <?php endif; ?>
            <?php if ($big_title): ?>
            <h3 class="heading h1"><?php echo $big_title; ?></h3>
            <?php endif; ?>
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
                <?php while (have_rows('images')) : the_row(); ?>

                <?php $image = get_sub_field('image'); ?>

                <li class="splide__slide relative"><img src="<?php echo $image['url']; ?>" alt="">
                    <p class="caption light-navy">Lorem ipsum dolor sit amet,</p>
                </li>
                <?php endwhile; ?>


            </ul>
        </div>

    </div>




</section>