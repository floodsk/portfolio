<?php

function thegreatflood_custom_logo_setup() {
    $defaults = array(
        'height'      => 240,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'thegreatflood_custom_logo_setup' );

function thegreatflood_enqueue_scripts() {
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/modernizr.min.js', array(), 1, false );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/script.min.js', array(), 1, true );
}
add_action( 'wp_enqueue_scripts', 'thegreatflood_enqueue_scripts' );

function thegreatflood_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action( 'init', 'thegreatflood_excerpts_to_pages' );

function thegreatflood_menus() {
    register_nav_menus( array(
        'thegreatflood-connect-menu' => __( 'Connect' ),
        'thegreatflood-project-menu' => __( 'Projects' )
    ));
}
add_action( 'init', 'thegreatflood_menus' );

function thegreatflood_custom_menu_page_removing() {
  remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'thegreatflood_custom_menu_page_removing' );

function thegreatflood_edit_form_after_title() {
    $tip = '<strong>TIP:</strong> To create a single line break use <code>SHIFT+RETURN</code>. By default, <code>RETURN</code> creates a new paragraph.';
    echo '<p style="margin-bottom:0;">'.$tip.'</p>';
}
add_action( 'edit_form_after_title', 'thegreatflood_edit_form_after_title' );

function thegreatflood_image_send_to_editor( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
   $image = wp_get_attachment_image_src( $id, 'full', FALSE );
   if ( !$image ) return '';

   $metadata = wp_get_attachment_metadata( $id );
   $srcset = wp_calculate_image_srcset( array( $image[ 1 ], $image[ 2 ] ), $image[ 0 ], $metadata );

    $classes = 'img-responsive wp-image-' . $id . ' img-' . $image[ 1 ] . '-by-' . $image[ 2 ];
    $classes .= gettype( $size ) === 'string' ? ' img-size-' . $size : '';
    if ( $align === 'left' ) {
        $classes .= ' block-left';
    } elseif ( $align === 'right' ) {
        $classes .= ' block-right';
    } elseif ( $align === 'center' ) {
        $classes .= ' block-center';
    } else {
        $classes .= ' block-none';
    }
    $classes = apply_filters( 'get_image_tag_class', $classes, $id, $align, $size );

    $markup = isset( $url ) && !empty( $url ) ? '<a href="' . $url . '"><figure class="img"' : '<figure class="img"';
    $markup .= ' id="wp-image-' . $id . '">';
    $markup .= '<img src="' . $image[ 0 ] . '" srcset="' . $srcset . '" class="' . $classes . '" alt="' . esc_attr( $alt ) . '" tile="' . esc_attr( $title ) . '" />';
    $markup .= isset( $caption ) && !empty( $caption ) ? '<figcaption>' . $caption . '</figcaption>' : '';
    $markup .= '</figure>';

    return $markup;
}
add_filter( 'image_send_to_editor', 'thegreatflood_image_send_to_editor', 10, 8 );
