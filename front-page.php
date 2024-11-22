<?php get_header(); ?>

<?php get_template_part('components/flex/content-big_search'); ?>



<?php

// text and image rows flex

set_query_var('layout', 'rows');


get_template_part('components/flex/content-text_and_image', 'rows'); ?>
<!--------------------------  --------------------------------->

<?php

// text and image half image flex

set_query_var('layout', 'half-image');


get_template_part('components/flex/content-text_and_image', 'half-image'); ?>

<!--------------------------  --------------------------------->

<?php

// text and image no bg

set_query_var('layout', 'big-img-no-bg');

get_template_part('components/flex/content-text_and_image', 'big-img-no-bg'); ?>

<!--------------------------  --------------------------------->

<?php

// text and image full image

set_query_var('layout', 'full-image');




get_template_part('components/flex/content-text_and_image', 'full-image');

//------------------------  -------------------------------//
?>



<?php

set_query_var('layout', 'sliding-rows');


get_template_part('components/flex/content-wayfinder'); ?>

<?php get_template_part('components/flex/content-image-gallery'); ?>

<?php

// press releases carousel

set_query_var('layout_old', 'press-releases');


get_template_part('components/flex/content-post_aggregator', 'press-releases');

//------------------------  -------------------------------//

?>
<?php

// news carousel

set_query_var('layout_old', 'news');

get_template_part('components/flex/content-post_aggregator', 'news');

//------------------------  -------------------------------//
?>
<?php

// text and image full colour

set_query_var('layout', 'full-colour');

get_template_part('components/flex/content-text_and_image', 'full-colour');

//------------------------  -------------------------------//

?>

<?php get_template_part('components/flex/content-postcode_search'); ?>

<?php get_footer(); ?>