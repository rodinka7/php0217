<?php
add_theme_support('customize_register');

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

class Walker_Quickstart_Menu extends Walker {

    var $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    );

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( "\n<li class=\"nav-list__nav-item\"><a class=\"nav-list__nav-item__nav-link\"
			href='%s'%s>%s</a></li>\n",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }

}

class Walker_Quickstart_Menu_Bottom extends Walker {

    var $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    );

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( "\n<li class=\"b-menu__list__item\"><a class=\"b-menu__list__item__link\"
			href='%s'%s>%s</a></li>\n",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
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