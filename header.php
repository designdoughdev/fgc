<?php

$layout = get_field('layout');
$video = get_field('video');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/node_modules/aos/dist/aos.css"> -->

</head>
<header x-data="{ isOpen: false }">


    <div class="header-bar">
        <div class="pre-header">
            <div class="pre-header-right">
                <p class="h5 text-white">ENG | CYM</p>
                <?php get_template_part('components/includes/search-bar'); ?>
            </div>
        </div>

        <div class="main-header">

            <div class="main-header-content container">

                <div class="main-header-left">
                    <img class="header-logo" src="<?php bloginfo('template_url'); ?>/assets/images/svg/logo.svg" alt="">

                </div>

                <div class="main-header-centre">
                    <div class="header-menu-btns">
                        <button class="btn-menu mint" value="discover">Discove</button>
                        <button class="btn-menu yellow" value="explore">Explore</button>
                        <button class="btn-menu sky-blue" value="do">Do</button>
                    </div>

                </div>
                <div class="main-header-right">

                    <div class="right-links-container">
                        <a href="">Contact</a>
                        <a href="">Future Generations Act</a>
                        <a href="">Cymru Can</a>
                    </div>

                    <div class="hamburger-icon-container">
                        <button class="md:hidden ms-auto hamburger-btn" aria-label="Menu" @click="isOpen = !isOpen">
                            <img class="hamburger-icon"
                                src="<?php bloginfo('template_url'); ?>/assets/images/svg/hamburger.svg" alt="menu">
                        </button>
                    </div>


                    <?php get_template_part('components/includes/mobile-nav'); ?>
                </div>

            </div>



        </div>
    </div>

    <?php if ($layout == 'boxed'): ?>

    <!-------------------------- Hero / Page Header --------------------------------->

    <section class="hero-container relative">

        <?php get_template_part('components/includes/action-nav'); ?>


        <?php if (is_front_page()): ?>

        <video autoplay muted loop playsinline style="width: 100%; height: 100%">
            <source src="<?php bloginfo('template_url'); ?>/assets/video/home-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <?php else: ?>

        <div class="banner-img-wrap relative">
            <img src="https://picsum.photos/2000/1333" alt="">

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
                            <?php display_breadcrumbs(); ?>

                        </div>
                        <?php endif; ?>

                        <p class="title-tag">Welcome</p>
                        <h3 class="heading">Help us create a Wales that we all want to live in, now and in the future.
                        </h3>
                        <?php if (is_front_page()): ?>
                        <div class="button-container">
                            <a href="" class="btn mint">Cymru Can</a>
                            <a href="" class="btn sky-blue">Cymru Can</a>
                        </div>
                        <?php else: ?>
                        <p class="text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua ut enim ad.
                        </p>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="col-right">
                    <a href="https://www.youtube.com/" target="_blank">

                        <div class="hero-video-link-container">
                            <div class="img-wrap">
                                <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/derek.jpg" ?>
                                    alt="">
                            </div>


                            <div class="text-half">
                                <div class="text">
                                    <h6 class="bold">CYMRU CAN |</h6>
                                    <p>our Vision and Purpose</p>

                                </div>

                                <div class="play-btn">
                                    <p>Watch Video Now</p>
                                    <img class="play-icon"
                                        src="<?php bloginfo('template_url'); ?>/assets/images/svg/play-icon.svg" alt="">

                                </div>

                            </div>

                        </div>
                    </a>

                </div>

            </div>

        </div>

    </section>

    <!--------------------------  --------------------------------->

    <?php elseif ($layout == 'banner'): ?>





    <!--------------------------  --------------------------------->

    <?php else: ?>
    <section class="hero-container relative">

        <?php get_template_part('components/includes/action-nav'); ?>

        <video autoplay muted loop playsinline style="width: 100%; height: 100%">
            <source src="<?php bloginfo('template_url'); ?>/assets/video/home-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>


        <div id="hero-overlay" class="container">

            <div class="hero-grid container">
                <div class="col-left">
                    <div class="hero-text-container cobalt">
                        <p class="title-tag">Welcome</p>
                        <h3 class="heading">Help us create a Wales that we all want to live in, now and in the future.
                        </h3>
                        <div class="button-container">
                            <a href="" class="btn mint">Cymru Can</a>
                            <a href="" class="btn sky-blue">Cymru Can</a>
                        </div>
                    </div>

                </div>

                <div class="col-right">
                    <a href="https://www.youtube.com/" target="_blank">

                        <div class="hero-video-link-container">
                            <div class="img-wrap">
                                <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/derek.jpg" ?>
                                    alt="">
                            </div>


                            <div class="text-half">
                                <div class="text">
                                    <h6 class="bold">CYMRU CAN |</h6>
                                    <p>our Vision and Purpose</p>

                                </div>

                                <div class="play-btn">
                                    <p>Watch Video Now</p>
                                    <img class="play-icon"
                                        src="<?php bloginfo('template_url'); ?>/assets/images/svg/play-icon.svg" alt="">

                                </div>

                            </div>

                        </div>
                    </a>

                </div>

            </div>

        </div>

    </section>

    <?php endif; ?>



</header>



<body>
    <main>