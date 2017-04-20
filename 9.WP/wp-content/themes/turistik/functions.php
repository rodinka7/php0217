<?php
register_nav_menus([
	'top' => 'верхнее меню',
	'bottom' => 'нижнее меню'
]);

function get_thumbnail(){
	$thumbnail = get_the_post_thumbnail_url();

	if (!$thumbnail) {
		return get_stylesheet_directory_uri().'/img/post_thumb/thumb_1.jpg';
	} else {
		return $thumbnail;
	}
}

function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'header_textcolor' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );


?>