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
                <?php $colourSchemes = ['blue', 'yellow', 'mint']; ?>

                <?php while (have_rows('images')) : the_row(); ?>

                <?php $image = get_sub_field('image'); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php $link_text = get_sub_field('link_text'); ?>

                <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>
                

                <li class="splide__slide relative image-gallery-slide <?php echo $colourScheme; ?>-scheme"><img src="<?php echo $image['url']; ?>" alt="">
                    
                    <?php if($link): ?>
                        <div class="caption">
                            <?php if ($link_text) : ?>
                                <p><?php echo $link_text?></p>
                            <?php endif; ?>
                            <a class="btn-vtwo" href="<?php echo esc_url($link['url']); ?>"
                            target="<?php echo esc_attr($link['target']); ?>" aria-label="Read more about <?php echo esc_html($link['title']); ?>">Read more<div class="btn-arrow-container"></div></a>
                        </div>
                 
                    <?php elseif($image['caption']): ?>
                        <p class="caption"><?php echo $image['caption']; ?></p>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>


            </ul>
        </div>

    </div>




</section>