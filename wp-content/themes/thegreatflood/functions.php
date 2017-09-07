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