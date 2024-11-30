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

$layoutOld = get_query_var('layout_old');
// $style = get_sub_field('style');
?>


<?php
$remove_top_padding = get_sub_field('remove_top_padding');
$small_title = get_sub_field('small_title');
$big_title = get_sub_field('big_title');
$link = get_sub_field('link');
$layout = get_sub_field('layout');
$no_of_columns = get_sub_field('number_of_columns');
$chosen_post_type = get_sub_field('select_post_type');
$chosen_no_of_posts = get_sub_field('how_many_posts');
$latest_or_selected = get_sub_field('latest_or_selected');
$filter_by_archived = get_sub_field('filter_by_archived');
$portfolio_images = get_sub_field('portfolio_images');
$row = get_row_index() - 0;
?>

<!-- todo: add view selector toggle -->
<!-- todo: selected posts version -->

<?php $post_id = get_the_ID(); ?>


<section
    class="section_posts_agg row-<?php echo $row; ?> <?php if ($post_id === 711) { ?> header_window <?php } ?><?php if ($remove_top_padding) { ?> remove_top_padding<?php } ?>">
    <?php if ($big_title) { ?>

    <?php } ?>

    <?php if ($latest_or_selected == false) { ?>

    <?php
        $args = array(
            'post_type' => $chosen_post_type,
            'posts_per_page' => $chosen_no_of_posts,
            'order' => 'DSC',
        );
        // conditionally filter by archived tag
        if ($filter_by_archived) {
            $archive_term = get_term_by('slug', 'archive', 'post_tag');
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'post_tag',
                    'field'    => 'id',
                    'terms'    => $archive_term->term_id,
                    'operator' => 'IN',
                ),
            );
        } else {
            $archive_term = get_term_by('slug', 'archive', 'post_tag');
            if ($archive_term && !is_wp_error($archive_term)) {
                // Only add the tax query if the term exists
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'post_tag',
                        'field'    => 'id',
                        'terms'    => $archive_term->term_id,
                        'operator' => 'NOT IN',
                    ),
                );
            } else {
                // Handle the case where the term does not exist
                error_log('The tag "archive" does not exist.');
            }
        }

        $latest = new WP_Query($args);
        ?>

    <?php if ($layout == 'card_carousel') {  ?>

    <!-- 
    <div class="post_rows">
        

    </div> -->

    <div class="splide post-feed-carousel section-wrapper" aria-label="News Feed">

        <div class="text-container">
            <?php if ($small_title): ?>
            <h2 class="title-tag"><?php echo $small_title ?></h2>
            <?php endif; ?>
            <?php if ($big_title): ?>
            <h3 class="heading h2"><?php echo $big_title ?></h3>
            <?php endif; ?>
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

                <?php while ($latest->have_posts()) : $latest->the_post(); ?>

                <?php
                            // get current post index
                            $index = $latest->current_post;


                            // set colour scheme variable to pass to template part
                            set_query_var('colourScheme', $colourSchemes[($index + 1) % 4]); ?>



                <li class="splide__slide relative">

                    <?php get_template_part('components/includes/post_card', 'colourScheme'); ?>

                </li>



                <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>






            </ul>
        </div>
    </div>


    <?php }
        if ($layout == 'double_tile_slider') { ?>

    <div class="splide press-releases-carousel section-wrapper" aria-label="News Feed">
        <div class="text-container">
            <div class="text-inner">
                <?php if ($small_title): ?>
                <h2 class="title-tag"><?php echo $small_title ?></h2>
                <?php endif; ?>
                <?php if ($big_title): ?>
                <h3 class="heading h2"><?php echo $big_title ?></h3>
                <?php endif; ?>
                <a href="" class="btn cobalt text-white">All Press & Media<div class="btn-arrow-container"></div></a>
            </div>

            <div class="button-container">
                <button class="splide__arrow custom-prev btn-prev" aria-label="Previous slide">Previous</button>
                <button class="splide__arrow custom-next btn-next" aria-label="Next slide">Next</button>
            </div>
        </div>

        <div class="splide__track">
            <ul class="splide__list">
                <?php
                        $colourSchemes = ['blue', 'mint', 'yellow', 'green']; // Array of color schemes

                        // Loop through posts in pairs
                        while ($latest->have_posts()) : $latest->the_post();
                        ?>
                <li class="splide__slide">
                    <!-- First stacked slide in the pair -->
                    <?php
                                $index = $latest->current_post;
                                $colourScheme = $colourSchemes[$index % count($colourSchemes)];
                                ?>
                    <a href="<?php the_permalink(); ?>" class="stacked-slide">
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
                                        <h4 class="h4"><?php the_title(); ?></h4>
                                        <div class="post-info">
                                            <?php if (get_the_author_meta('first_name') && get_the_author_meta('last_name')): ?>
                                            <p class="author h5 bold">
                                                <?php echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name'); ?>
                                            </p>
                                            <?php endif; ?>
                                            <p class="date h5 medium-text"><?php echo get_the_date('l d|m|y'); ?></p>
                                        </div>
                                    </div>
                                    <div class="card-bottom">
                                        <p>Read News Article</p>
                                    </div>
                                </div>
                            </div>
                            <div class="img-wrap">
                                <img src="<?php echo get_template_directory_uri() . "/assets/images/jpg/cardiff.jpg"; ?>"
                                    alt="">
                            </div>
                        </div>
                    </a>

                    <!-- Second stacked slide in the pair (if available) -->
                    <?php if ($latest->have_posts()): $latest->the_post(); ?>
                    <?php
                                    $index = $latest->current_post;
                                    $colourScheme = $colourSchemes[$index % count($colourSchemes)];
                                    ?>
                    <a href="<?php the_permalink(); ?>" class="stacked-slide">
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
                                        <h4 class="h4"><?php the_title(); ?></h4>
                                        <div class="post-info">
                                            <?php if (get_the_author_meta('first_name') && get_the_author_meta('last_name')): ?>
                                            <p class="author h5 bold">
                                                <?php echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name'); ?>
                                            </p>
                                            <?php endif; ?>
                                            <p class="date h5 medium-text"><?php echo get_the_date('l d|m|y'); ?></p>
                                        </div>
                                    </div>
                                    <div class="card-bottom">
                                        <p>Read News Article</p>
                                    </div>
                                </div>
                            </div>
                            <div class="img-wrap">
                                <img src="<?php echo get_template_directory_uri() . "/assets/images/jpg/builders.jpg"; ?>"
                                    alt="">
                            </div>
                        </div>
                    </a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>




    <?php }
        if ($layout == 'single_tile_slider') { ?>

    <div class="container_big section-wrapper single-tile-carousel-layout">
        <div class="splide single-tile-carousel" aria-label="Image Gallery">

            <div class="text-container">
                <?php if ($small_title): ?>
                <h2 class="title-tag"><?php echo $small_title ?></h2>
                <?php endif; ?>
                <?php if ($big_title): ?>
                <h3 class="heading h2"><?php echo $big_title ?></h3>
                <?php endif; ?>
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

                    <?php while ($latest->have_posts()) : $latest->the_post(); ?>

                    <?php
                                // get current post index
                                $index = $latest->current_post;


                                // set colour scheme variable to pass to template part
                                set_query_var('colourScheme', $colourSchemes[($index) % 4]); ?>



                    <?php get_template_part('components/includes/post_large_tile_splide_slide', 'colourScheme'); ?>



                    <?php wp_reset_postdata(); ?>
                    <?php endwhile; ?>


                </ul>
            </div>
        </div>

    </div>





    <?php } elseif ($layout == 'grid_with_filter') { ?>

    <div class="posts-grid-with-filter section-wrapper">
        <div class="container">

            <div class="top-section">
                <?php if ($small_title): ?>
                <h2 class="title-tag"><?php echo $small_title ?></h2>
                <?php endif; ?>
                <?php if ($big_title): ?>
                <h3 class="heading h2"><?php echo $big_title ?></h3>
                <?php endif; ?>

                <div class="filter-bar-container">
                    <div class="filter-top-section">
                        <button class="filter-btn">
                            Filter
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/chevron-down.svg' ?>"
                                alt="">
                        </button>
                        <div class="sort-container">
                            <p>Sort by: </p>
                            <button data-sort="newest" class="active">Newest</button>
                            <span>|</span>
                            <button data-sort="oldest">Oldest</button>
                        </div>
                    </div>
                    <div class="filter-bar">
                        <?php
                                // Fetch default WordPress categories
                                $categories = get_terms([
                                    'taxonomy' => 'category',
                                    'hide_empty' => false,
                                ]);

                                // Fetch terms for custom taxonomies
                                $types = get_terms([
                                    'taxonomy' => 'type',
                                    'hide_empty' => false,
                                ]);

                                $topics = get_terms([
                                    'taxonomy' => 'topic',
                                    'hide_empty' => false,
                                ]);

                                $locations = get_terms([
                                    'taxonomy' => 'location',
                                    'hide_empty' => false,
                                ]);

                                // Fetch unique published years
                                global $wpdb;
                                $years = $wpdb->get_col("
    SELECT DISTINCT YEAR(post_date) 
    FROM $wpdb->posts 
    WHERE post_status = 'publish' AND post_type = 'post'
    ORDER BY YEAR(post_date) DESC
");
                                ?>
                        <form class="filter-form custom-dropdown-form" method="POST">
                            <!-- Default WordPress Categories -->
                            <div class="dropdown-wrapper">
                                <div class="custom-dropdown">
                                    <button type="button" class="dropdown-toggle" aria-expanded="false"
                                        aria-labelledby="category-label">
                                        Select Category
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php foreach ($categories as $category): ?>
                                        <li tabindex="0" data-value="<?php echo esc_attr($category->slug); ?>">
                                            <?php echo esc_html($category->name); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <input type="hidden" name="category" id="category" aria-labelledby="category-label">
                                </div>
                                <span id="category-label" class="sr-only">Category</span>
                                <!-- Hidden label for screen readers -->
                            </div>

                            <!-- Custom Taxonomy: Type -->
                            <div class="dropdown-wrapper">
                                <div class="custom-dropdown">
                                    <button type="button" class="dropdown-toggle" aria-expanded="false"
                                        aria-labelledby="type-label">
                                        Select Type
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php foreach ($types as $type): ?>
                                        <li tabindex="0" data-value="<?php echo esc_attr($type->slug); ?>">
                                            <?php echo esc_html($type->name); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <input type="hidden" name="type" id="type" aria-labelledby="type-label">
                                </div>
                                <span id="type-label" class="sr-only">Type</span>
                                <!-- Hidden label for screen readers -->
                            </div>

                            <!-- Custom Taxonomy: Topic -->
                            <div class="dropdown-wrapper">
                                <div class="custom-dropdown">
                                    <button type="button" class="dropdown-toggle" aria-expanded="false"
                                        aria-labelledby="topic-label">
                                        Select Topic
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php foreach ($topics as $topic): ?>
                                        <li tabindex="0" data-value="<?php echo esc_attr($topic->slug); ?>">
                                            <?php echo esc_html($topic->name); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <input type="hidden" name="topic" id="topic" aria-labelledby="topic-label">
                                </div>
                                <span id="topic-label" class="sr-only">Topic</span>
                                <!-- Hidden label for screen readers -->
                            </div>

                            <!-- Custom Taxonomy: Location -->
                            <div class="dropdown-wrapper">
                                <div class="custom-dropdown">
                                    <button type="button" class="dropdown-toggle" aria-expanded="false"
                                        aria-labelledby="location-label">
                                        Select Location
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php foreach ($locations as $location): ?>
                                        <li tabindex="0" data-value="<?php echo esc_attr($location->slug); ?>">
                                            <?php echo esc_html($location->name); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <input type="hidden" name="location" id="location" aria-labelledby="location-label">
                                </div>
                                <span id="location-label" class="sr-only">Location</span>
                                <!-- Hidden label for screen readers -->
                            </div>

                            <!-- Published Year -->
                            <div class="dropdown-wrapper">
                                <div class="custom-dropdown">
                                    <button type="button" class="dropdown-toggle" aria-expanded="false"
                                        aria-labelledby="year-label">
                                        Select Year
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php foreach ($years as $year): ?>
                                        <li tabindex="0" data-value="<?php echo esc_attr($year); ?>">
                                            <?php echo esc_html($year); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <input type="hidden" name="year" id="year" aria-labelledby="year-label">
                                </div>
                                <span id="year-label" class="sr-only">Year</span>
                                <!-- Hidden label for screen readers -->
                            </div>

                            <button type="submit" class="submit-btn btn cobalt text-white">Apply<div
                                    class="btn-arrow-container">
                                </div></button>
                        </form>



                    </div>
                </div>
            </div>

            <div class="posts-container" id="posts-container">
                <?php while ($latest->have_posts()) : $latest->the_post(); ?>


                <?php get_template_part('components/includes/post_card'); ?>
                <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>

        </div>
    </div>



    <?php } elseif ($layout == 'list') { ?>

    <div class="posts-list-layout section-wrapper">
        <div class="container">

            <div class="top-section">
                <?php if ($small_title): ?>
                <h2 class="title-tag"><?php echo esc_html($small_title); ?></h2>
                <?php endif; ?>
                <?php if ($big_title): ?>
                <h3 class="heading h2"><?php echo esc_html($big_title); ?></h3>
                <?php endif; ?>
            </div>

            <div class="filter-bar">
                <button class="filter-button active" data-filter="all">A-Z</button>
                <?php
                        // Get all terms from the 'type' taxonomy
                        $terms = get_terms(array(
                            'taxonomy' => 'type',
                            'hide_empty' => true, // Only show terms with posts
                        ));

                        // Check if terms are retrieved
                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                        ?>
                <button class="filter-button" data-filter="<?php echo esc_attr($term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </button>
                <?php
                            }
                        }
                        ?>
            </div>

            <div class="posts-container">
                <?php
                        if (!empty($terms) && !is_wp_error($terms)) {
                            $colourSchemes = ['blue', 'green', 'yellow', 'mint'];
                            $index = 0;

                            foreach ($terms as $term) {
                                // Fetch posts associated with this term
                                $args = array(
                                    'post_type' => $chosen_post_type, // Adjust if your custom post type is different
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'type',
                                            'field' => 'term_id',
                                            'terms' => $term->term_id,
                                        ),
                                    ),
                                    'posts_per_page' => -1, // Show all posts for this term
                                );

                                $query = new WP_Query($args);

                                // Only display the term name if there are posts
                                if ($query->have_posts()) {
                                    $colourScheme = $colourSchemes[$index % count($colourSchemes)];
                        ?>
                <div class="taxonomy-group" data-term="<?php echo esc_attr($term->slug); ?>">
                    <div class="taxonomy-title-container <?php echo esc_attr($colourScheme); ?>-scheme">
                        <p>A - Z</p>
                        <h4 class="taxonomy-title"><?php echo esc_html($term->name); ?> in Wales</h4>
                    </div>

                    <div class="term-posts">
                        <?php
                                            while ($query->have_posts()) {
                                                $query->the_post();
                                            ?>
                        <a href="<?php the_permalink(); ?>" class="post-link"
                            aria-label="Read more about <?php the_title_attribute(); ?>">
                            <div class="post-container">
                                <h3 class="post-title"><?php the_title(); ?></h3>
                                <div class="post-read-more-container">
                                    <p class="post-read-more">Read more</p>
                                </div>
                            </div>
                        </a>
                        <?php
                                            }
                                            ?>
                    </div>
                </div>
                <?php
                                    $index++;
                                }

                                wp_reset_postdata();
                            }
                        }
                        ?>
            </div>

        </div>
    </div>




    <?php }
    }
    ?>




    <!-------------------------- original non ACF layout --------------------------------->





    <?php if ($layoutOld == 'news'): ?>

    <!-------------------------- News Feed Layout --------------------------------->

    <div class="splide post-feed-carousel section-wrapper" aria-label="News Feed">

        <div class="text-container">
            <h2 class="title-tag">News</h2>
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



    <?php elseif ($layoutOld == 'press-releases'): ?>

    <!-------------------------- Press Releases Layout --------------------------------->

    <div class="splide press-releases-carousel section-wrapper" aria-label="News Feed">

        <div class="text-container">
            <div class="text-inner">
                <p class="title-tag">News</p>
                <h3 class="heading h2">Stay connected with our latest news and updates</h3>
                <a href="" class="btn cobalt text-white">All Press & Media<div class="btn-arrow-container"></div></a>
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



    <!-------------------------- Slider layout --------------------------------->



    <?php endif ?>





</section>