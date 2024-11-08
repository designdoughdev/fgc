<?php // $row = get_row_index() - 0; 
?>


<section class="section_wayfinder row-<?php // echo $row; 
                                        ?>">

    <div class="section-content">


        <div class="text-content container">
            <p class="title-tag">About us</p>
            <h3 class="heading h2">Inside the Commissioner's office: Where advocacy meets innovation</h3>

        </div>

        <div class="wayfinder-container">

            <ul>

                <?php $colourSchemes = ['blue', 'yellow', 'mint', 'green']; // The repeating set of values 
                ?>


                <?php for ($x = 0; $x < 4; $x++) {

                    $colourScheme = $colourSchemes[$x % 4]; // Use modulo to cycle through values


                    // wayfinder element
                ?>

                <li>
                    <a href="/" class="wayfinder-link-wrap">
                        <div class="wayfinder-row <?php echo $colourScheme; ?>-style relative">
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
                                        How We Work
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


    </div>

</section>