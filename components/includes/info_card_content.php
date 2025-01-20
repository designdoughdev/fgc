<div class="text-content">
    <?php if ($style == 'icons'): ?>


        <div class="icon-container">

            <?php if ($icon): ?>

                <?php
                echo file_get_contents(get_template_directory() . '/assets/images/svg/' . $icon . '-icon.svg');
                ?>
            <?php endif; ?>

        </div>
    <?php else:  // numbered style 
    ?>
        <p class="tag card-index"><?php if (get_row_index() < 10) {
                                        echo 0;
                                    }
                                    echo get_row_index(); ?></p>
    <?php endif; ?>
    <h4 class="card-title"><?php echo $cardTitle; ?></h4>
    <p class="card-body"><?php echo $cardBody; ?></p>

</div>