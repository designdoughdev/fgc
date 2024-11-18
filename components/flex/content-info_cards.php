<?php
$row = get_row_index() - 0;
$smallTitle = get_sub_field('small_title');
$bigTitle = get_sub_field('big_title');
$body = get_sub_field('body');
$infoCards = get_sub_field('selected_posts');
?>



<section class="section_info_cards row-<?php // echo $row; 
                                        ?>">


    <div class="container">


        <div class="section-content">
            <?php if ($smallTitle): ?>
            <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
            <?php endif; ?>

            <div class="top-section">
                <div class="title-wrap">

                    <?php if ($bigTitle): ?>
                    <h3 class="heading"><?php echo $bigTitle; ?></h3>
                    <?php endif; // big title 
                    ?>
                </div>
            </div>

            <!-------------------------- Info cards/tiles --------------------------------->


            <div class="cards-section">

                <?php $colourSchemes = ['mint', 'blue', 'yellow']; ?>

                <?php while (have_rows('cards')) : the_row(); ?>

                <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>

                <?php $cardTitle = get_sub_field('card_title'); ?>
                <?php $cardBody = get_sub_field('card_body'); ?>



                <div class="info-card <?php echo $colourScheme; ?>-scheme">

                    <div class="text-content">
                        <p class="tag h6 card-index"><?php if (get_row_index() < 10) {
                                                                echo 0;
                                                            }
                                                            echo get_row_index(); ?></p>
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