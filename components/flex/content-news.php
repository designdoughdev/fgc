<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('sub_title');
$newsselect = get_sub_field('recent_or_selected_news');

?>

<section class="full_width news_wrap row-<?php echo $row; ?> fade-in ">

    <div class="container">

        <?php if($title) {?><h2 class=""><?php echo $title; ?></h2><?php }?>
        <?php if($subtitle) {?><h4 class=""><?php echo $subtitle; ?></h4><?php }?>

        <div class="news_wrap">

            <?php if($newsselect) { ?>

            <?php $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => '3',
                  'order' => 'DSC',
                );
                $loop = new WP_Query( $args );
                ?>
            <?php
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="news_post">
                <div class="">
                    <a href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail( $post_id, 'newsimage', array( 'class' => '' ) ); ?>
                        <div class="news_box">
                            <div class="top">
                                <h6><?php echo get_the_date('d/m/Y'); ?></h6>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="btn_default">Read more</div>
                        </div>
                    </a>
                </div>
            </div>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php  endwhile; ?>
            <?php } else { ?>

            <?php if( have_rows('selected_news_posts') ): ?>
            <?php while( have_rows('selected_news_posts') ): the_row(); ?>
            <?php
                        $post_object = get_sub_field('news_post');
                        ?>
            <?php if( $post_object ): ?>
            <?php // override $post
                            $post = $post_object;
                            setup_postdata( $post );
                            ?>
            <div class="news_post">
                <div class="">
                    <a href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail( $post_id, 'newsimage', array( 'class' => '' ) ); ?>
                        <div class="news_box">
                            <div class="top">
                                <h6><?php echo get_the_date('d/m/Y'); ?></h6>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="btn_default">Read more</div>
                        </div>
                    </a>
                </div>
            </div>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php } ?>
        </div>
    </div>

</section>