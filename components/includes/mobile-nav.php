<nav class="mobile-nav overlay closed">


    <!-- Button to close the overlay navigation -->
    <button class="mobile-menu-close-btn">&times;</button>

    <!-- Overlay content -->
    <div class="menu-content">
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



        </div>

        <div class="bars-container">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars-small.svg'); ?>
        </div>




    </div>



</nav>