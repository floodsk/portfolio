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
<?php get_sidebar(); ?> 
<?php while( have_posts() ): the_post()?>
<article role="article" id="page_article" <?php post_class( 'page-article' ); ?>>
    <header role="marquee" id="article_marquee" class="page-marquee">
        <h1 class="page-marquee-title"><?php the_title() ?></h1>
        <?php if ( isset( $tags ) && !empty( $tags ) ): ?>
        <ul class="list-pipe">
            <?php foreach( $tags as $tag ): ?>
            <li><?php print $tag->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </header>
    <section role="contents" id="article_contents" class="page-contents">
        <div class="page-contents-container"><?php the_content(); ?></div>
    </section>
    <footer id="article_footer" class="page-footer"></footer>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>