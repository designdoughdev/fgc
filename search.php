<?php
$smallTitle = get_field('small_title');
$bigTitle = get_field('big_title');
$body = get_field('body');

?>


<?php get_header(); ?>




<section class="search-results-content">
    <div class="container_small">
        <h2 class="title_tag">Search Results for: <?php echo get_search_query(); ?></h2>
        <?php
        // Loop through the query results
        if (have_posts()) : ?>

        <?php
            while (have_posts()) : the_post(); ?>



        <div class="page-item-container">
            <a href="<?php the_permalink(); ?>" class="post-link"
                aria-label="Read more about <?php the_title_attribute(); ?>">
                <div class="post-container">
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <div class="post-read-more-container">
                        <p class="post-read-more">Read more</p>
                    </div>
                </div>
            </a>

        </div>

        <?php
            endwhile;

        else : ?>
        <p class="no-results-msg">Sorry, no results found</p>
        <?php
        endif;
        ?>

    </div>


</section>


<?php get_footer(); ?>