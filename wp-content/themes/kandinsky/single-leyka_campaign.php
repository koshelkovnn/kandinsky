<?php
/**
 * Campaign page
 * 
 **/

$cpost = get_queried_object(); 
$age = get_post_meta($cpost->ID, 'campaign_age', true);
if(!empty($age))
	$age = ', '.$age;
 
get_header();
?>
<article class="main-content leyka-campaign">
<div class="container">
	<header class="entry-header-full">
		<h1 class="entry-title"><?php echo get_the_title($cpost);?><?php echo $age;?></h1>
	</header>
	
	<main class="container-text">
    
		<div class="campaign-form ">
			<?php echo apply_filters('the_content', $cpost->post_content); ?>
		</div>
    
	</main>
	
</div>
</article>
<?php
get_footer();
