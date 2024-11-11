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
                <p class="title-tag">Public Bodies</p>
                <h3 class="heading h2">Find out more information about your local public body.</h3>
                <form class="search-form " action="">


                    <div class="search-box ">
                        <input class="input" type="text" placeholder="Search">
                        <button class="btn cobalt text-white">
                            Search
                        </button>
                    </div>


                </form>

            </div>



        </div>

    </div>
</section>