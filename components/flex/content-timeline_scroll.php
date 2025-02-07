<?php
    $row = get_row_index() - 0; 

    $small_title = get_sub_field('small_title');
    $big_title = get_sub_field('big_title');
    $intro_text = get_sub_field('intro_text');
    $icon = get_sub_field('icon');
    

?>


<section class="section_timeline_scroll row-<?php echo $row; ?>">
    <div class="container_small">
        <div class="title_wrap">
            <?php if($small_title) { ?><p class="title-tag"><?php echo $small_title; ?></p><?php } ?>
            <?php if($big_title) { ?><h2 class="heading"><?php echo $big_title; ?></h2><?php } ?>
            <?php if($intro_text) { ?><h4 class="intro_text"><?php echo $intro_text; ?></h4><?php } ?>
           
        </div>

        <div class="timeline_container">
            <div class="scroll-container">
                <div class="scroll-line"></div>
                <?php if($icon): ?>
                    <img class="timeline_scroll_icon" src="<?php echo $icon; ?>" alt="">
                <?php endif; ?>
                
            </div>
            <div class="timeline_stages">
                <?php $colourSchemes = ['blue', 'yellow', 'mint']; ?>
                <?php $totalCards = count(get_sub_field('timeline_stages')); ?>


                <?php if(have_rows('timeline_stages')) : while(have_rows('timeline_stages')) : the_row(); ?>
                <?php $stage_title = get_sub_field('stage_title'); ?>
                <?php $stage_body_text = get_sub_field('stage_body_text'); ?>
                <?php $stage_icon = get_sub_field('stage_icon'); ?>
                <?php $link = get_sub_field('link'); ?>

                <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>

                <div class="timeline_stage <?php echo $colourScheme; ?>-scheme accord_wrap">


                    
                    <div class="stage_title_wrap accord_head">
                        
                        <h4 class="stage_title"><?php echo $stage_title; ?></h4>
                        <button class="btn-vthree"><div class="btn-arrow-container"></div></button>
                    </div>


                    <div class="stage_body_text accord_body">
                        <div class="body-text-container">
                            <?php echo $stage_body_text; ?>

                        </div>
                        
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



     


                <?php endwhile; endif; ?>
            </div>
        </div>

    </div>
</section>