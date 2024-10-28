<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<header x-data="{ isOpen: false }">

    <div class="header-left w-1/3">
        <div>
            <h1><?php bloginfo('name'); ?></h1>
        </div>
        <div class="header-right grow flex">
            <nav class="">

            </nav>
            <button class="md:hidden ms-auto" aria-label="Menu" @click="isOpen = !isOpen">
                Menu
            </button>

            <?php get_template_part('components/includes/mobile-nav'); ?>



        </div>
        <div class="top-header-bar">
            <div class="">
                <h1>Top Header Bar</h1>
            </div>

        </div>
        <div>
            <h1>Header</h1>
        </div>


</header>

<body>
    <main>