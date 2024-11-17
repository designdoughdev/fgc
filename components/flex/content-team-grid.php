<?php
$row = get_row_index() - 0;

$add_background = get_sub_field('add_background');
$title = get_sub_field('team_heading');
$small_title = get_sub_field('small_title');
$big_title = get_sub_field('big_title');




?>

<section class="section_team-grid row-<?php echo $row; ?>">



    <div class="container_medium">

        <div class="section-content <?php if ($add_background) {
                                        echo " add-background ";
                                    } ?>">

            <div class="title-wrap">
                <h2 class="title-tag"><?php echo $small_title; ?></h2>
                <h3 class="heading"><?php echo $big_title; ?></h3>
            </div>

            <?php if (have_rows('team_block')) : while (have_rows('team_block')) : the_row();

                    $subTeamHeading = get_sub_field('sub_team_heading'); ?>

            <h3 class="sub-team-heading"><?php echo $subTeamHeading; ?></h3>


            <div class="team-grid">
                <?php $colourSchemes = ['mint', 'yellow', 'blue']; // Array of color schemes 
                        ?>


                <?php if (have_rows('staff_cards')) : while (have_rows('staff_cards')) : the_row();



                                $colourScheme = $colourSchemes[(get_row_index() - 1) % 3];



                                $image = get_sub_field('image');
                                $name = get_sub_field('name');
                                $job = get_sub_field('job_role');
                                $bio = get_sub_field('bio'); ?>

                <div class=" staff-card-wrap <?php echo $colourScheme; ?>-scheme ">
                    <?php

                                    if (!empty($image)) : ?>
                    <div class="img-wrap">

                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <div class="bars-container">
                            <?php
                                                // horizontal bars
                                                echo file_get_contents(get_template_directory() . '/assets/images/svg/horizontal-bars.svg');
                                                ?>
                        </div>

                    </div>
                    <?php endif; ?>

                    <div class="accord_wrap">
                        <h3 class="staff-name"><?php echo $name; ?></h3>
                        <p class="job-title"><?php echo $job; ?></p>
                        <div class="accord_head">
                            <button class="btn-vtwo">Read more<div class="btn-arrow-container"></div></button>


                        </div>
                        <div class="accord_body">
                            <?php echo $bio; ?>
                        </div>

                    </div>


                </div>



                <?php endwhile;
                        endif; ?>

            </div>

            <?php endwhile;
            endif; ?>

        </div>






    </div>



</section>