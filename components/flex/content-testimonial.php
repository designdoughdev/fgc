<?php $colourScheme = get_sub_field('colour_scheme'); ?>
<?php $small_title = get_sub_field('small_title'); ?>
<?php $quote = get_sub_field('quote'); ?>
<?php $quote_info = get_sub_field('quote_info'); ?>

<?php $row = get_row_index() - 0; ?>

<section class="section_testimonial  row-<?php echo $row; ?> relative">
    <div class="container-wrapper">

        <div class="section-content <?php echo $colourScheme ?>-style testimonial">

            <div class="text-content">
                <?php if ($small_title): ?>
                    <h2 class="title-tag"><?php echo $small_title; ?></h2>
                <?php endif; ?>
                <?php if ($quote): ?>
                    <h4 class="quote h2"><?php echo $quote; ?></h4>
                <?php endif; ?>
                <?php if ($quote_info): ?>
                    <p class="quote-info"><?php echo $quote_info; ?></p>
                <?php endif; ?>

            </div>


        </div>

    </div>
</section>