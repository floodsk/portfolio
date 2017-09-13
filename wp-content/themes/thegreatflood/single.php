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

$tags = get_the_tags( get_the_ID() );
get_header(); ?>
<?php while( have_posts() ): the_post()?>
<header role="marquee" id="marquee" <?php post_class( 'marquee' ); ?>>
    <h1 class="marquee-title"><?php the_title() ?></h1>
    <?php if ( isset( $tags ) && !empty( $tags ) ): ?>
    <ul class="list-pipe">
        <?php foreach( $tags as $tag ): ?>
        <li><?php print $tag->name; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</header>
<section role="content" id="content" <?php post_class( 'content' ); ?>>
    <div class="contents-container"><?php the_content(); ?></div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>