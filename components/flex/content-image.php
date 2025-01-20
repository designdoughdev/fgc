<?php
$row = get_row_index() - 0;


$img = get_sub_field('image');


?>


<section class="image-section row-<?php echo $row; ?> ">

    <div class="container_small">
        <div class="img-wrap">
            <img src="<?php echo $img['url'] ?>" alt="">
        </div>
        <?php if ($img['caption']): ?>
            <p class="img-caption"><?php echo $img['caption'] ?> </p>
        <?php endif; ?>



    </div>

</section>