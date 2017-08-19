<?php

function thegreatflood_enqueue_scripts() {
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/modernizr.min.js', array(), 1, false );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/script.min.js', array(), 1, true );
}
add_action( 'wp_enqueue_scripts', 'thegreatflood_enqueue_scripts' );

if ( function_exists( 'register_sidebar' ) ) {
    register_sidebar(array(
        'id' => 'sidebar',
        'before_widtet' => '',
        'after_widget' => '',
        'before_title' => '',
        'before_title' => '',
    ));
}

function thegreatflood_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action( 'init', 'thegreatflood_excerpts_to_pages' );