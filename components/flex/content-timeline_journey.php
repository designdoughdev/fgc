<?php
    $row = get_row_index() - 0; 

    

?>


<section class="section_timeline_journey row-<?php echo $row; ?>">
    <div class="container">

        <div class="timeline_container">

            <div class="timeline_stages">
                <?php $colourSchemes = ['mint', 'blue', 'yellow', 'navy']; ?>



                <?php if(have_rows('timeline_stages')) : while(have_rows('timeline_stages')) : the_row(); ?>

                <?php $small_title = get_sub_field('stage_small_title'); ?>
                <?php $big_title = get_sub_field('stage_title'); ?>
                <?php $stage_body_text = get_sub_field('stage_body_text'); ?>
				<?php $stage_link = get_sub_field('stage_link'); ?>
                <?php $four_columns = get_sub_field('four_columns'); ?>
                <?php // $centerAlign = get_sub_field('center_align_cards'); ?>
                

                <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 4]; ?>

                <div class="timeline_stage_journey <?php echo $colourScheme; ?>-scheme ">
                    <?php if (get_row_index() != 1): // dont display for first item?>
                    <div class="line-container top">
                        <div class="line"></div>
                    </div>
                    <?php endif; ?>
                    <p class="timeline-stage-index">
                        <?php  if (get_row_index() > 0 && get_row_index() < 10) { echo 0;} echo get_row_index(); ?></p>
                    <div class="line-container bottom">
                        <div class="line"></div>
                    </div>


                    
                    <div class="stage-content">
                        <?php if ($small_title): ?>
                            <h2 class="title-tag"><?php echo $small_title; ?></h2>
                        <?php endif; ?>
                        <?php if ($big_title): ?>
                            <h3 class="heading"><?php echo $big_title; ?></h3>
                        <?php endif; ?>

                        <?php if ($stage_body_text): ?>
                            <div class="stage_body_text"><?php echo $stage_body_text; ?></div>
                        <?php endif; ?>
						
						<?php if ($stage_link): ?>
                        <a href="<?php echo esc_url($stage_link['url']); ?>" class="post-link btn"
                            target="<?php echo esc_attr($stage_link['target'] ?: '_self'); ?>"
                            aria-label="Read more about <?php echo esc_attr($stage_link['title']); ?>">
                            <?php echo esc_attr($stage_link['title']); ?>
                            <div class="btn-arrow-container"></div>
                        </a>
                        <?php endif; ?>

                        <?php if (have_rows('cards')): ?>
                            <div class="cards-section <?php if ($four_columns) { echo " four_columns "; } ?>">
                        <?php endif; ?>

                            <?php while (have_rows('cards')) : the_row(); ?>


                                <?php $icon = get_sub_field('icon'); ?>
                                <?php $cardTitle = get_sub_field('card_title'); ?>
                                <?php $cardBody = get_sub_field('card_body'); ?>
                                <?php $link = get_sub_field('link'); ?>



                                <div class="info-card <?php if ($centerAlign){echo " centered ";} ?>">

                                    <div class="text-content">
                                

                                        <div class="icon-container">

                                            <?php if ($icon): ?>

                                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: 'Default alt text for icon'); ?>">
                                            <?php endif; ?>

                                        </div>
                                        
                                        <h4 class="card-title"><?php echo $cardTitle; ?></h4>
                                        <p class="card-body"><?php echo $cardBody; ?></p>

                                        <?php if ($link): ?>
                                            <a href="<?php echo esc_url($link['url']); ?>" 
                                            class="post-link btn" 
                                            target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" 
                                            aria-label="Read more about <?php echo esc_attr($link['title']); ?>">
                                                Read more 
                                                <div class="btn-arrow-container"></div>
                                            </a>
                                        <?php endif; ?>

                                    </div>


                                </div>
                            <?php endwhile; ?>

                        <?php if (have_rows('cards')): ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>



                <?php endwhile; endif; ?>
                <div class="line-container top">
                        <div class="line"></div>
                    </div>
            </div>
        </div>

    </div>
</section>