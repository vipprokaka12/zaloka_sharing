<?php 
$id = get_the_ID();
$title = get_the_title();
$content = get_the_content();
?>
<li>
<?php

the_post_thumbnail();
	the_post_thumbnail_url();

	the_ID();
	the_title();
?>
</li>

