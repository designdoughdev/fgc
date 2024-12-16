<?php
$row = get_row_index() - 0;

$small_title = get_sub_field('small_title');
$text_editor = get_sub_field('text_editor');

?>

<!-- todo: add downloadables and links to columns and no column layouts. -->

<section class="section_text row-<?php echo $row; ?>">
    <div class="container_small">

        <div class="flex-content">
            <?php if ($small_title): ?>
            <h2 class="title-tag"><?php echo $small_title; ?></h2>
            <?php endif ?>

            <div class="text-editor">
                <?php echo $text_editor; ?>
            </div>

        </div>


    </div>
</section>