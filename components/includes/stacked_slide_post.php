<?php

$author = get_field('author');


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
                        <?php if ($author): ?>
                        <p class="author h5 bold">
                            <?php echo $author; ?>
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
            <img src="<?php echo get_template_directory_uri() . "/assets/images/jpg/cardiff.jpg"; ?>" alt="">
        </div>
    </div>
</a>