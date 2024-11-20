<a href="/" class="post-card-wrapper-link">
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
</a>