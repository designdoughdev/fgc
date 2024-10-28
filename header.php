<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<header x-data="{ isOpen: false }">
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