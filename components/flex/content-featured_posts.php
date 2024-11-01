<!-- todo: set this up so that it 
chooses the most recent of each post type -->
<?php 
$row = get_row_index() - 0;
?>

<section class="featured_post_slider" id="row-<?php echo $row; ?> fade-in">

    <div class="post_cont slider regular">
        <?php if(have_rows('featured_posts')) : while(have_rows('featured_posts')) : the_row(); ?>
        <?php $post_object = get_sub_field('featured_post'); ?>
        <?php if ($post_object) : ?>
        <?php // override $post
                $post = $post_object;
                setup_postdata($post); ?>
        <?php
            foreach((get_the_category()) as $category) {
                $postcat= $category->cat_ID;
                $catname =$category->cat_name;
            }
        ?>
        <?php $post_type = get_post_type(); ?>
        <div class="featured_post_wrap <?php echo $post_type; ?>">
            <div class="title_wrapper">
                <div class="title_inner_wrap">
                    <h2>Featured <?php if($post_type == 'post') { echo 'news'; } else { echo $post_type; } ?> </h2>
                </div>
            </div>
            <div class="post_wrap_grid">
                <div class="image_wrapper">
                    <?php $thumb = get_post_thumbnail_id(); ?>
                    <?php $bannerArgs = array(
								'class' => '' ,
								'id' => $thumb,
								'lazyload' => false
							);
							
						echo build_srcset('landscape', $bannerArgs); ?>
                </div>
                <div class="text_wrapper">
                    <div class="text_info_wrapper">
                        <p><?php echo $catname; ?></p>
                        <p><?php the_date(); ?></p>
                    </div>
                    <div class="text_title_wrapper">
                        <h3><?php the_title(); ?></h3>
                    </div>
                    <a class="btn_second remove_hov_effect" href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
            <!-- <a href="/" class="see_all">View all</a> -->
        </div>

        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>

</section>