<?php
add_theme_support('customize_register');

add_theme_support('menus');

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

function hwl_home_pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        $query->set( 'posts_per_page', 5 );
        return;
    }
}

add_action( 'pre_get_posts', 'hwl_home_pagesize' );

function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_section(
        'section_logo', array(
        'title' => 'Изменить логотип',
        'description' => 'Изменение картинки в логотипе',
        'priority' => 11
        )
    );

    $wp_customize->add_setting( 'img-upload' );
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'img-upload',
            array(
                'label' => 'Загрузка изображения',
                'section' => 'section_logo',
                'settings' => 'img-upload'
            )
        )
    );
}

add_action( 'customize_register', 'mytheme_customize_register' );

?>