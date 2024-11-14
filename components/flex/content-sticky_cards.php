<?php
$row = get_row_index() - 0;

$finaltitle = get_sub_field('title');
$finalcontent = get_sub_field('text_body');
$finalbg = get_sub_field('background_colour');


// end
?>

<section class="section_sticky_cards " id="row-<?php echo $row; ?> fade-in">

    <?php if(have_rows('cards')) : ?>
    <?php while(have_rows('cards')) : the_row(); ?>

    <?php $backgroundcolour = get_sub_field('background_colour'); ?>
    <?php $title = get_sub_field('title'); ?>
    <?php $text = get_sub_field('text'); ?>
    <?php $content = get_sub_field('content'); ?>
    <?php $rowcount = get_row_index() - 0; ?>

    <div class="full_width stag_trig stag_trig_<?php echo $rowcount; ?> <?php echo $backgroundcolour; ?> ">
        <div class="container">
            <?php if($title) {?>
            <div class="title_wrap">
                <p>0<?php echo $rowcount; ?></p>
                <h3 class="staggered_cards_title"><?php echo $title; ?></h3>
            </div>
            <?php } ?>
            <?php if($text) {?><div class="pre_text"><?php echo $text; ?></div><?php } ?>

            <?php if(have_rows('slides')) : ?>
            <div class="slider lazy">
                <?php while(have_rows('slides')) : the_row(); ?>
                <?php $slide_title = get_sub_field('slide_title'); ?>
                <?php $slide_body_text = get_sub_field('slide_body_text'); ?>
                <div class="slide_wrap">
                    <div class="flex_wrap">
                        <div class="arrow">

                        </div>
                        <div class="content">
                            <h3><?php echo $slide_title; ?></h3>
                            <div class="textarea">
                                <?php echo $slide_body_text; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

</section>