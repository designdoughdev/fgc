<?php

$layout = get_field('layout');
$video = get_field('video');
$smallTitle = get_field('small_title');
$bigTitle = get_field('big_title');
$body = get_field('body');
$image = get_field('image');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/node_modules/aos/dist/aos.css"> -->

</head>
<header>


    <div class="header-bar">
        <div class="pre-header">
            <div class="pre-header-right">
                <p class="h5 text-white">ENG | CYM</p>
                <?php get_template_part('components/includes/search-bar'); ?>
            </div>
        </div>

        <div class="main-header relative">

            <div class="main-header-content container">

                <div class="main-header-left">
                    <a href="<?php echo get_home_url(); ?>" aria-label="Home">
                        <img class="header-logo" src="<?php bloginfo('template_url'); ?>/assets/images/svg/logo.svg"
                            alt="">
                    </a>

                </div>
                <?php if (have_rows('root_menu_pages', 'option')): ?>
                <div class="main-header-centre">
                    <div class="header-menu-btns">
                        <?php $colourSchemes = ['mint', 'yellow', 'sky-blue']; ?>

                        <?php while (have_rows('root_menu_pages', 'option')) : the_row(); ?>
                        <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>

                        <?php $pageID = get_sub_field('root_menu_page'); ?>

                        <button class="btn-menu <?php echo $colourScheme; ?>"
                            value="<?php echo esc_attr(get_post_field('post_name', $pageID)); ?>"><?php echo esc_attr(get_the_title($pageID)); ?></button>

                        <?php endwhile; ?>
                    </div>

                </div>
                <?php endif; ?>
                <div class="main-header-right">

                    <div class="right-links-container">

                        <?php $header = get_field('header', 'option'); 

                        foreach ($header['header_links'] as $link_row) {
                            $link = $link_row['header_link']; 

                            $post_url = get_permalink($link); // Post URL
                            $post_title = get_the_title($link); // Post title
                            ?>
                            
                            <a href="<?php echo esc_url($post_url); ?>">
                                <?php echo esc_html($post_title); ?>
                            </a>
                   
                        <?php } ?>


                    </div>

                    <div class="hamburger-icon-container">
                        <button class="hamburger-btn">
                        <?php
                                            echo file_get_contents(get_template_directory() . '/assets/images/svg/hamburger.svg');
                                            ?>
                        </button>
                    </div>



                </div>

            </div>





        </div>
        <?php get_template_part('components/includes/action-nav'); ?>
        <?php get_template_part('components/includes/mobile-nav'); ?>
        

    </div>

   

    <?php if ($layout == 'boxed'): ?>

    <!-------------------------- Hero / Page Header --------------------------------->

    <section class="hero-container relative">

        <?php // get_template_part('components/includes/action-nav'); ?>


        <?php if (is_front_page()): ?>

        <video autoplay muted loop playsinline style="width: 100%; height: 100%">
            <source src="<?php bloginfo('template_url'); ?>/assets/video/home-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <?php else: ?>

        <div class="banner-img-wrap relative">
            <?php if ($image):
                        $heroImage = array(
                            'class' => '',
                            'id' => $image['ID'],
                            'alt' => $image['alt'],
                            'lazyload' => false
                        );
                        echo build_srcset('banner', $heroImage);

                    endif ?>

            <div class="bar-container">

                <img src=<?php echo get_template_directory_uri() . '/assets/images/svg/vertical-bars.svg' ?> alt="">

            </div>


        </div>


        <?php endif; ?>



        <div id="hero-overlay" class="container">

            <div class="hero-grid container <?php if (!is_front_page()) {
                                                    echo 'standard-page';
                                                } ?>">
                <div class="col-left">
                    <div class="hero-text-container cobalt">
                        <?php if (!is_front_page()): ?>
                        <div class="breadcrumbs-container">
                            <?php display_breadcrumbs(false); ?>

                        </div>
                        <?php endif; ?>
                        <?php if ($smallTitle): ?>
                        <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
                        <?php endif; ?>
                        <?php if ($bigTitle): ?>
                        <h3 class="heading"><?php echo $bigTitle; ?></h3>
                        <?php endif; ?>
                        <?php if (is_front_page()): ?>
                        <?php
                                if (have_rows('page_links')): ?>

                        <div class="button-container">
                            <?php while (have_rows('page_links')) : the_row(); ?>
                            <?php $linkID = get_sub_field('page_link'); ?>

                            <?php if ($linkID): ?>

                            <a href="<?php echo esc_url(get_the_permalink($linkID)); ?>" class="btn link-button"
                                aria-label="Visit the page: <?php echo esc_attr(get_the_title($linkID)); ?>">
                                <?php echo esc_html(get_the_title($linkID)); ?>
                                <div class="btn-arrow-container" aria-hidden="true"></div>
                            </a>

                            <?php endif; ?>
                            <?php endwhile; ?>
                        </div>



                        <?php endif; ?>

                        <?php else: ?>
                        <?php if ($body) { ?>
                        <p class="text">
                            <?php echo $body; ?>
                        </p>
                        <?php } ?>
                        <?php endif; ?>
                    </div>

                </div>


                <div class="col-right">
                    <?php if (have_rows('video_link_box')): ?>

                    <?php while (have_rows('video_link_box')) : the_row(); ?>

                    <?php
                                $title = get_sub_field('title');
                                $subtitle = get_sub_field('subtitle');
                                $link = get_sub_field('link');
                                $videoImage = get_sub_field('video_image');
                                $btnText = get_sub_field('button_text');
                                ?>

                    <a href="<?php echo $link['url']; ?>" target="_blank">

                        <div class="hero-video-link-container">
                            <div class="img-wrap">
                                <?php if ($videoImage):
                                                $smallImage = array(
                                                    'class' => '',
                                                    'id' => $videoImage['ID'],
                                                    'alt' => $videoImage['alt'],
                                                    'lazyload' => false
                                                );
                                                echo build_srcset('banner', $smallImage);

                                            endif ?>
                            </div>


                            <div class="text-half">
                                <div class="text">
                                    <h6 class="bold"><?php echo $title; ?> |</h6>
                                    <p><?php echo $subtitle; ?></p>

                                </div>

                                <div class="play-btn">
                                    <p><?php if ($btnText) {
                                                        echo $btnText;
                                                    } else {
                                                        echo "Watch Video Now";
                                                    } ?></p>
                                    <img class="play-icon"
                                        src="<?php bloginfo('template_url'); ?>/assets/images/svg/play-icon.svg" alt="">


                                </div>

                            </div>

                        </div>
                    </a>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>


            </div>

        </div>

    </section>

    <!--------------------------  --------------------------------->
    <?php elseif (is_search() || is_single()): ?>

    <section class="hero-container relative level-three-layout">

        <?php // get_template_part('components/includes/action-nav'); ?>

        <div id="hero-overlay" class="container">

            <div class="banner-container level-three-layout">
                <div class="text-content">
                    <?php if (!is_search()) { ?>
                    <div class="breadcrumbs-container">
                        <?php display_breadcrumbs(false); ?>

                    </div>
                    <?php } ?>
                    <h2 class="title-tag"><?php if (is_search()) {
                                                    echo "Search";
                                                } else {
                                                    echo $smallTitle;
                                                } ?></h2>
                    <h3 class="heading"><?php if (is_search()) {
                                                echo "Search Results";
                                            } else {
                                                the_title();
                                            } ?>
                    </h3>
                    <?php if (!is_search() && $body) { ?>
                    <p class="text">
                        <?php echo $body; ?>
                    </p>
                    <?php } ?>
                </div>

            </div>

        </div>

    </section>


    <?php elseif ($layout == 'second_level_page'): ?>

    <section class="hero-container relative level-two-layout">

        <?php // get_template_part('components/includes/action-nav'); ?>


        <div id="hero-overlay" class="container">

            <div class="banner-container level-two-layout">

                <div class="text-content">
                    <?php if ($smallTitle): ?>
                    <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
                    <?php endif;
                        ?>
                    <div class="text-content-grid">
                        <h3 class="heading"><?php
                                                the_title(); ?>
                        </h3>
                        <?php if ($body): ?>
                        <p class="text">
                            <?php echo $body; ?>
                        </p>
                        <?php endif; ?>

                    </div>

                </div>


            </div>
            <div class="hero-img img-wrap">
                <div class="breadcrumbs-outer-wrapper">
                    <div class="breadcrumbs-container">
                        <?php display_breadcrumbs(false); ?>

                    </div>

                </div>

                <?php if ($image):
                        $heroImage = array(
                            'class' => '',
                            'id' => $image['ID'],
                            'alt' => $image['alt'],
                            'lazyload' => false
                        );
                        echo build_srcset('banner', $heroImage);

                    endif ?>




            </div>

        </div>

    </section>

    <!--------------------------  --------------------------------->

    <?php elseif ($layout == 'third_level_page'): ?>

    <section class="hero-container relative level-three-layout">

        <?php // get_template_part('components/includes/action-nav'); ?>


        <div id="hero-overlay" class="container">

            <div class="banner-container level-three-layout">
                <div class="text-content">

                    <div class="breadcrumbs-container">
                        <?php display_breadcrumbs(false); ?>

                    </div>

                    <?php if ($smallTitle): ?>
                    <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
                    <?php endif;
                        ?>

                    <h3 class="heading"><?php
                                            the_title(); ?>
                    </h3>
                    <?php if ($body): ?>
                    <p class="text">
                        <?php echo $body ?>
                    </p>
                    <?php endif ?>
                </div>

            </div>

        </div>

    </section>







    <!--------------------------  --------------------------------->

    <?php else: ?>

    <section class="hero-container relative level-three-layout">

        <?php // get_template_part('components/includes/action-nav'); ?>

        <div id="hero-overlay" class="container">

            <div class="banner-container level-three-layout">
                <div class="text-content">
                    <?php if (!is_search()) { ?>
                    <div class="breadcrumbs-container">
                        <?php display_breadcrumbs(false); ?>

                    </div>
                    <?php } ?>
                    <h2 class="title-tag"><?php if (is_search()) {
                                                    echo "Search";
                                                } else {
                                                    echo $smallTitle;
                                                } ?></h2>
                    <h3 class="heading"><?php if (is_search()) {
                                                echo "Search Results";
                                            } else {
                                                the_title();
                                            } ?>
                    </h3>
                    <?php if (!is_search() && $body) { ?>
                    <p class="text">
                        <?php echo $body; ?>
                    </p>
                    <?php } ?>
                </div>

            </div>

        </div>

    </section>

    <?php endif; ?>



</header>



<body>
    <main>