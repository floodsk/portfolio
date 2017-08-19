<?php 
/**
 * The template for displaying the home page
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage The_Great_Flood
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>
<article role="article" id="home_article" class="home-article">
    <header role="marquee" id="article_marquee" class="home-marquee">
        <h1 class="home-marquee-title"><?php the_title() ?></h1>
        <ul class="list-pipe"></ul>
    </header>
    <section role="contents" id="article_contents" class="home-contents">
        <div class="home-contents-container">
            <?php if ( have_posts() ) : ?>
            <ul class="list-posts">
                <?php while ( have_posts() ) : the_post(); ?>
                <li class="post">
                    <h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="post-body"><?php the_excerpt(); ?></div>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else: ?>
                <h2><?php _e( 'Whoops....', 'default' ); ?></h2>
                <p><?php _e( 'Looks like the author is still getting content ready for the site.', 'default' ); ?></p>
            <?php endif; ?>
            <?php posts_nav_link(); ?>
        </div>
    </section>
    <footer id="article_footer" class="home-footer"></footer>
</article>
<?php get_footer(); ?>