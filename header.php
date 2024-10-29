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

        <div class="header-logo-container">
            <img class="header-logo" src="<?php bloginfo('template_url'); ?>/assets/images/svg/logo.svg" alt="">

        </div>

        <div class="menu-btn-container">
            <button>One</button>
            <button>Two</button>
            <button>Three</button>
        </div>
        <div class="menu-btn-container">
            <button class="md:hidden ms-auto" aria-label="Menu" @click="isOpen = !isOpen">
                Menu
            </button>

            <?php get_template_part('components/includes/mobile-nav'); ?>
        </div>
</header>

<body>
    <main>