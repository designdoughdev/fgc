<?php
$row = get_row_index() - 0;


$title = get_sub_field('team_heading');
$small_title = get_sub_field('small_title');




?>

<section class="section_team-grid row-<?php echo $row; ?>">

    <h1>Team Grid</h1>



    <div class="container_medium">

        <div class="title-wrap">
            <h2 class="small-title"><?php echo $small_title; ?></h2>
            <h3 class="section-title"><?php echo $title['label']; ?></h3>
        </div>

        <div class="team-grid <?php echo $title['value']; ?>">

            <?php if (have_rows('staff_cards')) : while (have_rows('staff_cards')) : the_row();


                    $image = get_sub_field('image');
                    $name = get_sub_field('name');
                    $job = get_sub_field('job_role');
                    $bio = get_sub_field('bio'); ?>

            <div class=" staff-card-wrap">
                <?php

                        if (!empty($image)) : ?>
                <div class="img-wrap">

                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                </div>
                <?php endif; ?>

                <div class="accord_wrap">
                    <h3 class="staff-name"><?php echo $name; ?></h3>
                    <div class="accord_head">
                        <p class="job-title"><?php echo $job; ?></p>
                        <img class="arrow-icon"
                            src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-right-blue-thin.svg'; ?>"
                            alt="">
                    </div>
                    <div class="accord_body">
                        <?php echo $bio; ?>
                    </div>

                </div>


            </div>



            <?php endwhile;
            endif; ?>

        </div>



    </div>



</section>