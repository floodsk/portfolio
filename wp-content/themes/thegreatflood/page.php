<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage
 * @since 1.0
 * @version 1.2
 */

$tags = get_the_tags( get_the_ID() );
get_header(); ?>
<?php while( have_posts() ): the_post()?>
<header role="marquee" id="marquee" <?php post_class( 'marquee' ); ?>>
    <h1 class="marquee-title"><?php the_title() ?></h1>
    <?php if ( isset( $tags ) && !empty( $tags ) ): ?>
    <ul class="list-categories">
        <?php foreach( $tags as $tag ): ?>
        <li><?php print $tag->name; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</header>
<section role="content" id="content" <?php post_class( 'content' ); ?>>
    <div class="contents-container"><?php the_content(); ?></div>

</section>
<footer id="footer" class="footer">
    <section class="pager">
        <?php previous_post_link('%link', 'Previous'); ?>
        <?php next_post_link( '%link', 'Next' ); ?>
    </section>
</footer>
<?php endwhile; ?>
<?php get_footer(); ?>
