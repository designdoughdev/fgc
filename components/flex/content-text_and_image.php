<?php // Retrieve the variable in the template part
$layout = get_query_var('layout'); // non acf versions
?>

<?php
$row = get_row_index() - 0;

// acf fields
$layoutStyle = get_sub_field('layout_style');
$colourScheme = get_sub_field('colour_scheme');
$smallTitle = get_sub_field('small_title');
$bigTitle = get_sub_field('big_title');
$image = get_sub_field('image');
$body = get_sub_field('body');
$link = get_sub_field('link');
$reverseLayout = get_sub_field('reverse');
$barsAtSide = get_sub_field('bars_at_side');



if ($link):
    $link_url = esc_url($link['url']);
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif
?>

<section class="section_text_and_image row-<?php echo $row;
                                            ?>">

    <?php
    // $row = get_sub_field('columns', $post->ID);
    // if ($row < 1) {
    //     $rows = 0;
    // } else {
    //     $rows = count($row);
    // }


    ?>



    <?php if ($layoutStyle == 'full-colour'): ?>



    <!-------------------------- Layout Full Colour --------------------------------->



    <div class="full-colour-layout-wrapper">
        <div class="section-content full-colour-layout relative <?php echo $colourScheme ?>-style <?php if ($reverseLayout) {
                                                                                                            echo "reverse ";
                                                                                                        }
                                                                                                        if ($barsAtSide) {
                                                                                                            echo " bars-at-side ";
                                                                                                        } ?>">



            <div class="col">
                <?php if ($link || $smallTitle): ?>
                <h2 class="title-tag"><?php if ($smallTitle) {
                                                    echo $smallTitle;
                                                } else {
                                                    echo $link_title;
                                                } ?></h2>
                <?php endif;  // title tag
                    ?>
                <?php if ($bigTitle): ?>
                <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
                <?php endif; // big title 
                    ?>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                    ?>
                <?php if ($link): ?>
                <a href="/" class="link btn" target="<?php echo $link_target; ?>"><?php echo $link_title; ?><div
                        class="btn-arrow-container"></div></a>
                <?php endif; // link 
                    ?>
            </div>

            <?php
                echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                ?>
            <?php
                echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars-small.svg');
                ?>

        </div>

    </div>


    <!---------------------------------------------------------------------->

    <?php elseif ($layoutStyle == 'big-img-no-bg'): ?>


    <!-------------------------- Layout Big Image No BG --------------------------------->

    <div class="container">
        <div class="section-content big-img-no-bg-layout relative mint-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">





            <?php if ($link || $smallTitle): ?>
                <h2 class="title-tag"><?php if ($smallTitle) {
                                                    echo $smallTitle;
                                                } else {
                                                    echo $link_title;
                                                } ?></h2>
                <?php endif;  // title tag
                    ?>


            <div class="text-content">
                <?php if ($bigTitle): ?>
                <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
                <?php endif; // big title 
                    ?>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                    ?>
                <?php if ($link): ?>
                <a href="/" class="link btn text-white" target="<?php echo $link_target; ?>"><?php echo $link_title; ?>
                    <div class="btn-arrow-container">
                    </div>
                </a>
                <?php endif; // link 
                    ?>

            </div>


            <div class="img-wrap">
                <?php $landscapeImage = array(
                        'class' => '',
                        'id' => $image['ID'],
                        'alt' => $image['alt'],
                        'lazyload' => false
                    );
                    echo build_srcset('standard', $landscapeImage); ?>
            </div>

            <div class="vertical-bars-container">

                <?php
                    // small version
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-small.svg');
                    // large version
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                    ?>

            </div>


        </div>

    </div>


    <!---------------------------------------------------------------------->

    <!-------------------------- Layout Half Text Half Image Square --------------------------------->

    <?php elseif ($layoutStyle == 'half-text-half-img'): ?>

    <?php $halfImageStyleVariation = get_sub_field('half_image_variation'); ?>

    <?php $barsAtTop = get_sub_field('bars_at_top'); ?>

    <?php if ($halfImageStyleVariation == 'centre'):

            /// centred layout version 
        ?>

    <div class="section-content half-text-half-img-layout centre-style <?php if ($colourScheme) {
                                                                                    echo $colourScheme;
                                                                                } ?>-style <?php if ($reverseLayout) {
                                                                                                echo " reverse ";
                                                                                            }
                                                                                            if ($barsAtTop) {
                                                                                                echo "bars-at-top";
                                                                                            } ?>" data-aos="fade-up"
        data-aos-anchor-placement="top-bottom">

        <div class="img-wrap">
            <?php $landscapeImage = array(
                        'class' => '',
                        'id' => $image['ID'],
                        'alt' => $image['alt'],
                        'lazyload' => false
                    );
                    echo build_srcset('standard', $landscapeImage); ?>
        </div>



        <div class="text-col">

            <div class="top-bars-container">

                <?php


                        echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-small.svg');
                        ?>


            </div>
            <div class="text-content">
            <?php if ($link || $smallTitle): ?>
                <h2 class="title-tag"><?php if ($smallTitle) {
                                                    echo $smallTitle;
                                                } else {
                                                    echo $link_title;
                                                } ?></h2>
                <?php endif;  // title tag
                    ?>
                <?php if ($bigTitle): ?>
                <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
                <?php endif; // big title 
                        ?>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                        ?>


                <?php
                        if (have_rows('page_links')): ?>

                <div class="links-container">


                    <?php while (have_rows('page_links')) : the_row(); ?>


                    <?php $linkID = get_sub_field('page_link'); ?>


                    <a href="<?php echo  get_the_permalink($linkID) ?>"><?php echo get_the_title($linkID); ?></a>


                    <?php endwhile; ?>

                </div>


                <?php endif; ?>

                <?php if ($link): ?>
                <a href="/" class="link btn text-white" target="<?php echo $link_target; ?>"><?php echo $link_title; ?>
                    <div class="btn-arrow-container"></div>
                </a>
                <?php endif; // link 
                        ?>

            </div>


            <div class="bottom-bars-container">

                <?php


                        echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-block.svg');
                        ?>


            </div>


        </div>

        <div class="mobile-bars-container">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars-small.svg');
                    ?>


        </div>












    </div>

    <?php else: ?>

    <div class="section-content half-text-half-img-layout side-aligned <?php if ($colourScheme) {
                                                                                    echo $colourScheme;
                                                                                } ?>-style <?php if ($halfImageStyleVariation == 'right-style') {
                                                                                                echo "reverse ";
                                                                                            } ?>" data-aos=" fade-up"
        data-aos-anchor-placement="top-bottom">

        <div class="text-col">

            <div class="text-content">
            <?php if ($link || $smallTitle): ?>
                <h2 class="title-tag"><?php if ($smallTitle) {
                                                    echo $smallTitle;
                                                } else {
                                                    echo $link_title;
                                                } ?></h2>
                <?php endif;  // title tag
                    ?>
                <?php if ($bigTitle): ?>
                <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
                <?php endif; // big title 
                        ?>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                        ?>


                <?php
                        if (have_rows('page_links')): ?>

                <div class="links-container">


                    <?php while (have_rows('page_links')) : the_row(); ?>


                    <?php $linkID = get_sub_field('page_link'); ?>


                    <a href="<?php echo  get_the_permalink($linkID) ?>"><?php echo get_the_title($linkID); ?></a>


                    <?php endwhile; ?>

                </div>


                <?php endif; ?>

                <?php if ($link): ?>
                <a href="/" class="link btn text-white" target="<?php echo $link_target; ?>"><?php echo $link_title; ?>
                    <div class="btn-arrow-container"></div>
                </a>
                <?php endif; // link 
                        ?>

            </div>




        </div>

        <div class="img-wrap">
            <?php $landscapeImage = array(
                        'class' => '',
                        'id' => $image['ID'],
                        'alt' => $image['alt'],
                        'lazyload' => false
                    );
                    echo build_srcset('standard', $landscapeImage); ?>
        </div>




        <div class="vertical-bars-container">

            <?php

                    // large
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');

                    // small




                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-block.svg');

                    ?>



        </div>








    </div>


    <?php endif; ?>




    <!-------------------------- Layout Rows --------------------------------->

    <?php elseif ($layoutStyle == 'rows'): ?>

    <div class="container">
        <div class="section-content rows-layout relative blue-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">




            <?php if ($link || $smallTitle): ?>
                <h2 class="title-tag"><?php if ($smallTitle) {
                                                    echo $smallTitle;
                                                } else {
                                                    echo $link_title;
                                                } ?></h2>
                <?php endif;  // title tag ?>
                    
                
             <?php if ($bigTitle): ?>
                <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
                <?php endif; // big title 
                        ?>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                        ?>
                            <?php if ($link): ?>
                <a href="/" class="link btn text-white" target="<?php echo $link_target; ?>"><?php echo $link_title; ?>
                    <div class="btn-arrow-container"></div>
                </a>
                <?php endif; // link 
                        ?>

