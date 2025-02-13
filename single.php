
<?php get_header(); ?>

<!-- this is the template for news, resources and public infomation FLEX type posts -->
<section id="post-content" class="section-std">
    <div class="container_small">

        <!-- ACF flex data copied from the old website, restyled -->

        <?php if ( have_rows( 'simple_flexible_content' ) ): ?>
        <?php while ( have_rows( 'simple_flexible_content' ) ) : the_row(); ?>
        <?php if ( get_row_layout() == 'intro_text' ) : ?>

        <div class="post-intro-column">
            <p class="intro-text"><?php the_sub_field( 'intro_content' ); ?></p>
        </div>

        <?php elseif ( get_row_layout() == 'subtitle' ) : ?>

        <div class="post-column">
            <h3><?php the_sub_field( 'subtitle_text' ); ?></h3>
        </div>

        <?php elseif ( get_row_layout() == 'paragraph' ) : ?>

        <div class="post-column longform">
            <?php the_sub_field( 'paragraph_content' ); ?>

        </div>

        <?php elseif ( get_row_layout() == 'image' ) : ?>

        <figure>
            <?php $inlineimage = wp_get_attachment_image_src(get_sub_field( 'image_file' ), 'large') ?>
            <img src="<?php echo $inlineimage[0] ?>" alt="<?php the_sub_field( 'alt_text' ); ?>">
            <?php if(get_sub_field('caption')): ?><figcaption><?php the_sub_field( 'caption' ); ?></figcaption>
            <?php endif; ?>
        </figure>

        <?php elseif ( get_row_layout() == 'blockquote' ) : ?>
        <div class="post-column">
            <blockquote class="stylised">
                <?php the_sub_field( 'quotation' ); ?>
                <br>
                <?php if(get_sub_field('citation')): ?><cite class="stylised-cite"><?php the_sub_field( 'citation' ); ?>
                    |
                    <?php the_sub_field( 'role' ); ?></cite>
                <?php endif; ?>
            </blockquote>

        </div>
        <?php elseif ( get_row_layout() == 'video' ) : ?>

        <div class="inline-video post-column">
            <?php the_sub_field( 'video_url' ); ?>
        </div>

        <?php elseif ( get_row_layout() == 'resources_list' ) : ?>
        <div class="post-column">
            <div class="grid-x grid-margin-x">
                <?php if ( have_rows( 'listings' ) ) : ?>
                <div class="cell">
                    <ul>
                        <?php while ( have_rows( 'listings' ) ) : the_row(); ?>
                        <?php $listing = get_sub_field( 'listing' ); ?>
                        <?php if ( $listing ) : ?>
                        <li><a href="<?php echo esc_url( $listing['url'] ); ?>"
                                target="<?php echo esc_attr( $listing['target'] ); ?>"><?php echo esc_html( $listing['title'] ); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php endwhile; ?>
                    </ul>
                </div>

                <?php else : ?>
                <?php // no rows found ?>
                <?php endif; ?>
            </div>
        </div>



        <?php elseif ( get_row_layout() == 'content_thumb_links' ) : ?>
        <div class="grid-x grid-margin-x">
            <?php if(get_sub_field( 'number_of_columns' ) == 'two') { ?>

            <?php $colnum = "medium-6"; ?>

            <?php }elseif(get_sub_field( 'number_of_columns' ) == 'three') { ?>

            <?php $colnum = "medium-4"; ?>

            <?php }

					?>
            <?php if ( have_rows( 'content_links' ) ) : ?>
            <?php while ( have_rows( 'content_links' ) ) : the_row(); ?>

            <?php $image_link = get_sub_field( 'image_link' ) ; ?>
            <?php if ( $image_link ) : ?>


            <div class="archive-card <?php echo $colnum ?> cell"
                style="background:url(<?php echo esc_url( $image_link['url'] ); ?>;" data-aos="fade-up">
                <div class="archive-info ">

                    <?php $content_link = get_sub_field( 'content_link' ); ?>
                    <?php if ( $content_link ) : ?>
                    <a class="hvr-shrink" href="<?php echo esc_url( $content_link['url'] ); ?>">
                        <div class="info-card">
                            <div class="info-card-content">
                                <h3><?php echo esc_html( $content_link['title'] ); ?> </h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php else : ?>
            <?php // no rows found ?>
            <?php endif; ?>
        </div>
        <?php elseif ( get_row_layout() == 'boxed_list' ) : ?>
        <div class="post-column">

            <?php if ( have_rows( 'boxed_listings' ) ) : ?>
            <?php while ( have_rows( 'boxed_listings' ) ) : the_row(); ?>
            <div class="aop-who-card medium-10 cell" data-aos="zoom-in">
                <div class="grid-x grid-margin-x">
                    <div class="la-partner-content  cell">
                        <h3 class="mt0"><?php the_sub_field( 'title' ); ?></h3>
                        <p><?php the_sub_field( 'content' ); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <?php else : ?>
        <?php // no rows found ?>
        <?php endif; ?>
        <?php elseif ( get_row_layout() == 'image_gallery' ) : ?>
        <div class="post-column">
            <h2><?php the_sub_field( 'gallery_title' ); ?></h2>
            <div class="grid-x grid-margin-x align-center">
                <?php if ( have_rows( 'gallery' ) ) : ?>
                <?php while ( have_rows( 'gallery' ) ) : the_row(); ?>
                <div class="la-partner-logo-g medium-4 cell" data-aos="zoom-in">
                    <div class="la-partner-logo-img mb aop-award-card">
                        <?php $image = get_sub_field( 'gallery_image' ); ?>
                        <?php $size = 'full'; ?>
                        <?php if ( $image ) : ?>
                        <?php echo wp_get_attachment_image( $image, $size ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                <?php // no rows found ?>
                <?php endif; ?>
            </div>
        </div>

        <?php elseif ( get_row_layout() == 'call_to_action' ) : ?>
        <?php $button_link = get_sub_field( 'button_link' ); ?>
        <?php 

			if(get_sub_field('position') == 'center')

			{

				$pos = "text-center";
			
			}elseif(get_sub_field('position') == 'left')

			{

				$pos = "text-left";
			

			}elseif(get_sub_field('position') == 'right')

			{

				$pos = "text-right";
			
			}else

			{

				$pos = "text-left";
			}


			 ?>
        <div class="<?php echo $pos ?> mt-dbl">
            <a class="button" href="<?php echo $button_link; ?>"><?php the_sub_field( 'call_to_action_text' ); ?></a>
        </div>








        <?php elseif ( get_row_layout() == 'document_download' ) : ?>
        <section class="download">

            <div class="post-column">
                <div class="download-card" data-equalizer>
                    <div class="download-link" data-equalizer-watch>
                        <img class="doc-icon"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/doc-icon.png"
                            alt="Document download icon">
                    </div>

                    <div class="download-info" data-equalizer-watch>
                        <div class="byline">Resource</div>
                        <p><?php the_sub_field( 'document_download_text' ); ?></p>
                        <?php $document_link = get_sub_field( 'document_link' ); ?>
                        <?php if ( $document_link ): ?>
                        <?php foreach ( $document_link as $post ):  ?>
                        <?php setup_postdata ( $post ); ?>
                        <a class="button" href="<?php the_field('document') ?>" target="_blank">Download</a>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </section>
        <?php elseif ( get_row_layout() == 'links_list' ) : ?>
        <?php if ( have_rows( 'list' ) ) : ?>

        <div class="post-column-list">
            <ul class="resource-list">
                <?php while ( have_rows( 'list' ) ) : the_row(); ?>
                <li>
                    <a href="	<?php if(get_sub_field('page_link')): ?><?php the_sub_field( 'page_link' ); ?> <?php elseif(get_sub_field('link_url')):  ?><?php the_sub_field( 'link_url' ); ?><?php endif; ?>"
                        title="<?php the_sub_field( 'link_text' ); ?>"><?php the_sub_field( 'link_text' ); ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>

        <?php else : ?>
        <?php // no rows found ?>
        <?php endif; ?>
        <?php elseif ( get_row_layout() == 'expanding_list' ) : ?>
        <?php if ( have_rows( 'list_items' ) ) : ?>
        <ul class="accordion" data-accordion data-allow-all-closed="true">
            <?php while ( have_rows( 'list_items' ) ) : the_row(); ?>

            <li class="accordion-item is-closed" data-accordion-item>
                <a href="#" class="accordion-title"><?php the_sub_field( 'title' ); ?></a>
                <div class="accordion-content" data-tab-content>

                    <?php the_sub_field( 'title' ); ?>
                    <?php the_sub_field( 'list__rich_text' ); ?>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php else : ?>
        <?php // no rows found ?>
        <?php endif; ?>
        <?php elseif ( get_row_layout() == 'simple_list' ) : ?>
        <?php if ( have_rows( 'list' ) ) : ?>

        <div class="post-column-list">
            <ul class="list-data">
                <?php while ( have_rows( 'list' ) ) : the_row(); ?>
                <li><?php the_sub_field( 'list_item' ); ?></li>
                <?php endwhile; ?>
            </ul>
        </div>

        <?php else : ?>
        <?php // no rows found ?>
        <?php endif; ?>
        <?php elseif ( get_row_layout() == 'embedded_tweet' ) : ?>
        <div class="row">
            <div class="post-column">
                <?php the_sub_field( 'tweet_url' ); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php else: ?>
        <?php // no layouts found ?>
        <?php endif; ?>
    </div>
</section>


<!-- todo: remove these when the package manager has compiled -->

<?php get_footer(); ?>