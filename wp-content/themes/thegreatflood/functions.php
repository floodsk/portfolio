<?php

if ( function_exists( 'register_sidebar' ) ) {
  register_sidebar( array(
    'name' => 'Home Summary',
    'id'   => 'home-summary-widget',
    'description'   => 'Widget to add the Home Summary on index.php.',
    'before_widget' => '<aside id="summary" class="summary"><div class="summary-container">',
    'after_widget' => '</div></aside>',
    'before_title' => '<h1 class="summary-title">',
    'after_title'   => '</h1>'
  ) );
}

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
  wp_enqueue_style( 'style-min', get_template_directory_uri() . '/style.min.css' );
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

function thegreatflood_image_class( $class ){
  return $class . ' img-responsive';
}
add_filter( 'get_image_tag_class', 'thegreatflood_image_class' );

function thegreatflood_previous_post_link( $output ) {
  return str_replace( '<a href=', '<a class="lnk lnk-pager lnk-pager-prev" href=', $output );
}
add_filter( 'previous_post_link', 'thegreatflood_previous_post_link' );

function thegreatflood_next_post_link( $output ) {
  return str_replace( '<a href=', '<a class="lnk lnk-pager lnk-pager-next" href=', $output );
}
add_filter( 'next_post_link', 'thegreatflood_next_post_link' );

function thegreatflood_filter_ptags_on_images( $content ) {
  $content = preg_replace( '/(\[caption id="[^"]*" align="[^"]*" width="[0-9]*")(\]\s*<img)/iU', '$1 class="wp-image"$2', $content );
  $content = preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '<div class="wp-image">$1$2$3</div>', $content );
  return $content;
}
add_filter( 'the_content', 'thegreatflood_filter_ptags_on_images' );
