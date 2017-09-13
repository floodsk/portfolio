<?php
/**
 * The template for displaying the attachment.php
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

get_header(); ?>
<?php while( have_posts() ): the_post()?>
<header role="marquee" id="marquee" <?php post_class( 'marquee' ); ?>>
    <h1 class="marquee-title"><?php the_title() ?></h1>
</header>
<section role="content" id="content" <?php post_class( 'content' ); ?>>
    <div class="contents-container">
        <figure class="img">    
            <?php echo wp_get_attachment_image( get_the_ID(), 'full' ); ?>
            <?php if ( has_excerpt() ) : ?><figcaption><?php the_excerpt(); ?></figcaption><?php endif; ?>
        </figure>
    </div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>