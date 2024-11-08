<?php
// $row = get_row_index() - 0; 

// $small_title = get_sub_field('small_title');
// $big_title = get_sub_field('big_title');
// $intro_text = get_sub_field('intro_text');
// $link = get_sub_field('link');
// $layout = get_sub_field('layout');
?>


<?php // Retrieve the variable in the template part
$layout = get_query_var('layout'); ?>

<section class="section_text_and_image row-<?php // echo $row; 
                                            ?>">

    <?php
    // $row = get_sub_field('columns', $post->ID);
    // if ($row < 1) {
    //     $rows = 0;
    // } else {
    //     $rows = count($row);
    // }


    ?>

    <div class="section-wrapper container">

        <?php if ($layout == 'full-colour'): ?>


        <!-------------------------- Layout Full Colour --------------------------------->
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

        <!---------------------------------------------------------------------->

        <?php elseif ($layout == 'big-img-no-bg'): ?>

        <!-------------------------- Layout Big Image No BG --------------------------------->
        <div class="section-content big-img-no-bg-layout relative mint-style">




            <p class="title-tag">Cymru Can5</p>
            <div class="text-content">
                <h3 class="heading h2">The innovative goals paving the way for a stronger, greener Wales</h3>
                <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut
                    labore et
                    dolore magna aliqua ut enim ad.</p>
                <a href="/" class="link btn text-white">Cymru Can</a>

            </div>


            <div class="img-wrap">
                <img src="https://picsum.photos/2000/1333" alt="">
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

        <!---------------------------------------------------------------------->




        <!-------------------------- Layout Rows --------------------------------->

        <?php elseif ($layout == 'rows'): ?>
        <div class="section-content rows-layout relative blue-style">




            <p class="title-tag">Well-being of Future
                Generations (Wales) Act 2015</p>
            <h3 class="heading h2">Shaping a brighter tomorrow: Discover how the Well-being of Future Generations Act is
                transforming Wales</h3>
            <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et
                dolore magna aliqua ut enim ad.</p>
            <a href="/" class="link btn text-white">About the Act</a>

            <div class="img-wrap">
                <img src="https://picsum.photos/2000/1333" alt="">
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

        <?php elseif ($layout == 'half-image'): ?>

        <!-------------------------- Layout Half image --------------------------------->
        <div class="section-content half-image-layout relative green-style">


            <div class="text-content">
                <p class="title-tag">Meet the commissioner</p>
                <h3 class="heading h2">Creating a legacy for Future Generations</h3>
                <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua ut enim ad.</p>
                <a href="/" class="link btn text-white">About the Act</a>

            </div>



            <div class="img-wrap">
                <img class="landscape-img" src="https://picsum.photos/2000/1333" alt="">
                <img class="portrait-img" src="https://picsum.photos/1333/2000" alt="">
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
            <div class="section-content full-image-layout relative yellow-style"
                style="background-image: url('https://picsum.photos/2000/1333') ;">


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

            <?php elseif ($layout == 'big-img-no-bg'): ?>

            <!-------------------------- Layout Big Image No BG --------------------------------->
            <div class="section-content big-img-no-bg-layout relative mint-style">




                <p class="title-tag">Cymru Can5</p>
                <div class="text-content">
                    <h3 class="heading h2">The innovative goals paving the way for a stronger, greener Wales</h3>
                    <p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et
                        dolore magna aliqua ut enim ad.</p>
                    <a href="/" class="link btn text-white">Cymru Can</a>

                </div>


                <div class="img-wrap">
                    <img src="https://picsum.photos/2000/1333" alt="">
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

        <!---------------------------------------------------------------------->
        <?php endif; ?>



    </div>
</section>