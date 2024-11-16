<?php
// $row = get_row_index() - 0; 

// $small_title = get_sub_field('small_title');
// $big_title = get_sub_field('big_title');
// $intro_text = get_sub_field('intro_text');
// $link = get_sub_field('link');
// $layout = get_sub_field('layout');
?>

<section class="section_big_search row-<?php echo $row; ?>" data-aos="fade-up"
    data-aos-anchor-placement="bottom-bottom">
    <div class="container">


        <div class="search-wrapper">
            <div class="triangle"></div>
            <div class="search-flex-content">
                <h2 class="title-tag">Resources</h2>
                <h3 class="heading h1">Looking for something specific?</h3>
                <form class="search-form " action="">


                    <div class="search-box ">
                        <input class="input" type="text" placeholder="Search">
                        <button class="cobalt btn">
                            <img class="search-icon"
                                src="<?php bloginfo('template_url'); ?>/assets/images/svg/search-icon.svg" alt="">
                            <span class="search-text text-white">Search</span>
                            <div class="btn-arrow-container"></div>
                        </button>
                    </div>


                    <label>Category</label>
                    <select class="input" name="category">
                        <option value="volvo">News</option>
                        <option value="saab">Press Releases</option>
                    </select>


                </form>

            </div>



        </div>

    </div>
</section>