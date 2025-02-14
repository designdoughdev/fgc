<li class="splide__slide relative">
    <a href="<?php echo the_permalink(); ?>">
        <div class="post-card-large-tile ">

            <div class="img-wrap">
                <?php
                // Check if the post has a featured image
                if (has_post_thumbnail()) {
                    // Get the ID of the featured image
                    $image_id = get_post_thumbnail_id();

                    // Set up the array of arguments for build_srcset (modify if needed)
                    $selectedPostImage = array(
                        'class' => '',
                        'id' => $image_id,
                        'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true), // Get alt text
                        'lazyload' => false
                    );


                    echo build_srcset('banner', $selectedPostImage);
                }
                ?>

            </div>

            <div class="post-card text-content <?php echo $colourScheme; ?>-style">
                <div class="card-top">
                    <div class="tag-container">

                        <p class=" tag h6">Explore</p>
                        <p class="tag h6">Do</p>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="h4">
                        <?php the_title(); ?>
                    </h4>

                    <div class="post-info">
                        <?php if (get_the_author_meta('first_name') && get_the_author_meta('last_name')): ?>
                        <p class="author h5 bold">
                            <?php echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name'); ?>
                        </p>
                        <?php endif; ?>
                        <p class="date h5 medium-text">
                            <?php echo get_the_date('l') . " " . get_the_date('d|m|y'); ?>
                        </p>

                    </div>

                </div>
                <div class="card-bottom">
                    <p>Read News Article</p>

                </div>

            </div>





        </div>
    </a>
</li>