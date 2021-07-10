<?php 
get_header();
if ( have_posts() ) {

	$id = get_the_ID();
	echo $id;
	$subTitle = get_field('price', $id);
	echo $subTitle;
}
get_footer();
?>