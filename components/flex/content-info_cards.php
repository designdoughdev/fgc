<?php
$row = get_row_index() - 0;
$add_background = get_sub_field('add_background');
$smallTitle = get_sub_field('small_title');
$bigTitle = get_sub_field('big_title');
$body = get_sub_field('body');
$style = get_sub_field('style');
$infoCards = get_sub_field('selected_posts');
$centerAlign = get_sub_field('center_align');
?>



<section class="section_info_cards row-<?php // echo $row; 
                                        ?>">


    <div class="container_big background-container <?php if ($add_background) {
                                                        echo " add-background ";
                                                    } ?>">



        <div class="section-content">
            <?php if ($smallTitle): ?>
                <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
            <?php endif; ?>

            <?php if ($bigTitle || $body): ?>

                <div class="top-section">
                    <div class="title-wrap">

                        <?php if ($bigTitle): ?>
                            <h3 class="heading"><?php echo $bigTitle; ?></h3>
                        <?php endif; // big title 
                        ?>
                    </div>
                    <?php if ($body): ?>
                        <p class="body"><?php echo $body; ?></p>
                    <?php endif; // body 
                    ?>
                </div>
            <?php endif; ?>

            <!-------------------------- Info cards/tiles --------------------------------->


            <div class="cards-section">

                <?php $colourSchemes = ['blue', 'yellow', 'mint']; ?>
                <?php $totalCards = count(get_sub_field('cards')); ?>

                <?php if (wp_is_mobile()):

                ?>


                    <div class="splide info-card-carousel" aria-label="Info cards">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php while (have_rows('cards')) : the_row(); ?>
                                    <li class="splide__slide">
                                        <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>

                                        <?php $icon = get_sub_field('icon'); ?>
                                        <?php $cardTitle = get_sub_field('card_title'); ?>
                                        <?php $cardBody = get_sub_field('card_body'); ?>



                                        <div class="info-card <?php echo $colourScheme; ?>-scheme slider-card">

                                            <div class="text-content">
                                                <?php if ($style == 'icons'): ?>


                                                    <div class="icon-container">

                                                        <?php if ($icon): ?>

                                                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: 'Default alt text for icon'); ?>">
                                                        <?php endif; ?>

                                                    </div>
                                                <?php else:  // numbered style 
                                                ?>
                                                    <p class="tag card-index"><?php if (get_row_index() < 10) {
                                                                                    echo 0;
                                                                                }
                                                                                echo get_row_index(); ?></p>
                                                <?php endif; ?>
                                                <h4 class="card-title"><?php echo $cardTitle; ?></h4>
                                                <p class="card-body"><?php echo $cardBody; ?></p>

                                            </div>




                                        </div>

                                    </li>

                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <ul class="splide__pagination"></ul>

                        <div class="slider-button-container">
                            <button class="custom-prev"><img
                                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-prev-white.svg'; ?>"
                                    alt="button arrow"></button>
                            <button class="custom-next"><img
                                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-next-white.svg'; ?>"
                                    alt="button arrow"></button>
                        </div>
                    </div>





                <?php else:

                    // grid layout otherwise
                ?>



                    <?php while (have_rows('cards')) : the_row(); ?>

                        <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>

                        <?php $icon = get_sub_field('icon'); ?>
                        <?php $cardTitle = get_sub_field('card_title'); ?>
                        <?php $cardBody = get_sub_field('card_body'); ?>



                        <div class="info-card <?php echo $colourScheme; ?>-scheme">

                            <div class="text-content">
                                <?php if ($style == 'icons'): ?>


                                    <div class="icon-container">

                                        <?php if ($icon): ?>

                                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: 'Default alt text for icon'); ?>">
                                        <?php endif; ?>

                                    </div>
                                <?php else:  // numbered style 
                                ?>
                                    <p class="tag card-index"><?php if (get_row_index() < 10) {
                                                                    echo 0;
                                                                }
                                                                echo get_row_index(); ?></p>
                                <?php endif; ?>
                                <h4 class="card-title"><?php echo $cardTitle; ?></h4>
                                <p class="card-body"><?php echo $cardBody; ?></p>

                            </div>


                        </div>
                    <?php endwhile; ?>


                <?php endif ?>
            </div>

            <!--------------------------  --------------------------------->

        </div>






    </div>

</section>