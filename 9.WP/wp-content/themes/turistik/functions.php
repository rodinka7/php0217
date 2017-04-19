<?php
function get_thumbnail(){
	$thumbnail = get_the_post_thumbnail_url();

	if (!$thumbnail) {
		return get_stylesheet_directory_uri().'/img/post_thumb/thumb_1.jpg';
	} else {
		return $thumbnail;
	}
}
?>