<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<article role="article" id="article" class="article">
    <header role="marquee" id="marquee" class="marquee">
		<h1 class="marquee-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'default' ); ?></h1>
	</header>
    <section role="contents" id="contents" class="contents">
		<div class="contents container">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'default' ); ?></p>
		</div>
	</section>
</article>
<?php get_footer();
