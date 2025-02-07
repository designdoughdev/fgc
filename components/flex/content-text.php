<?php
$row = get_row_index();

$small_title = get_sub_field('small_title');
$text_editor = get_sub_field('text_editor');
$sideMenu = get_sub_field('side_menu');
?>

<!-- Section with improved accessibility and flexibility -->
<section class="section_text row-<?php echo esc_attr($row); ?>">
    <div class="container_small">
        <div class="inner-container">
            <div class="flex-content">
                <?php if ($small_title): ?>
                <h2 class="title-tag"> <?php echo esc_html($small_title); ?> </h2>
                <?php endif; ?>

                <div class="text-editor">
                    <?php echo wp_kses_post($text_editor); ?>
                </div>

                <?php if (have_rows('links_section')): ?>
                <?php while (have_rows('links_section')) : the_row(); ?>

                <?php if (have_rows('links')): ?>
                <div class="links-container">
                    <?php $linksTitle = get_sub_field('links_title'); ?>
                    <?php if ($linksTitle): ?>
                    <h3 class="links-title">
                        <?php echo $linksTitle; ?>
                    </h3>
                    <?php endif; // link title if
                                ?>

                    <?php while (have_rows('links')) : the_row();
                                    $link = get_sub_field('link');


                                    $link_url = esc_url($link['url']);
                                    $link_title = esc_html($link['title']);
                                    $link_target = $link['target'] ? esc_attr($link['target']) : '_self';
                                ?>

                    <a class="link" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"
                        rel="noopener noreferrer" name="<?php echo esc_attr($link_title); ?>">
                        <?php echo $link_title; ?>
                    </a>


                    <?php endwhile; // links while
                                ?>
                </div>
                <?php endif; // links if
                        ?>

                <?php endwhile; // links section while
                    ?>
                <?php endif; //links section if
                ?>
            </div>

            <?php if ($sideMenu): ?>
                <?php

                    // Get the current page object
                    global $post;

                    // Get the parent page ID
                    $parent_id = $post->post_parent;

                    

                    // Query sibling pages (same level as current page)
                    $args = array(
                        'post_type'      => 'page',
                        'post_parent'    => $parent_id,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                        'post_status'    => 'publish',
                        'post__not_in'   => array($post->ID), // Exclude current page
                    );

                    $sibling_pages = new WP_Query($args);

                ?>
                

            <div class="side-menu-container">
            <h3 class="parent-page-title"><?php echo get_the_title($parent_id); ?> </h3>

                <nav>
                    <ul>
                            <?php 

                            // Display the sibling pages
                            if ($sibling_pages->have_posts()): ?>
                                <?php while ($sibling_pages->have_posts()): $sibling_pages->the_post();
                            ?>
                        <li><a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                                endwhile;
                                wp_reset_postdata(); // Reset post data after custom query
                            endif;
                            ?>
                    </ul>
                </nav>

            </div>

            <?php endif; ?>



        </div>

    </div>
</section>