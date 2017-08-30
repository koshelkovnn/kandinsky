<?php
/**
 * The template for displaying all pages.
 */


$cpost = get_queried_object();


get_header(); 
?>
<header class="page-header">
    <div class="container-text">
        <h1 class="page-title"><?php echo get_the_title($cpost);?></h1>
        <?php if(!empty($cpost->post_excerpt)) { ?>
            <div class="page-intro"><?php echo apply_filters('knd_the_title', $cpost->post_excerpt);?></div>
        <?php } ?>
    </div>
</header>

<div class="page-content container">
    <div class="the-content">
        <?php echo apply_filters('knd_entry_the_content', $cpost->post_content); ?>
    </div>
</div>


<?php get_footer(); 
