<?php 
$row = get_row_index() - 0;

$small_title = get_sub_field('small_title');
$big_title = get_sub_field('big_title');
$intro_text = get_sub_field('intro_text');

$full_width_video = get_sub_field('video');
$native_or_iframe = get_sub_field('native_or_iframe');
$autoplay = get_sub_field('autoplay');
$overlay = get_sub_field('overlay');
$video_link = get_sub_field('video_link');
$video_file = get_sub_field('video_file');
$whole_viewport = get_sub_field('whole_viewport');
$preview = get_sub_field('preview_image');

$columns = get_sub_field('columns');
$embed_code = get_sub_field('embed_code');

?>

<section class="section_iframe fade-in row-<?php echo $row; ?>">

    <div class="container">
        <div class="iframe_grid <?php if($columns == true) { ?> two_cols <?php } else { ?> one_col <?php } ?>">
            <!-- check if there's a title or an intro_text, if so generate a textbox -->
            <?php if($big_title) { ?>
            <div class="text_wrap">
                <div class="title_wrap">
                    <?php if($small_title) { ?><h5><?php echo $small_title; ?></h5><?php } ?>
                    <?php if($big_title) { ?><h2><?php echo $big_title; ?></h2><?php } ?>
                </div>
                <?php if($intro_text) { ?><?php echo $intro_text; ?><?php } ?>
            </div>
            <?php } ?>
            <div class="iframe_wrap">
                <?php if($embed_code) { echo $embed_code; } else { ?>
                <div class="placeholder_wrap">
                    <!-- crosshatched placeholder -->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>