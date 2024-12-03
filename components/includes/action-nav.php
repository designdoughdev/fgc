<div class="action-nav-container relative">
    <nav class="action-nav relative" aria-label="Main Menu Navigation">
        <?php if (have_rows('root_menu_pages', 'option')): ?>
            <?php $colourSchemes = ['mint', 'yellow', 'sky-blue']; ?>

            <!-- Loop through root pages -->
            <?php while (have_rows('root_menu_pages', 'option')) : the_row(); ?>

                <?php
                $menuSubtitle = get_sub_field('menu_subtitle');
                $pageID = get_sub_field('root_menu_page');
                $colourScheme = $colourSchemes[(get_row_index() - 1) % 3];
                ?>

                <!-- Menu Section -->
                <section
                    class="menu-content <?php echo esc_attr(get_post_field('post_name', $pageID)); ?>-content <?php echo $colourScheme; ?>-scheme"
                    aria-labelledby="menu-<?php echo esc_attr($pageID); ?>">


                    <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg'); ?>

                    <?php
                    $child_pages = get_pages(array('child_of' => $pageID, 'sort_column' => 'menu_order'));
                    if ($child_pages):
                    ?>
                        <div class="container">
                            <div class="menu-grid">
                                <div class="col">
                                    <h4 class="h5" id="menu-<?php echo esc_attr($pageID); ?>">
                                        <?php echo esc_html(get_the_title($pageID)); ?>
                                    </h4>
                                    <?php if ($menuSubtitle): ?>
                                        <p class="h4-2"><?php echo esc_html($menuSubtitle); ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php foreach ($child_pages as $child): ?>
                                    <div class="col">
                                        <a class="parent-page-link" href="<?php echo esc_url(get_permalink($child->ID)); ?>"
                                            aria-label="Visit <?php echo esc_attr($child->post_title); ?>">
                                            <?php echo esc_html($child->post_title); ?>
                                        </a>

                                        <!-- Get child pages of child page -->
                                        <?php
                                        $grandchild_pages = get_pages(array('child_of' => $child->ID, 'sort_column' => 'menu_order'));
                                        if ($grandchild_pages):
                                        ?>
                                            <ul>
                                                <?php foreach ($grandchild_pages as $grandchild): ?>
                                                    <li>
                                                        <a href="<?php echo esc_url(get_permalink($grandchild->ID)); ?>"
                                                            aria-label="Visit <?php echo esc_attr($grandchild->post_title); ?>">
                                                            <?php echo esc_html($grandchild->post_title); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    </nav>
</div>