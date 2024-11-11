<?php
// $row = get_row_index() - 0;
// $padding = get_sub_field('padding'); 
// $layout = get_sub_field('layout'); 
// // count rows in images
// $slides_to_show = get_sub_field('slides_to_show');
// $images = get_sub_field('images', $post->ID);
// $full_width = get_sub_field('full_width');
// $portrait = get_sub_field('make_portrait');
// $remove_border_radius = get_sub_field('remove_border_radius');
// $background = get_sub_field('background');
// $og_dimensions = get_sub_field('og_dimensions');

// if($images) { 
// $rows = count($images);
// }

$layout = get_query_var('layout'); ?>


<section class="section_posts_agg row-<?php // echo $row; 
                                        ?>">


    <?php if ($layout == 'news'): ?>

        <!-------------------------- News Feed Layout --------------------------------->

        <div class="splide post-feed-carousel section-wrapper" aria-label="News Feed">

            <div class="text-container">
                <p class="title-tag">News</p>
                <h3 class="heading h2">Stay connected with our latest news and updates</h3>
                <div class="button-container">
                    <button class="splide__arrow custom-prev btn-prev" aria-label="Previous slide">
                        Previous
                    </button>
                    <button class="splide__arrow custom-next btn-next" aria-label="Next slide">
                        Next
                    </button>
                </div>


            </div>

            <div class="splide__track">
                <ul class="splide__list">

                    <?php $colourSchemes = ['blue', 'yellow', 'mint', 'green']; // The repeating set of values 
                    ?>


                    <?php for ($x = 0; $x < 12; $x++) {

                        $colourScheme = $colourSchemes[$x % 4]; // Use modulo to cycle through values


                    ?>
                        <li class="splide__slide relative">
                            <a href="/">
                                <div class="post-card <?php echo $colourScheme; ?>-style">
                                    <div class="card-top">
                                        <div class="tag-container">
                                            <p class=" tag h6">Explore</p>
                                            <p class="tag h6">Do</p>
                                        </div>
                                        <div class="hand-icon-container">
                                            <?php
                                            echo file_get_contents(get_template_directory() . '/assets/images/svg/hand-icon.svg');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="h4">
                                            New Future Generations Commissioner reflects on first month as the new guardian for
                                            people in Wales not yet born
                                        </h4>

                                        <div class="post-info">
                                            <p class="author h5 bold">
                                                derek walker
                                            </p>
                                            <p class="date h5 medium-text">
                                                Monday 24|11|23
                                            </p>

                                        </div>

                                    </div>
                                    <div class="card-bottom">
                                        <p>Read News Article</p>

                                    </div>


                                </div>
                            </a>
                        </li>
                    <?php }
                    ?>


                </ul>
            </div>
        </div>

    <?php elseif ($layout == 'press-releases'): ?>

        <!-------------------------- Press Releases Layout --------------------------------->

        <div class="splide press-releases-carousel section-wrapper" aria-label="News Feed">

            <div class="text-container">
                <div class="text-inner">
                    <p class="title-tag">News</p>
                    <h3 class="heading h2">Stay connected with our latest news and updates</h3>
                    <a href="" class="btn cobalt text-white">All Press & Media</a>
                </div>

                <div class="button-container">
                    <button class="splide__arrow custom-prev btn-prev" aria-label="Previous slide">
                        Previous
                    </button>
                    <button class="splide__arrow custom-next btn-next" aria-label="Next slide">
                        Next
                    </button>
                </div>


            </div>

            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $colourSchemes = ['blue', 'mint', 'yellow', 'green']; // Array of color schemes 

                    // Loop through slides in increments of 2 to group every two slides together
                    for ($x = 0; $x < 12; $x += 2) {
                    ?>
                        <li class="splide__slide">
                            <!-- First stacked slide in the pair -->
                            <?php
                            $colourScheme = $colourSchemes[$x % 4];
                            ?>
                            <a href="/" class="stacked-slide">
                                <div class="press-release-card <?php echo $colourScheme; ?>-style">
                                    <div class="text-col relative">

                                        <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg'); ?>

                                        <div class="text-content">

                                            <div class="card-top">
                                                <div class="tag-container">
                                                    <p class="tag h6">Explore</p>
                                                    <p class="tag h6">Do</p>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="h4">New Future Generations Commissioner reflects on first month</h4>
                                                <div class="post-info">
                                                    <p class="author h5 bold">Derek Walker</p>
                                                    <p class="date h5 medium-text">Monday 24|11|23</p>
                                                </div>
                                            </div>
                                            <div class="card-bottom">
                                                <p>Read News Article</p>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="img-wrap">
                                        <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/cardiff.jpg" ?>
                                            alt="">
                                    </div>
                                </div>
                            </a>

                            <!-- Second stacked slide in the pair -->
                            <?php
                            if ($x + 1 < 12) { // Ensure we don't exceed the total number of slides
                                $colourScheme = $colourSchemes[($x + 1) % 4];
                            ?>
                                <a href="/" class="stacked-slide">
                                    <div class="press-release-card <?php echo $colourScheme; ?>-style">
                                        <div class="text-col relative">

                                            <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg'); ?>

                                            <div class="text-content">

                                                <div class="card-top">
                                                    <div class="tag-container">
                                                        <p class="tag h6">Explore</p>
                                                        <p class="tag h6">Do</p>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="h4">Another headline example text here for the next slide</h4>
                                                    <div class="post-info">
                                                        <p class="author h5 bold">Jane Doe</p>
                                                        <p class="date h5 medium-text">Tuesday 25|11|23</p>
                                                    </div>
                                                </div>
                                                <div class="card-bottom">
                                                    <p>Read News Article</p>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="img-wrap">
                                            <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/builders.jpg" ?>
                                                alt="">
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </div>

    <?php endif ?>





</section>