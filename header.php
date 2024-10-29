<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<header x-data="{ isOpen: false }">


    <div class="pre-header">
        <div class="pre-header-right">
            <p>ENG | CYM</p>
            <?php get_template_part('components/includes/search-bar'); ?>
        </div>
    </div>

    <div class="main-header container">

        <div class="main-header-left">
            <img class="header-logo" src="<?php bloginfo('template_url'); ?>/assets/images/svg/logo.svg" alt="">

        </div>

        <div class="main-header-centre">
            <button class="btn-menu">Discover</button>
            <button class="btn-menu">Explore</button>
            <button class="btn-menu">Do</button>
        </div>
        <div class="main-header-right">

            <div class="hamburger-icon-container">
                <button class="md:hidden ms-auto hamburger-btn" aria-label="Menu" @click="isOpen = !isOpen">
                    <img class="hamburger-icon" src="<?php bloginfo('template_url'); ?>/assets/images/svg/hamburger.svg"
                        alt="menu">
                </button>
            </div>


            <?php get_template_part('components/includes/mobile-nav'); ?>
        </div>
</header>

<body>
    <main>