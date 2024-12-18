<?php // $row = get_row_index() - 0; 
?>

<?php // Retrieve the variable in the template part
$layout = get_query_var('layout'); // non acf versions


// acf fields
$layoutStyle = get_sub_field('layout_style');
?>


<section class="section_wayfinder row-<?php // echo $row; 
                                        ?>">
    <div class="section-content <?php if ($layoutStyle) {
                                    echo $layoutStyle;
                                } ?>">




        <!-------------------------- ACF version --------------------------------->

        <?php if ($layoutStyle == 'cards'): ?>



        <div class="wayfinder-container cards-layout">

            <?php $colourSchemes = ['mint', 'yellow', 'blue', 'green']; // The repeating set of values 
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
                <div class="img-wrap">

                </div>



            </div>

            <?php endwhile; ?>

        </div>


        <!-------------------------- Non acf version --------------------------------->

        <?php elseif ($layout == 'sliding-rows'): ?>




        <div class="text-content container" data-aos="fade-up">
            <h2 class="title-tag">About us</h2>
            <h3 class="heading h2">Inside the Commissioner's office: Where advocacy meets innovation</h3>

        </div>

        <div class="wayfinder-container sliding-rows">

            <ul>

                <?php $colourSchemes = ['mint', 'yellow', 'blue', 'navy']; // The repeating set of values 
                    $titles = ['How We Work', 'Tools', 'Case Studies', 'Careers']; // The repeating set of values 
                    ?>


                <?php for ($x = 0; $x < 4; $x++) {

                        $colourScheme = $colourSchemes[$x % 4]; // Use modulo to cycle through values
                        $title = $titles[$x % 4]; // Use modulo to cycle through values


                        // wayfinder element
                    ?>

                <li>
                    <a href="/" class="wayfinder-link-wrap <?php echo $colourScheme; ?>-style relative">


                        <div class="wayfinder-row <?php echo $colourScheme; ?>-style  relative">

                            <div class="bar-container">
                                <?php
                                        // small version
                                        echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-small.svg');
                                        ?>
                            </div>



                            <div class="row-content">
                                <div class="text-content">
                                    <p class=" tag h6">Explore</p>
                                    <h4 class="h1 heading">
                                        <?php echo $title; ?>
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

                <?php } ?>
            </ul>

        </div>



        <?php endif; ?>
    </div>
</section>