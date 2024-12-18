<?php
$row = get_row_index() - 0;
$add_background = get_sub_field('add_background');
$smallTitle = get_sub_field('small_title');
$bigTitle = get_sub_field('big_title');
$body = get_sub_field('body');
$style = get_sub_field('style');
$infoCards = get_sub_field('selected_posts');
?>



<section class="section_info_cards row-<?php // echo $row; 
                                        ?>">


    <div class="container_big background-container <?php if ($add_background) {
                                                        echo " add-background ";
                                                    } ?>">



        <div class="section-content">
            <?php if ($smallTitle): ?>
            <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
            <?php endif; ?>

            <?php if ($bigTitle || $body): ?>

            <div class="top-section">
                <div class="title-wrap">

                    <?php if ($bigTitle): ?>
                    <h3 class="heading"><?php echo $bigTitle; ?></h3>
                    <?php endif; // big title 
                        ?>
                </div>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                    ?>
            </div>
            <?php endif; ?>

            <!-------------------------- Info cards/tiles --------------------------------->


            <div class="cards-section">

                <?php $colourSchemes = ['blue', 'yellow', 'mint']; ?>

                <?php while (have_rows('cards')) : the_row(); ?>

                <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>

                <?php $icon = get_sub_field('icon'); ?>
                <?php $cardTitle = get_sub_field('card_title'); ?>
                <?php $cardBody = get_sub_field('card_body'); ?>



                <div class="info-card <?php echo $colourScheme; ?>-scheme">

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


                </div>
                <?php endwhile; ?>
            </div>

            <!--------------------------  --------------------------------->

        </div>






    </div>

</section>