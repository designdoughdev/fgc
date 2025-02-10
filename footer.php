</main>
<footer class="relative">
    <img class="horizontal-bars" src="<?php bloginfo('template_url'); ?>/assets/images/svg/horizontal-bars.svg" alt="">


    <div class="footer-content container relative">
        <div class="footer-top">
            <div class="footer-top-left">
                <div class="top-left-content">
                <?php while( have_rows('footer', 'option') ): the_row(); 

                    $footerLeftTitle = get_sub_field('footer_left_small_title'); 
                    $footerLeftBody = get_sub_field('footer_left_body'); 
                    ?>
                    <?php if ($footerLeftTitle): ?>
                    <h3 class="title-tag"><?php echo $footerLeftTitle; ?></h3>
                    <?php endif; ?>
                    <?php if ($footerLeftBody): ?>
                    <h4 class="heading"><?php echo $footerLeftBody; ?>
                    </h4>
                    <?php endif; ?>

                    <?php endwhile; ?>
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
                        <?php if ($textAreaOne) echo $textAreaOne; ?>
                    </div>
                </div>
                <div class="col">

                <div class="text-content">
                    <?php if ($textAreaTwo) echo $textAreaTwo; ?>
                </div>
                </div>
                <div class="col">

                <div class="text-content">
                    <?php if ($textAreaThree) echo $textAreaThree; ?>
                </div>
                </div>
                <div class="col">

                    <div class="text-content">
                        <?php if ($textAreaFour) echo $textAreaFour; ?>
                    </div>
                    <?php endwhile; ?>

                    <?php 
$social_accounts = get_field('social_accounts', 'option');

if ($social_accounts) : ?>
    <ul class="social-accounts" role="list">
        <?php foreach ($social_accounts as $account) : 
            $image = isset($account['social_icon']) ? $account['social_icon'] : null;
            $link = isset($account['social_link']) ? $account['social_link'] : null;
        ?>

            <?php if ($link || $image) : // Ensure we have at least one valid field ?>
                <li role="listitem">
                    <?php 
                        $url = $link['url'] ?? '#'; // Default to "#" if no URL
                        $target = !empty($link['target']) ? esc_attr($link['target']) : '_self'; // Check if target is set
                        $rel = $target === '_blank' ? 'noopener noreferrer' : ''; // Security best practice
                    ?>

                    <?php if ($link) : ?>
                        <a href="<?php echo esc_url($url); ?>" target="<?php echo $target; ?>" rel="<?php echo esc_attr($rel); ?>">
                    <?php endif; ?>

                    <?php if ($image && !empty($image['url'])) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" 
                             alt="<?php echo esc_attr($image['alt'] ?? 'Social media icon'); ?>"
                             width="<?php echo esc_attr($image['width'] ?? '40'); ?>" 
                             height="<?php echo esc_attr($image['height'] ?? '40'); ?>">
                    <?php endif; ?>

                    <?php if ($link) : ?>
                        </a>
                    <?php endif; ?>
                </li>
            <?php endif; ?>

        <?php endforeach; ?>
    </ul>
<?php endif; ?>



                        




                </div>

    



                
            </div>

        </div>
    </div>

</footer>


<?php
wp_footer();
?>
</body>

</html>