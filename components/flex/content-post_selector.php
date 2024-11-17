<?php
$row = get_row_index() - 0;
$smallTitle = get_sub_field('small_title');
$bigTitle = get_sub_field('big_title');
$body = get_sub_field('body');
$blockColourStyle = get_sub_field('block_colour_style');
$selectedPosts = get_sub_field('selected_posts');
?>



<section class="section_posts_selector row-<?php // echo $row; 
                                            ?>">


    <div class="container">


        <div class="section-content">
            <?php if ($smallTitle): ?>
            <h2 class="title-tag"><?php echo $smallTitle; ?></h2>
            <?php endif; ?>

            <div class="top-section">
                <div class="title-wrap">

                    <?php if ($bigTitle): ?>
                    <h3 class="heading"><?php echo $bigTitle; ?></h3>
                    <?php endif; // big title 
                    ?>
                </div>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                ?>
            </div>

            <!-------------------------- Post cards/tiles --------------------------------->


            <div class="cards-section <?php if (count($selectedPosts) == 3 && !$blockColourStyle) {
                                            echo " three-col-layout";
                                        } ?>">

                <?php $colourSchemes = ['mint', 'blue', 'yellow']; ?>

                <?php while (have_rows('selected_posts')) : the_row(); ?>

                <?php $colourScheme = $colourSchemes[(get_row_index() - 1) % 3]; ?>

                <?php $image = get_sub_field('image'); ?>
                <?php $linkID = get_sub_field('post_id'); ?>
                <?php $author = get_the_author_meta('display_name', get_post_field('post_author', $linkID)); ?>
                <?php $day = get_the_date('l', $linkID); ?>
                <?php $date = get_the_date('j | n | y', $linkID); ?>


                <div class="selected-post-card <?php echo $colourScheme; ?>-scheme <?php if (count($selectedPosts) < 3 && $blockColourStyle) {
                                                                                            echo " block-colour-style-card";
                                                                                        } ?>">
                    <div class="img-wrap">
                        <!-- <img src="" alt=""> -->

                        <?php $selectedPostImage = array(
                                'class' => '',
                                'id' => $image['ID'],
                                'alt' => $image['alt'],
                                'lazyload' => false
                            );
                            echo build_srcset('banner', $selectedPostImage); ?>
                        <div class="bars-container">
                            <?php
                                // horizontal bars
                                echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars.svg');
                                ?>
                        </div>
                    </div>
                    <div class="text-content">
                        <div class="post-info">
                            <div class="date-info">
                                <p><span><?php echo $day; ?></span><span><?php echo $date; ?></span></p>

                            </div>
                            <?php if ($author): ?>
                            <p class="author-info">Written By: <?php echo $author ?></p>
                            <?php endif; ?>
                        </div>

                        <h3 class="post_title"><?php echo get_the_title($linkID); ?></h3>

                        <a href="<?php echo  get_the_permalink($linkID) ?>" class="post-link"
                            aria-label="Read more about <?php echo esc_attr(get_the_title($linkID)); ?>">Read more <div
                                class="btn-arrow-container"></div></a>

                    </div>




                </div>
                <?php endwhile; ?>
            </div>

            <!--------------------------  --------------------------------->


















        </div>



    </div>


</section>