<div class="img-wrap">
            <?php $landscapeImage = array(
                        'class' => '',
                        'id' => $image['ID'],
                        'alt' => $image['alt'],
                        'lazyload' => false
                    );
                    echo build_srcset('standard', $landscapeImage); ?>
        </div>

            <div class="vertical-bars-container">

                <?php
                    // small version
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-small.svg');
                    // large version
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                    ?>

            </div>


        </div>

    </div>


    <?php elseif ($layoutStyle == 'half-image'): ?>

    <!-------------------------- Layout Half image --------------------------------->

    <div class="container">
        <div class="section-content half-image-layout relative mint-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">


            <div class="text-content">
                <?php if ($link || $smallTitle): ?>
                <h2 class="title-tag"><?php if ($smallTitle) {
                                                    echo $smallTitle;
                                                } else {
                                                    echo $link_title;
                                                } ?></h2>
                <?php endif;  // title tag
                    ?>
                <?php if ($bigTitle): ?>
                <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
                <?php endif; // big title 
                    ?>
                <?php if ($body): ?>
                <p class="body"><?php echo $body; ?></p>
                <?php endif; // body 
                    ?>
                <?php if ($link): ?>
                <a href="/" class="link btn" target="<?php echo $link_target; ?>"><?php echo $link_title; ?><div
                        class="btn-arrow-container"></div></a>
                <?php endif; // link 
                    ?>

            </div>


            <?php if ($image): ?>
            <div class="img-wrap">
                <div class="landscape-img">

                    <?php $landscapeImage = array(
                                'class' => '',
                                'id' => $image['ID'],
                                'alt' => $image['alt'],
                                'lazyload' => false
                            );
                            echo build_srcset('standard', $landscapeImage); ?>

                </div>
                <div class="portrait-img">

                    <?php $portraitImage = array(
                                'class' => '',
                                'id' => $image['ID'],
                                'alt' => $image['alt'],
                                'lazyload' => false
                            );
                            echo build_srcset('standard', $portraitImage); ?>

                </div>
            </div>
            <?php endif; ?>

            <div class="bars-container">

                <?php
                    // horizontal bars
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars-small.svg');
                    // vertical bars
                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                    ?>



                <div class="caption light-navy">
                    <p class="bold">Derek Walker</p>
                    <p>Future Generations Commissioner for Wales</p>
                </div>

            </div>

            <?php elseif ($layoutStyle == 'full-image'): ?>

            <!-------------------------- Layout Full Image --------------------------------->
            <div class="full-image-layout-content-wrapper">
                <div class="section-content full-image-layout relative <?php if ($colourScheme) {
                                                                                echo $colourScheme;
                                                                            } ?>-style <?php if ($reverseLayout) {
                                                                                            echo " reverse ";
                                                                                        }
                                                                                        if ($barsAtSide) {
                                                                                            echo " bars-at-side ";
                                                                                        } ?>" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom"
                    style="background-image: url('<?php echo $image['url'] ?>') ;">


                    <div class="text-content">
                    <?php if ($link || $smallTitle): ?>
                        <h2 class="title-tag"><?php if ($smallTitle) {
                                                            echo $smallTitle;
                                                        } else {
                                                            echo $link_title;
                                                        } ?></h2>
                        <?php endif;  // title tag
                            ?>
                        <?php if ($bigTitle): ?>
                        <h3 class="heading h2"><?php echo $bigTitle; ?></h3>
                        <?php endif; // big title 
                            ?>
                        <?php if ($body): ?>
                        <p class="body"><?php echo $body; ?></p>
                        <?php endif; // body 
                            ?>
                        <?php if ($link): ?>
                        <a href="/" class="link btn" target="<?php echo $link_target; ?>"><?php echo $link_title; ?><div
                                class="btn-arrow-container"></div></a>
                        <?php endif; // link 
                            ?>

                    </div>



                    <div class="bars-container">

                        <?php
                            // horizontal bars
                            echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars.svg');

                            // vertical bars
                            echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                            ?>

                    </div>


                </div>

            </div>



        </div>

    </div>


    <!---------------------------------------------------------------------->

    <!---------------------------------------------------------------------->
    <?php endif; ?>




</section>