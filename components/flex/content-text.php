<?php
$row = get_row_index() - 0;

$small_title = get_sub_field('small_title');
$text_editor = get_sub_field('text_editor');

?>

<!-- todo: add downloadables and links to columns and no column layouts. -->

<section class="section_text row-<?php echo $row; ?>">
    <div class="container_small">

        <div class="flex-content">
            <h2 class="title-tag">international</h2>

            <div class="text-editor">
                <?php echo $text_editor; ?>
            </div>

        </div>


    </div>
</section>