<?php
// $row = get_row_index() - 0; 

// $small_title = get_sub_field('small_title');
// $big_title = get_sub_field('big_title');
// $intro_text = get_sub_field('intro_text');
// $link = get_sub_field('link');
// $layout = get_sub_field('layout');
?>

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

        <!-------------------------- Layout 1 --------------------------------->
        <div class="section-content full-colour-layout relative">



            <div class="col">
                <p class="title-tag">Public Bodies</p>
                <h3 class="heading h2 text-white">Find out more information about your local public body.</h3>
                <a href="/" class="link btn text-white sky-blue">Visit Page</a>
            </div>

            <?php
            echo file_get_contents(get_template_directory() . '/assets/images/svg/vertical-bars.svg');
            ?>

        </div>

        <!---------------------------------------------------------------------->



    </div>
</section>

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

        <!-------------------------- Layout 2 --------------------------------->
        <div class="section-content rows-layout relative">




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

        <!---------------------------------------------------------------------->



    </div>
</section>

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

        <!-------------------------- Layout 3 --------------------------------->
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


        </div>

        <!---------------------------------------------------------------------->



    </div>
</section>