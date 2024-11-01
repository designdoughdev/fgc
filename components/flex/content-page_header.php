<?php
    $row = get_row_index() - 0;

    $small_title = get_sub_field('small_title');
    $use_logo = get_sub_field('use_logo');
    $logo = get_sub_field('logo');
    $big_title = get_sub_field('big_title');
    $text_body = get_sub_field('text_body');
    $link = get_sub_field('link');

    $layout = get_sub_field('layout');
    $full_viewport_height = get_sub_field('full_viewport_height');
    
    $use_as_non_header = get_sub_field('use_as_non_header');
    $use_image = get_sub_field('use_image');
    $background_or_header_image = get_sub_field('background_or_header_image');
    $page_header_image = get_sub_field('page_header_image');
    $background_colour = get_sub_field('background_colour');
    $image_style = get_sub_field('image_styles');
    $background_image = get_sub_field('background_image');
?>

<?php $post_id = get_the_ID(); ?>

<section
    class="<?php echo $background_colour; ?> page_header row-<?php echo $row; ?> <?php if ($post_id === 711) { ?> index <?php } if($full_viewport_height) { ?> full_viewport_height<?php } if($layout == 'small_heading') { ?> small_heading<?php } ?>"
    style="<?php if ($use_image && $background_image) { ?> background-image: url('<?php echo $background_image; ?>'); <?php } ?>">
    <div class="container <?php echo $layout; ?>">

        <?php if($layout == 'background_image') { ?>
        <!--  background image layout -->
        <div class="title_wrap">
            <?php if($small_title) { ?><h5><?php echo $small_title; ?></h5><?php } ?>
            <h1 class=""><?php echo $big_title; ?></h1>
            <?php if($text_body) { ?><h4><?php echo $text_body; ?></h4><?php } ?>
            <?php 
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a class="btn_default" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo $link_title; ?>
            </a>
            <?php endif; ?>
        </div>

        <?php } if($layout == 'editorial') { ?>
        <!--  editorial layout -->
        <div class="title_wrap <?php if ( is_front_page() ) { ?>homepage_title_wrap<?php } ?>">
            <?php if($small_title) { ?><h5><?php echo $small_title; ?></h5><?php } ?>
            <?php if($use_logo == true) { ?>
            <div class="heading_logo_wrap">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/brandlabs-logo.svg'; ?>"
                    alt="brandlabs logo">
            </div>
            <?php } else { ?>
            <h1 class="">
                <?php echo $big_title; ?></h1>
            <?php } ?>
            <?php if($text_body) { ?>
            <p class="text_body landing_page_header_fade"><?php echo $text_body; ?></p>
            <?php } ?>
            <!-- content unique to brandlabs page -->
            <?php if (strpos($_SERVER['REQUEST_URI'], '/brand-labs') !== false) { ?>
            <p class="brandlabs_live">(<img
                    src=<?php echo get_template_directory_uri() . '/assets/images/svg/bulletin-dot-green.svg'; ?>>Now
                Live )
            </p>
            <?php } ?>
            <img class="arrow_down landing_page_header_fade <?php if (strpos($_SERVER['REQUEST_URI'], '/brand-labs') !== false) { ?>  brandlabs_arrow<?php } ?>"
                src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-down-white.svg'; ?>"
                alt="arrow down">
        </div>
        <?php if($use_image) { ?>
        <?php if($background_or_header_image == false) { ?>
        <?php if($page_header_image)  { ?>
        <div class="image_wrap">
            <img class="<?php echo $image_style; ?>" src="<?php echo $page_header_image; ?>" alt=""
                class="page_header_image">
        </div>
        <?php } ?>
        <?php } ?>
        <?php } ?>

        <!-- two column layout -->
        <?php } if($layout == 'two_columns') { ?>
        <!--  two column layout -->
        <div class="title_wrap">
            <?php if($small_title) { ?><h6><?php echo $small_title; ?></h6><?php } ?>
            <h1><?php echo $big_title; ?></h1>
            <?php if($text_body) { ?><p><?php echo $text_body; ?></p><?php } ?>
        </div>
        <div class="image_wrap">
            <img class="<?php echo $image_style; ?>" src="<?php echo $page_header_image; ?>" alt=""
                class="page_header_image">
        </div>
        <?php } if ($layout == 'small_heading') { ?>
        <div class="title_bar">
            <div class="title_bar_border"></div>
        </div>
        <div class="title_box">
            <div class="title_wrap">
                <?php if($small_title) { ?>
                <p class="small_title fade_in_element"> <?php echo $small_title; ?></p>
                <?php } ?>
                <?php if($big_title) { ?>
                <h2 class="title ani_fade_up_fold_top_level"> <?php echo $big_title; ?> </h2>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

    </div>
</section>