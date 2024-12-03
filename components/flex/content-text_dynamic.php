<section class="section_text_dynamic">
    <div class="container-wrapper">
        <div class="section-wrapper">
            <div class="section-content">


                <!-- Thumbnails or Navigation for Clickable Titles -->
                <div class="thumbnail_nav">
                    <!-- repeater -->
                    <?php if (have_rows('content_rows')) : ?>
                        <?php $index = 0; ?>
                        <?php while (have_rows('content_rows')) : the_row(); ?>

                            <?php $slide_title = get_sub_field('slide_title'); ?>

                            <button class="thumbnail <?php if ($index == 0) { ?>active<?php } ?>"
                                data-index="<?php echo $index; ?>"><?php echo $slide_title; ?></button>
                            <?php $index++; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>



                <div class="splide text_dynamic_carousel">
                    <div class="splide__track">
                        <div class="splide__list">
                            <?php if (have_rows('content_rows')) : ?>
                                <?php while (have_rows('content_rows')) : the_row(); ?>
                                    <?php
                                    // get slide text body
                                    $text_body = get_sub_field('text_body');
                                    ?>
                                    <div class="splide__slide">

                                        <div class="text_body_wrap">
                                            <p class="slider-text-body"><?php echo $text_body; ?></p>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>







    </div>
</section>