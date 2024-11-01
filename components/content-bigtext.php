<?php
$row = get_row_index() - 0;

$small_title = get_sub_field('small_title');
$big_text = get_sub_field('big_text');
$background_colour = get_sub_field('background_colour');
$links_or_logos = get_sub_field('links_or_logos');

// end
?>


<section class="section_big_text fade-in">
    <div class="container">

        <div class="text_wrap">
            <?php if($small_title) { ?><h5 class=""><?php echo $small_title; ?></h5><?php } ?>
            <h1 class="big_text"><?php echo $big_text; ?></h1>
        </div>
        <div class="links_logos_wrap">
            <?php if($links_or_logos == false) { ?>

            <?php if(have_rows('links')) : while(have_rows('links')) : the_row(); ?>
            <?php 
                $link = get_sub_field('link_button');
                if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn_default" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
            <?php endwhile; endif; ?>

            <?php } else { ?>

            <?php if(have_rows('logos')) : while(have_rows('logos')) : the_row(); ?>
            <?php $logo = get_sub_field('logo'); ?>
            <img src="<?php echo $logo ?>" alt="partner logo">
            <?php endwhile; endif; ?>
            <?php } ?>
        </div>

    </div>
</section>