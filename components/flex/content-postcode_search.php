<?php
// $row = get_row_index() - 0; 

// $small_title = get_sub_field('small_title');
// $big_title = get_sub_field('big_title');
// $intro_text = get_sub_field('intro_text');
// $link = get_sub_field('link');
// $layout = get_sub_field('layout');
?>

<section class="section_postcode_search row-<?php echo $row; ?>">
    <div class="container_small">


        <div class="postcode-search-wrapper">
            <div class="img-wrapper">
                <img src=<?php echo get_template_directory_uri() . "/assets/images/jpg/train.jpg" ?> alt="">
            </div>


            <div class="text-col">
                <h2 class="title-tag">Public Bodies</h2>
                <h3 class="heading h2">Find out more information about your local public body.</h3>

                <form class="search-form" action="" aria-label="Search form for postcode">
                    <label for="postcode-input" class="sr-only">Postcode</label>
                    <div class="search-box">

                        <input id="postcode-input" class="input" type="text" placeholder="Postcode here"
                            aria-label="Enter your postcode" required>
                        <button class="btn cobalt text-white" type="submit" aria-label="Search for postcode">
                            Search
                            <span class="btn-arrow-container" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>



        </div>

    </div>
</section>