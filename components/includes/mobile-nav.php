<nav class="mobile-nav overlay">




    <!-- Overlay content -->
    <div class="menu-content">
        <!-- Button to close the overlay navigation -->
        <div class="menu-content-inner-wrapper">
            <div class="text-content">
                <ul>
                    <p class="title-tag">Welcome</p>

                    <?php if (have_rows('root_menu_pages', 'option')): ?>


                    <?php while (have_rows('root_menu_pages', 'option')) : the_row(); ?>
                    <?php $pageID = get_sub_field('root_menu_page'); ?>
                    <button class="root-menu-item-button">
                        <li class="menu-item root-menu-item"><?php echo esc_attr(get_the_title($pageID)); ?>


                        </li>
                        <!-- Sub-menu for child pages -->
                        <?php
                                if (have_rows('child_menu_items')): ?>
                        <div class="sub-menu-content">

                            <div class="text-content">
                                <p class="title-tag">Welcome</p>
                                <h4 class="parent-page-title"><?php echo esc_attr(get_the_title($pageID)); ?></h4>

                                <ul>
                                    <?php while (have_rows('child_menu_items')) : the_row(); ?>
                                    <?php $child = get_sub_field('Child_Menu_Item'); ?>
                                    <a class="child-menu-item h4"
                                        href="<?php echo esc_url(get_permalink($child->ID)); ?>">
                                        <li>

                                            <?php echo esc_html($child->post_title); ?> <div class="menu-item-icon">
                                            </div>
                                        </li>

                                    </a>

                                    <?php endwhile; ?>

                                </ul>

                            </div>

                            <div class="bars-container">
                                <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars-small.svg'); ?>
                            </div>




                        </div>
                        <?php endif; ?>
                        <div class="menu-item-icon"></div>
                    </button>



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

            <div class="bars-container">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars-small.svg'); ?>
            </div>


        </div>




    </div>






    </div>



</nav>