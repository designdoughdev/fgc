<div class="search-container">
    <img class="search-icon" src="<?php bloginfo('template_url'); ?>/assets/images/svg/search-icon.svg"
        alt="Search Icon" role="presentation">
    <form class="search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search"
        aria-labelledby="search-input">
        <input class="h5 text-white" type="text" name="s" id="search-input" placeholder="SEARCH"
            aria-placeholder="Enter search terms" aria-label="Search for content" required>
    </form>
</div>