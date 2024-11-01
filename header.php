<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<header x-data="{ isOpen: false }">


    <div class="header-bar">
        <div class="pre-header">
            <div class="pre-header-right">
                <p>ENG | CYM</p>
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
                        <button class="btn-menu mint">Discover</button>
                        <button class="btn-menu yellow">Explore</button>
                        <button class="btn-menu sky-blue">Do</button>
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

    <?php get_template_part('components/includes/action-nav'); ?>

    <div class="hero-vid-container">
        <video autoplay muted loop playsinline style="width: 100%; height: 100%">
            <source src="https://videos.pexels.com/video-files/4114797/4114797-uhd_2560_1440_25fps.mp4"
                type="video/mp4">
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
                            <img src="https://picsum.photos/164/94" alt="">


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

    </div>





</header>



<body>
    <main>