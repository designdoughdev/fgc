<?php

$author = get_field('author');
$post_type = get_post_type();

// this varies from post type to post type.
// if the post has a linkout_or__flex selector and it set to 'direct',
// set the link to the 'url_' field.
// else, use the permalink and link to single.php

$link = '';
if($post_type == 'resources_posts' || $post_type == 'public_info') {
    // get the selector field
    $linkout_or_flex = get_field('resource_link_type');
    $url = get_field('url_');
    if ($linkout_or_flex == 'direct') {
        $link = $url;
    } else {
        $link = get_permalink();
    }
} if($post_type == 'public-service-board' || $post_type == 'public-body') {
	// get the website link field
    $site_link = get_field('website');
	$link = $site_link['url'];
} else {
    $link = get_permalink();
}

?>

<a href="<?= $link; ?>" class="post-card-wrapper-link">
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
                <?php if ($author): ?>
                <p class="author h5 bold">
                    <?php echo $author; ?>
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
