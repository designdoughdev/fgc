<?php
// $row = get_row_index() - 0; 

// $small_title = get_sub_field('small_title');
// $big_title = get_sub_field('big_title');
// $intro_text = get_sub_field('intro_text');
// $link = get_sub_field('link');
// $layout = get_sub_field('layout');
?>

<section class="section_big_search row-<?php echo $row; ?>">
    <div class="container">

        <div class="search-wrapper">
            <p class="title-tag">Resources</p>
            <h3 class="heading h1">Looking for something specific?</h3>
            <form class="search-form" action="">
                <div class="search-box">
                    <input type="text" placeholder="Search">
                    <button class="btn cobalt text-white">Search</button>
                </div>
                <select name="category">
                    <option value="volvo">News</option>
                    <option value="saab">Press Releases</option>
                </select>

            </form>


        </div>

    </div>
</section>