<?php
$row = get_row_index() - 0;
$videoUrl = get_sub_field('video');
$videoCaption = get_sub_field('video_caption');
?>

<section class="video-section row-<?php echo $row; ?>">
    <div class="container_small">
        <div class="video-wrapper">
            <video id="video-<?php echo $row; ?>" playsinline>
                <source src="<?php if ($videoUrl) { echo $videoUrl; } ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <button class="play-button" id="play-button-<?php echo $row; ?>">Watch Video Now                                     <img class="play-icon"
            src="<?php bloginfo('template_url'); ?>/assets/images/svg/play-icon.svg" alt=""></button>
        </div>
        <?php if ($videoCaption): ?>
            <p class="video-caption"><?php echo $videoCaption; ?></p>
        <?php endif; ?>
    </div>
</section>
