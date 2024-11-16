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
$body = get_sub_field('body');
$link = get_sub_field('link');
$reverseLayout = get_sub_field('reverse');



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



    <!-------------------------- Non ACF versions --------------------------------->

    <?php if ($layout == 'full-colour'): ?>


    <!-------------------------- Layout Full Colour --------------------------------->

    <div class="container">
        <div class="section-content full-colour-layout relative blue-style">



            <div class="col">
                <p class="title-tag">international</p>
                <h3 class="heading h2 text-white">Empowering Change Worldwide</h3>
                <p class="body text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor
                    incididunt ut labore et dolore magna aliqua ut enim ad.</p>
                <a href="/" class="link btn text-white sky-blue">Visit Page</a>
            </div>

            <?php
                echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                ?>

        </div>

    </div>


    <!---------------------------------------------------------------------->

    <?php elseif ($layout == 'big-img-no-bg'): ?>

    <!-------------------------- Layout Big Image No BG --------------------------------->
    <div class="container">
        <div class="section-content big-img-no-bg-layout relative mint-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">




            <p class="title-tag">Cymru Can</p>
            <div class="text-content">
                <h3 class="heading h2">The innovative goals paving the way for a stronger, greener Wales</h3>
                <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut
                    labore et
                    dolore magna aliqua ut enim ad.</p>
                <a href="/" class="link btn text-white">Cymru Can</a>

            </div>


            <div class="img-wrap">
                <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/tree.jpg" ?> alt="">
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




    <!-------------------------- Layout Rows --------------------------------->

    <?php elseif ($layout == 'rows'): ?>
    <div class="container">
        <div class="section-content rows-layout relative blue-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">




            <p class="title-tag">Well-being of Future
                Generations (Wales) Act 2015</p>
            <h3 class="heading h2">Shaping a brighter tomorrow: Discover how the Well-being of Future Generations Act is
                transforming Wales</h3>
            <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et
                dolore magna aliqua ut enim ad.</p>
            <a href="/" class="link btn text-white">About the Act</a>

            <div class="img-wrap">
                <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/talk.jpg" ?> alt="">
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


    <?php elseif ($layout == 'half-image'): ?>

    <!-------------------------- Layout Half image --------------------------------->


    <div class="container">
        <div class="section-content half-image-layout relative mint-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">


            <div class="text-content">
                <p class="title-tag">Meet the commissioner</p>
                <h3 class="heading h2">Creating a legacy for Future Generations</h3>
                <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua ut enim ad.</p>
                <a href="/" class="link btn">About the Act</a>

            </div>



            <div class="img-wrap">
                <img class="landscape-img"
                    src=<?php echo get_template_directory_uri() . "/assets/images/jpg/derek-crop.jpg" ?> alt="">
                <img class="portrait-img"
                    src=<?php echo get_template_directory_uri() . "/assets/images/jpg/derek-crop.jpg" ?> alt="">
            </div>

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

            <?php elseif ($layout == 'full-image'): ?>

            <!-------------------------- Layout Full Image --------------------------------->

            <div class="container">
                <div class="section-content full-image-layout relative yellow-style" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom"
                    style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/assets/images/jpg/viaduct.jpg' ?>') ;">


                    <div class="text-content">
                        <p class="title-tag">Meet the commissioner</p>
                        <h3 class="heading h2">Creating a legacy for Future Generations</h3>
                        <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua ut enim ad.</p>
                        <a href="/" class="link btn text-white">About the Act</a>

                    </div>

                    <div class="bars-container">

                        <?php
                            // horizontal bars
                            echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars.svg');
                            ?>

                    </div>

                </div>

            </div>


            <?php elseif ($layout == 'big-img-no-bg'): ?>

            <!-------------------------- Layout Big Image No BG --------------------------------->
            <div class="section-content big-img-no-bg-layout relative mint-style" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">




                <p class="title-tag">Cymru Can</p>
                <div class="text-content">
                    <h3 class="heading h2">The innovative goals paving the way for a stronger, greener Wales</h3>
                    <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et
                        dolore magna aliqua ut enim ad.</p>
                    <a href="/" class="link btn text-white">Cymru Can</a>

                </div>


                <div class="img-wrap">
                    <img src=<?php echo get_template_directory_uri() . "https://picsum.photos/2000/1333" ?> alt="">
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

    </div>


    <!---------------------------------------------------------------------->

    <!---------------------------------------------------------------------->
    <?php endif; ?>

    <!--------------------------  --------------------------------->




    <!-------------------------- ACF Versions --------------------------------->

    <?php if ($layoutStyle == 'full-colour'): ?>



    <!-------------------------- Layout Full Colour --------------------------------->

    <div class="container">
        <div class="section-content full-colour-layout relative <?php echo $colourScheme ?>-style <?php if ($reverseLayout) {
                                                                                                            echo "reverse ";
                                                                                                        } ?>">



            <div class="col">
                <?php if ($link || $smallTitle): ?>
                <p class="title-tag"><?php if ($link) {
                                                    echo $link_title;
                                                } else {
                                                    echo $smallTitle;
                                                } ?></p>
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
                <a href="/" class="link btn" target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a>
                <?php endif; // link 
                    ?>
            </div>

            <?php
                echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                ?>

        </div>

    </div>


    <!---------------------------------------------------------------------->

    <?php elseif ($layoutStyle == 'big-img-no-bg'): ?>


    <!-------------------------- Layout Big Image No BG --------------------------------->

    <div class="container">
        <div class="section-content big-img-no-bg-layout relative mint-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">




            <p class="title-tag">Cymru Can</p>
            <div class="text-content">
                <h3 class="heading h2">The innovative goals paving the way for a stronger, greener Wales</h3>
                <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut
                    labore et
                    dolore magna aliqua ut enim ad.</p>
                <a href="/" class="link btn text-white">Cymru Can</a>

            </div>


            <div class="img-wrap">
                <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/tree.jpg" ?> alt="">
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
                                                                                                                                        } ?>"
        data-aos="fade-up" data-aos-anchor-placement="top-bottom">



        <div class="text-col">

            <div class="top-bars-container">

                <?php


                        echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-small.svg');
                        ?>


            </div>
            <div class="text-content">
                <p class="title-tag">Well-being of Future
                    Generations (Wales) Act 2015</p>
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
                <a href="/" class="link btn text-white"
                    target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a>
                <?php endif; // link 
                        ?>

            </div>


            <div class="bottom-bars-container">

                <?php


                        echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars-block.svg');
                        ?>


            </div>


        </div>


        <div class="img-wrap">
            <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/talk.jpg" ?> alt="">
        </div>









    </div>

    <?php else: ?>

    <div class="section-content half-text-half-img-layout side-aligned <?php if ($colourScheme) {
                                                                                    echo $colourScheme;
                                                                                } ?>-style <?php if ($halfImageStyleVariation == 'right-style') {
                                                                                                                                            echo "reverse ";
                                                                                                                                        } ?>"
        data-aos=" fade-up" data-aos-anchor-placement="top-bottom">

        <div class="text-col">

            <div class="text-content">
                <p class="title-tag">Well-being of Future
                    Generations (Wales) Act 2015</p>
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
                <a href="/" class="link btn text-white"
                    target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a>
                <?php endif; // link 
                        ?>

            </div>




        </div>

        <div class="img-wrap">
            <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/talk.jpg" ?> alt="">
        </div>




        <div class="vertical-bars-container">

            <?php


                    echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
                    ?>

        </div>







    </div>

    <?php endif; ?>




    <!-------------------------- Layout Rows --------------------------------->

    <?php elseif ($layoutStyle == 'rows'): ?>

    <div class="container">
        <div class="section-content rows-layout relative blue-style" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">




            <p class="title-tag">Well-being of Future
                Generations (Wales) Act 2015</p>
            <h3 class="heading h2">Shaping a brighter tomorrow: Discover how the Well-being of Future Generations Act is
                transforming Wales</h3>
            <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et
                dolore magna aliqua ut enim ad.</p>
            <a href="/" class="link btn text-white">About the Act</a>

            <div class="img-wrap">
                <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/talk.jpg" ?> alt="">
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
                <p class="title-tag">Meet the commissioner</p>
                <h3 class="heading h2">Creating a legacy for Future Generations</h3>
                <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua ut enim ad.</p>
                <a href="/" class="link btn">About the Act</a>

            </div>



            <div class="img-wrap">
                <img class="landscape-img"
                    src=<?php echo get_template_directory_uri() . "/assets/images/jpg/derek-crop.jpg" ?> alt="">
                <img class="portrait-img"
                    src=<?php echo get_template_directory_uri() . "/assets/images/jpg/derek-crop.jpg" ?> alt="">
            </div>

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
            <div class="section-content full-image-layout relative yellow-style" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom"
                style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/assets/images/jpg/viaduct.jpg' ?>') ;">


                <div class="text-content">
                    <p class="title-tag">Meet the commissioner</p>
                    <h3 class="heading h2">Creating a legacy for Future Generations</h3>
                    <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua ut enim ad.</p>
                    <a href="/" class="link btn text-white">About the Act</a>

                </div>



                <div class="bars-container">

                    <?php
                        // horizontal bars
                        echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars.svg');
                        ?>

                </div>


            </div>

        </div>

    </div>


    <!---------------------------------------------------------------------->

    <!---------------------------------------------------------------------->
    <?php endif; ?>




</section>