<?php // $row = get_row_index() - 0; 
?>

<?php // Retrieve the variable in the template part



// acf fields
$smallTitle = get_sub_field('small_title');
$bigTitle = get_sub_field('big_title');
$layoutStyle = get_sub_field('layout_style');
?>


<section class="section_wayfinder row-<?php // echo $row; 
                                        ?>">
    <div class="section-content <?php if ($layoutStyle) {
                                    echo $layoutStyle;
                                } ?>">



        <?php if ($layoutStyle == 'cards'): ?>



        <div class="wayfinder-container cards-layout">

            <?php $colourSchemes = ['mint', 'yellow', 'blue', 'green']; // The repeating set of values 
                ?>







            <?php while (have_rows('signposts')) : the_row(); ?>

            <?php
                    $linkID = get_sub_field('page_link');
                    $textBody = get_sub_field('text_body');
                    $image = get_sub_field('signpost_image');

                    // Get the parent page ID of the current page
                    $parentID = wp_get_post_parent_id($linkID);
                    $parentTitle = $parentID ? get_the_title($parentID) : null;





                    // set colour scheme variable to pass to template part
                    $colourScheme =  $colourSchemes[(get_row_index() - 1) % 4];
                    ?>


            <div class="wayfinder-card <?php echo $colourScheme; ?>-scheme">
                <div class="text-content">
                    <div class="text-content-inner">
                        <p class=" tag h6"> <?php if ($parentTitle): ?>
                            <?php echo esc_html($parentTitle); ?>
                            <?php else: ?>
                            FGC
                            <?php endif; ?></p>
                        <h4 class="h1 heading">
                            <?php echo get_the_title($linkID); ?>
                        </h4>
                        <p class="text"><?php echo $textBody; ?></p>

                        <a href="<?php echo  get_the_permalink($linkID) ?>" class="post-link btn"
                            aria-label="Read more about <?php echo esc_attr(get_the_title($linkID)); ?>">Read more <div
                                class="btn-arrow-container"></div></a>

                    </div>



                    <div class="bars-container">

                        <?php

                                echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                                ?>

                    </div>

                </div>
                <?php if ($image) : ?>
                    <div class="img-wrap">
                            <!-- <img src="" alt=""> -->

                            <?php $wayfinderImage = array(
                                    'class' => '',
                                    'id' => $image['ID'],
                                    'alt' => $image['alt'],
                                    'lazyload' => false
                                );
                                echo build_srcset('banner', $wayfinderImage); ?>

                    </div>
                <?php endif; ?>



            </div>

            <?php endwhile; ?>

        </div>


        <!-------------------------- Sliding Rows Layout --------------------------------->

        <?php elseif ($layoutStyle == 'sliding-rows'): ?>




        <div class="text-content container" data-aos="fade-up">
            <?php if ($smallTitle): ?>
            <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
            <?php endif; ?>
            <?php if ($bigTitle): ?>
            <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
            <?php endif; ?>

        </div>

        <div class="wayfinder-container sliding-rows">

            <ul>

                <?php $colourSchemes = ['mint', 'yellow', 'blue', 'navy']; // The repeating set of values 
                    ?>


                <?php while (have_rows('signposts')) : the_row(); ?>

                <?php
                        $linkID = get_sub_field('page_link');
                        $textBody = get_sub_field('text_body');
                        $image = get_sub_field('image');

                        // Get the parent page ID of the current page
                        $parentID = wp_get_post_parent_id($linkID);
                        $parentTitle = $parentID ? get_the_title($parentID) : null;





                        // set colour scheme variable to pass to template part
                        $colourScheme =  $colourSchemes[(get_row_index() - 1) % 4];




                        // wayfinder element
                        ?>

                <li>
                    <a href="<?php echo  get_the_permalink($linkID) ?>"
                        class="wayfinder-link-wrap <?php echo $colourScheme; ?>-style relative">


                        <div class="wayfinder-row <?php echo $colourScheme; ?>-style  relative">

                            <div class="bar-container">
                                <?php
                                        // small version
                                        echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-small.svg');
                                        ?>
                            </div>



                            <div class="row-content">
                                <div class="text-content">
                                    <p class=" tag h6"><?php if ($parentTitle): ?>
                                        <?php echo esc_html($parentTitle); ?>
                                        <?php else: ?>
                                        FGC
                                        <?php endif; ?></p>
                                    </p>
                                    <h4 class="h1 heading">
                                        <?php echo esc_attr(get_the_title($linkID)); ?>
                                    </h4>
                                </div>
                                <div class="arrow-content">
                                    <div class="arrow-container relative">
                                        <?php
                                                // horizontal bars
                                                echo file_get_contents(get_template_directory() . '/assets/images/svg/arrow-right.svg');
                                                ?>
                                        <div class="triangle"></div>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </a>

                </li>

                <?php endwhile; ?>

            </ul>

        </div>



        <?php endif; ?>
    </div>
</section>