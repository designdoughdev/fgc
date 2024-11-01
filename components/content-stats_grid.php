<!-- cosmos page -->

<?php

$big_title = get_sub_field('big_title');
$small_title = get_sub_field('small_title');
$angled_border_top = get_sub_field('angled_border_top');
$background_colour = get_sub_field('background_colour');
$stats_or_values = get_sub_field('stats_or_values');
$grid_or_rows = get_sub_field('grid_or_rows');
$slider_or_static = get_sub_field('slider_or_static');
$row = get_row_index() - 0;
?>

<!-- todo: change to stats/values? -->

<section
    class="section_stats row-<?php echo $row; ?> fade_in_container <?php echo $angled_border_top; ?> <?php echo $background_colour; ?>">

    <!-- graphics -->


    <div class="title_wrap">
        <?php if ($small_title) { ?>
        <p class="subtitle"><?php echo $small_title; ?></p>
        <?php } ?>
        <h3 class="title"><?php echo $big_title; ?></h3>
    </div>

    <?php if ($grid_or_rows == false) { ?>

    <?php if ($stats_or_values == false) { ?>

    <?php if ($slider_or_static == false) { ?>
    <div class="container_small">
        <div id="info_carousel_4_slides" class="stats_grid splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php if (have_rows('stats')) : while (have_rows('stats')) : the_row(); ?>
                    <?php
                                        $stat = get_sub_field('stat');
                                        $above_text = get_sub_field('above_text');
                                        $below_text = get_sub_field('below_text');
                                        $footnote = get_sub_field('source_footnote');
                                        $value_title = get_sub_field('value_title');
                                        $value_body_text = get_sub_field('value_body_text');
                                        ?>
                    <li class="cell stats_cell splide__slide">
                        <h4 class="above_text"><?php echo $above_text; ?></h4>
                        <h2 class="stat"><?php echo $stat; ?></h2>
                        <h5 class="below_text"><?php echo $below_text; ?></h5>
                        <p><?php echo $footnote; ?></p>
                    </li>
                    <?php endwhile;
                                endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="container_small">
        <div class="stats_grid">
            <?php if (have_rows('stats')) : while (have_rows('stats')) : the_row(); ?>
            <?php
                                $stat = get_sub_field('stat');
                                $above_text = get_sub_field('above_text');
                                $below_text = get_sub_field('below_text');
                                $footnote = get_sub_field('source_footnote');
                                $value_title = get_sub_field('value_title');
                                $value_body_text = get_sub_field('value_body_text');
                                ?>
            <div class="cell stats_cell">
                <h4 class="above_text"><?php echo $above_text; ?></h4>
                <h2 class="stat"><?php echo $stat; ?></h2>
                <h4 class="below_text"><?php echo $below_text; ?></h4>
                <p><?php echo $footnote; ?></p>
            </div>
            <?php endwhile;
                        endif; ?>
        </div>
    </div>
    <?php } ?>


    <?php } else { ?>
    <div class="container_small">
        <div class="values_grid <?php if ($slider_or_static == false) { ?> slider lazy <?php } ?>">
            <?php if (have_rows('values')) : while (have_rows('values')) : the_row(); ?>
            <?php
                            $stat = get_sub_field('stat');

                            $above_text = get_sub_field('above_text');
                            $below_text = get_sub_field('below_text');
                            $value_title = get_sub_field('value_title');
                            $value_body_text = get_sub_field('value_body_text');
                            ?>
            <div class="cell values_cell">
                <h2 class="title"><?php echo $value_title; ?></h2>
                <p><?php echo $value_body_text; ?></p>
            </div>
            <?php
                        endwhile;
                    endif; ?>
        </div>
    </div>
    <?php } ?>

    <?php } else { ?>

    <!-- rows layout -->

    <div class="stats_rows">
        <?php if (have_rows('stats')) : while (have_rows('stats')) : the_row(); ?>

        <?php $stat = get_sub_field('stat'); ?>
        <?php $direction = get_sub_field('direction'); ?>
        <div id="bulletin_scroll_<?php echo get_row_index(); ?>" class="splide">
            <div class="splide__track" aria-live="off">
                <div class="splide__list">
                    <h2 class="stat_row splide__slide"><?php echo $stat; ?> &nbsp; · &nbsp;</h2>
                </div>
            </div>
        </div>
        <?php endwhile;
            endif; ?>
    </div>
    <?php } ?>
</section>