<?php
$row = get_row_index() - 0;

$img = get_sub_field('image');
$link = get_sub_field('link');

?>


<section class="fade_in_element image-section row-<?php echo $row; ?> ">

    <div class="container_small">
        <div class="img-wrap">
            <img src="<?php echo $img['url'] ?>" alt="">
        </div>
        <?php if ($img['caption']): ?>
        <?php if($link) { ?>
        <p class="img-caption"><a href="<?= $link['url']; ?>"><?php echo $img['caption'] ?></a></p>
        <?php } else { ?>
        <p class="img-caption"><?php echo $img['caption'] ?></p>
        <?php } ?>
        <?php endif; ?>
    </div>

</section>