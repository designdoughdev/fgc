<?php
    $row = get_row_index() - 0; 

    $small_title = get_sub_field('small_title');
    $big_title = get_sub_field('big_title');    

?>


<section class="section_accordion row-<?php echo $row; ?>">
    <div class="container_small">
        <div class="title_wrap">
            <?php if($small_title) { ?><p class="title-tag"><?php echo $small_title; ?></p><?php } ?>
            <?php if($big_title) { ?><h2 class="heading"><?php echo $big_title; ?></h2><?php } ?>
           
        </div>

        <div class="accordion_container">
            <div class="accordion_items">
                <?php $colourSchemes = ['mint', 'yellow', 'blue', 'navy' ]; ?>


                <?php if(have_rows('accordion_items')) : while(have_rows('accordion_items')) : the_row(); ?>
                <?php $item_title = get_sub_field('item_title'); ?>
                <?php $item_body_text = get_sub_field('item_body_text'); ?>
                <?php $link = get_sub_field('link'); ?>

                <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 4]; ?>

                <div class="item-outer-container">
                    <div class="accordion_item <?php echo $colourScheme; ?>-scheme accord_wrap"> 


                    
                  
                        <div class="tag-container">
                            <p class="tag"><?php if (get_row_index() < 10) { echo 0;} echo get_row_index(); ?></p>
                        </div>                     
                        <h4 class="item_title accord_head"><?php echo $item_title; ?></h4>
                        <button class="accord_btn"><span>Learn more</span><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-right.svg'; ?>" alt=""></button>
                        
            


                        <div class="item_body_text accord_body"><?php echo $item_body_text; ?></div>
                            <?php if($link) { ?>
                                <a class="btn_default" href="<?php echo esc_url($link['url']); ?>"
                                    target="<?php echo esc_attr($link['target']); ?>"><span><?php echo esc_html($link['title']); ?></span></a>
                            <?php } ?>

                            <div class="bars-container">
                                <?php
                                                    // horizontal bars
                                                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                                                    ?>
                            </div>

                        
                        </div>

                    </div>





     


                <?php endwhile; endif; ?>
            </div>
        </div>

    </div>
</section>