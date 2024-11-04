<?php
// $row = get_row_index() - 0; 

// $small_title = get_sub_field('small_title');
// $big_title = get_sub_field('big_title');
// $intro_text = get_sub_field('intro_text');
// $link = get_sub_field('link');
// $layout = get_sub_field('layout');
?>

<section class="section_text_and_image row-<?php // echo $row; 
                                            ?>">
    <div class="section-wrapper container relative">
        <?php
        // $row = get_sub_field('columns', $post->ID);
        // if ($row < 1) {
        //     $rows = 0;
        // } else {
        //     $rows = count($row);
        // }
        ?>

        <div class="col">
            <p class="title-tag">Public Bodies</p>
            <h3 class="heading h2 text-white">Find out more information about your local public body.</h3>
            <a href="/" class="link btn text-white sky-blue">Visit Page</a>
        </div>

        <?php
        echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
        ?>



    </div>
</section>