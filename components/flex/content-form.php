<?php
$row = get_row_index() - 0;

$small_title = get_sub_field('small_title');
$big_title = get_sub_field('big_title');
$intro_text = get_sub_field('intro_text');

$form = get_sub_field('form_select');
$layout = get_sub_field('layout');
$form_image = get_sub_field('form_image');

$contact = get_sub_field('contact_embed_code');
$sign_up = get_sub_field('sign_up_embed_code');
$sign_up_min = get_sub_field('sign_up_min_embed_code');
$external = get_sub_field('external_embed_code');
$application = get_sub_field('application_embed_code');
$get_a_quote = get_sub_field('get_a_quote_embed_code');

?>

<section class="section_form row-<?php echo $row; ?>fade-in">
    <div class="container">

        <div class="title_bar">
            <div class="title_bar_border"></div>
        </div>
        <div class="title_box">
            <div class="title_wrap <?php if($glance_box) { ?>title_box_grid<?php } ?>">
                <?php if($small_title) { ?>
                <p class="small_title fade_in_element"> <?php echo $small_title; ?></p>
                <?php } ?>
                <?php if($big_title) { ?>
                <h2 class="title ani_fade_up_fold_top_level"> <?php echo $big_title; ?> </h2>
                <?php } ?>
            </div>
        </div>

        <div class="form_container <?php echo $layout; ?> <?php echo $form; ?>">
            <div class="form_grid <?php if($form_image) { ?> with_image <?php } ?>">
                <div class="form_wrap">
                    <?php 
                      if ($form == 'contact') {
                        echo do_shortcode("$contact");
                    } if ($form == 'sign_up') { 
                        echo do_shortcode("$newsletter");
                    } if ($form == 'sign_up_min') { 
                        echo do_shortcode("$sign_up_min"); 
                    } if ($form == 'external') {
                        echo do_shortcode("$external"); 
                    } if ($form == 'application') {
                        echo do_shortcode("$application"); 
                    } if ($form == 'get_a_quote') {
                        echo do_shortcode("$get_a_quote"); 
                    } 
                    ?>
                </div>
                <?php if($form_image) { ?>
                <div class="form_image_wrap fade_in_element">
                    <?php 
                        $bannerOne = array(
                        'class' => '' ,
                        'id' => $form_image,
                        'lazyload' => false
                        );
                    echo build_srcset('square', $bannerOne); ?>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
</section>