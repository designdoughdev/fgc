<?php
// $row = get_row_index() - 0;

$small_title = get_sub_field('small_title');
$big_title = get_sub_field('big_title');

// Get all registered public post types excluding pages, posts, and media
$post_types = get_post_types(['public' => true], 'objects');
$excluded_types = ['post', 'page', 'attachment'];
?>

<section class="fade_in_element section_big_search row-<?php echo $row; ?>" >
    <div class="container">
        <div class="search-wrapper">
            <div class="triangle"></div>
            <div class="search-flex-content">
                
                <?php if ($small_title): ?>
                <h2 class="title-tag"><?php echo esc_html($small_title); ?></h2>
                <?php else: ?>
                <h2 class="title-tag">Resources</h2>
                <?php endif; ?>
                
                <?php if ($big_title): ?>
                <h3 class="heading h1"><?php echo esc_html($big_title); ?></h3>
                <?php else: ?>
                <h3 class="heading h1">Looking for something specific?</h3>
                <?php endif; ?>
                
                <form class="search-form big-search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get"
                    role="search" aria-label="Site Search">
                    <div class="search-box">
                        <input class="input" type="text" name="s" placeholder="Search" aria-label="Search query" required>
                        <button class="cobalt btn" type="submit" aria-label="Submit search">
                            <img class="search-icon" src="<?php bloginfo('template_url'); ?>/assets/images/svg/search-icon.svg" alt="Search icon">
                            <span class="search-text text-white">Search</span>
                            <div class="btn-arrow-container"></div>
                        </button>
                    </div>

                    <label for="post_type">Category</label>
                    <div class="custom-dropdown" role="listbox" aria-labelledby="category-label">
                        <button class="dropdown-toggle" type="button" id="category-label" aria-haspopup="listbox" aria-expanded="false">
                            Select Category
                        </button>
                        <ul class="dropdown-menu" role="listbox" aria-hidden="true">
                            <?php foreach ($post_types as $type): ?>
                                <?php if (!in_array($type->name, $excluded_types)): ?>
                                    <li role="option" tabindex="-1" data-value="<?php echo esc_attr($type->name); ?>">
                                        <?php echo esc_html($type->label); ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="post_type" id="post_type_input">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
