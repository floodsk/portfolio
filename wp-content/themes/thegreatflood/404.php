<?php
/**
 * The template for displaying content pages
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<header role="marquee" id="marquee" <?php post_class( 'marquee' ); ?>>
    <h1 class="marquee-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'default' ); ?></h1>
</header>
<section role="content" id="content" <?php post_class( 'content' ); ?>>
    <div class="contents-container"><p><?php _e( 'It looks like nothing was found at this location.', 'default' ); ?></p></div>
</section>
<?php get_footer(); ?>