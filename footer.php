</main>
<footer class="relative">
    <img class="horizontal-bars" src="<?php bloginfo('template_url'); ?>/assets/images/svg/horizontal-bars.svg" alt="">


    <div class="footer-content container relative">
        <div class="footer-top">
            <div class="footer-top-left">
                <div class="top-left-content">
                    <h3 class="title-tag">Newsletter</h3>
                    <h4 class="heading">Lorem ipsum dolor sit amet consectetur. Ultrices nec ac. Consectet
                        lorem ipsum.
                    </h4>
                    <div class="signup-container">
                        <input type="email" placeholder="Email">
                        <button><img src="<?php bloginfo('template_url'); ?>/assets/images/svg/arrow-right-sky-blue.svg"
                                alt=""></button>
                    </div>

                </div>


            </div>
            <div class="footer-top-right">
                <?php if (have_rows('root_menu_pages', 'option')): ?>
                    <?php while (have_rows('root_menu_pages', 'option')) : the_row(); ?>
                        <?php $pageID = get_sub_field('root_menu_page'); ?>

                        <div class="menu-col">
                            <ul>
                            <li class="menu-parent-page"><?php echo get_the_title($pageID); ?></li>

                            <?php while (have_rows('child_menu_items')) : the_row(); ?>

                                <?php $child = get_sub_field('Child_Menu_Item'); ?>


                                
                                <li><a href="<?php echo esc_url(get_permalink($child->ID)); ?>" aria-label="Visit <?php echo esc_attr($child->post_title); ?>"class="menu-child-page"><?php echo esc_html($child->post_title); ?></a></li>
                            <?php endwhile; ?>


                            </ul>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>




            </div>

        </div>
        <div class="footer-bottom">

            <div class="footer-bottom-left">
                <img class="logo-white" src="<?php bloginfo('template_url'); ?>/assets/images/svg/logo-white.svg"
                    alt="">

            </div>

            <div class="footer-bottom-right">

            <?php 
            while( have_rows('footer', 'option') ): the_row(); 

                // Get sub field values.
                $textAreaOne = get_sub_field('text_area_1'); 
                $textAreaTwo = get_sub_field('text_area_2'); 
                $textAreaThree = get_sub_field('text_area_3'); 
                $textAreaFour = get_sub_field('text_area_4'); 
                ?>
           
                <div class="col">

                    <div class="text-content">
                        <?php echo $textAreaOne; ?>
                    </div>
                </div>
                <div class="col">

                <div class="text-content">
                    <?php echo $textAreaTwo; ?>
                </div>
                </div>
                <div class="col">

                <div class="text-content">
                    <?php echo $textAreaThree; ?>
                </div>
                </div>
                <div class="col">

                <div class="text-content">
                    <?php echo $textAreaFour; ?>
                </div>
                </div>

    



                <?php endwhile; ?>
            </div>

        </div>
    </div>

</footer>


<?php
wp_footer();
?>
</body>

</html>