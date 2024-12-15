<?php /* Responsive Images */


function build_post_response($args)
{
	// if arguments have been passed
	if ($args) {

		// set up a new WP_Query instance with our arguments
		$query = new WP_Query($args);

		// get the posts for the query
		$posts = $query->posts;

		// if there are posts
		if ($posts) {
			// for each post
			foreach ($posts as $post) {
				//post object is our main item
				$item = $post;

				// get all metadata
				$allMetadata = get_metadata('post', $post->ID);

				// filter out metadata that starts with '_'
				$noUnderscoreMetadata = array_filter($allMetadata, "leading_underscore", ARRAY_FILTER_USE_KEY);

				// unserialize serialised values
				$unserialisedMetadata = wordpress_unserialise($noUnderscoreMetadata);
				$item->metadata = $unserialisedMetadata;

				// render the data as WordPress does
				$item->post_content_rendered = apply_filters('the_content', $post->post_content);

				// people tend not to actually use the excerpt, so let's set up a fallback one
				// trim the content to 25 words
				// it would be great to be able to use the one set in the theme but apparently that's not an option

				$item->post_excerpt_fallback = wp_trim_words($post->post_content, 25);

				// add the permalink
				$item->permalink = get_the_permalink($post);

				// add the featured image
				$featuredImage = get_post_thumbnail_id($post);

				if ($featuredImage > '') {
					// create an array to add multiple image values
					$item->featured_image = array();

					// add the featured image ID
					$item->featured_image['id'] = $featuredImage;

					// add the alt tag
					$imageAlt = get_post_meta($featuredImage, '_wp_attachment_image_alt', true);

					// if there's an alt
					if ($imageAlt) {
						// use the alt
						$item->featured_image['alt'] = $imageAlt;
					} else {
						// otherwise, use the post title
						$item->featured_image['alt'] = $post->post_title;
					}

					// create an empty array for the sources
					$item->featured_image['src'] = array();

					$imageSizes = get_intermediate_image_sizes();

					// for each image size
					foreach ($imageSizes as $imageSize) {
						$imageURL = wp_get_attachment_image_src($featuredImage, $imageSize);

						// Check if imageURL is valid before adding it
						if ($imageURL && isset($imageURL[0])) {
							$item->featured_image['src'][$imageSize] = $imageURL[0];
						} else {
							// Handle missing or invalid image sizes gracefully
							$item->featured_image['src'][$imageSize] = ''; // Empty or fallback URL
						}
					}

					$imgArgs = array(
						'alt' => $item->featured_image['alt'],
						'id' => $item->featured_image['id'],
						'class' => 'w-full'
					);

					$item->srcsetList = build_srcset('squareList', $imgArgs);
					$item->srcsetStory = build_srcset('squareStory', $imgArgs);
				}

				// add the item object to our array of items
				$items['posts'][] = $item;
			}
		} else {
			// return an error
			$items['error'] = 'No response available';
		}

		// include the arguments in our response
		$items['args'] = $args;
		return $items;
	} else {
		// return an error
		return 'Error: no arguments received';
	}
}

/** Responsive images **/
function responsive_options($wp_customize)
{
	// responsive images area
	$wp_customize->add_panel('responsive_section', array(
		'title'    => __('Responsive images', 'designdough')
	));

	// the name of the element (i.e agg, aggLarge, aggSidebar, matchReport)
	$wp_customize->add_section('imagenames_section', array(
		'title'    => __('Image sizes', 'designdough'),
		'description' => 'Define the WordPress image sizes for this project. You have to refresh before the dimensions and sizes fields update. Sorry about that.',
		'panel' => 'responsive_section'
	));

	// the dimensions of the image at each viewport
	$wp_customize->add_section('imagedimensions_section', array(
		'title'    => __('Image dimensions', 'designdough'),
		'description' => 'Define the image dimensions for each image size and viewport. Use the format "[width]x[height]" 1500px is the default and is required. All others are not required',
		'panel' => 'responsive_section'
	));

	// the 'sizes=""' value that should be returned by the srcset
	$wp_customize->add_section('imagesizes_section', array(
		'title'    => __('Image sizes attribute', 'designdough'),
		'description' => 'Define the sizes attribute for the srcset',
		'panel' => 'responsive_section'
	));

	$wp_customize->add_setting('imagesizes');

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'imagesizes',
			array(
				'label'     => __('Image sizes', 'designdough'),
				'section'   => 'imagenames_section',
				'description' => __('Comma separated list of image sizes for this project (e.g. banner,index,searchResult)', 'designdough'),
				'settings'  => 'imagesizes',
				'type'      => 'text'
			)
		)
	);

	// get a list of the defined image sizes and explode it on a comma
	$imagesizesMod = get_theme_mod('imagesizes');
	$imagesizes = explode(',', $imagesizesMod);

	// these are the pixel values where the image is likely to change. They will usually stay constant beyond 1500. This is used as our default image size
	$breakpoints = ['load', '414', '767', '1039', '1232', '1366', '1500', '1920'];

	foreach ($imagesizes as $img) {
		$img = trim($img);

		$wp_customize->add_setting('imagesizes_' . $img);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'imagesizes_' . $img,
				array(
					'label'     => __($img, 'designdough'),
					'section'   => 'imagesizes_section',
					'settings'  => 'imagesizes_' . $img,
					'type'      => 'text'
				)
			)
		);

		$wp_customize->add_setting('imagecrop_' . $img, [
			'default'	=> '1'
		]);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'imagecrop_' . $img,
				array(
					'label'     => __('Enable cropping for ' . $img, 'designdough'),
					'section'   => 'imagesizes_section',
					'settings'  => 'imagecrop_' . $img,
					'type'      => 'checkbox'
				)
			)
		);

		foreach ($breakpoints as $breakpoint) {
			$wp_customize->add_setting('imagedimensions_' . $img . '-' . $breakpoint);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'imagedimensions_' . $img . '-' . $breakpoint,
					array(
						'label'     => __($img . ' - ' . $breakpoint . 'px screen width', 'designdough'),
						'section'   => 'imagedimensions_section',
						'settings'  => 'imagedimensions_' . $img . '-' . $breakpoint,
						'type'      => 'text'
					)
				)
			);
		}
	}
}

add_action('customize_register', 'responsive_options');