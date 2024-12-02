<nav class="mobile-nav overlay closed">




    <!-- Overlay content -->
    <div class="menu-content">
        <!-- Button to close the overlay navigation -->
        <button class="mobile-menu-close-btn">&times;</button>
        <div class="menu-content-inner-wrapper">
            <ul>
                <p class="title-tag">Welcome</p>

                <?php if (have_rows('root_menu_pages', 'option')): ?>


                    <?php while (have_rows('root_menu_pages', 'option')) : the_row(); ?>
                        <?php $pageID = get_sub_field('root_menu_page'); ?>
                        <a href="" class="menu-item-link">
                            <li class="menu-item root-menu-item"><?php echo esc_attr(get_the_title($pageID)); ?>
                            </li>
                            <div class="menu-item-icon"></div>
                        </a>



                    <?php endwhile; ?>


                <?php endif; ?>

            </ul>

            <?php if (have_rows('mobile_menu_links', 'option')): ?>
                <div class="mobile-menu-links">

                    <?php while (have_rows('mobile_menu_links', 'option')) : the_row(); ?>
                        <?php $pageID = get_sub_field('mobile_page_link'); ?>
                        <a href="" class="mobile-menu-link">
                            <li class="mobile-menu-link-item"><?php echo esc_attr(get_the_title($pageID)); ?>
                            </li>

                        </a>


                    <?php endwhile; ?>
                </div>


            <?php endif; ?>

            <div class="mobile-menu-bottom">
                <div class="col social-col">
                    <h3 class="title">Social</h3>

                    <?php if (have_rows('social_accounts', 'option')): ?>
                        <div class="social-icons">

                            <?php while (have_rows('social_accounts', 'option')) : the_row(); ?>
                                <?php $socialIcon = get_sub_field('social_icon_alternate'); ?>
                                <img class="social-icon" src="<?php echo $socialIcon['url']; ?>" alt="">


                            <?php endwhile; ?>
                        </div>

                    <?php endif; ?>






                </div>
                <div class="col contact-col">
                    <h3 class="title">Contact</h3>

                    <?php if (have_rows('footer', 'option')): ?>


                        <?php while (have_rows('footer', 'option')) : the_row(); ?>
                            <?php $contactInfo = get_sub_field('text_area_2'); ?>
                            <div class="contact-info"><?php echo $contactInfo; ?></div>


                        <?php endwhile; ?>
                </div>


            <?php endif; ?>


            </div>
        </div>



    </div>

    <!-- <div class="bars-container">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars-small.svg'); ?>
        </div> -->




    </div>



</nav>