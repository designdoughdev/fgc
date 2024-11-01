<?php

$big_title = get_sub_field('big_title');
$row = get_row_index() - 0;

?>

<!-- toddo make version with different animation!  -->

<section class="section_partners row-<?php echo $row; ?> fade_in_container">

    <div class="container">
        <?php if ($big_title) { ?><div class="title_wrap">
            <h2 class=""><?php echo $big_title; ?></h2>
        </div>
        <?php } ?>

    </div>

    <div id="partners_carousel" class="splide" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <?php if (have_rows('partners_list')) : while (have_rows('partners_list')) : the_row(); ?>
                <?php $partner_logo = get_sub_field('partner_logo'); ?>

                <img class="splide__slide" src="<?php echo $partner_logo; ?>" alt="Associated Partner">

                <?php
                        wp_reset_postdata();
                    endwhile;
                endif;
                ?>
            </ul>
        </div>
    </div>

</section>