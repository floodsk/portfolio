<?php 
/**
 * The template for displaying the home page
 *
 * @link https://codex.wordpress.org/
 *
 * @package WordPress
 * @subpackage The_Great_Flood
 * @since 1.0
 * @version 1.0
 */

$categories = get_categories( 'orderby=name&order=ASC' );
get_header(); ?>
<?php get_sidebar(); ?>
<article role="article" id="home_article" <?php post_class( 'home-article' ); ?>>
    <section role="contents" id="article_contents" class="home-contents">
        <div class="home-contents-container">
            <?php if ( isset( $categories ) && !empty( $categories ) ): ?>
            <ul class="list-sections">
                <?php foreach( $categories as $category ): ?>
                <?php query_posts( "cat=$category->term_id&orderby=date&order=DESC"); ?>
                <?php if ( have_posts() ): ?>
                <li class="section">
                    <h2 class="section-title"><?php print !preg_match( '/^Uncategorized$/i', $category->name ) ? $category->name : 'Miscellaneous' ?></h2>
                    <ul class="pages">
                        <?php while( have_posts() ) : the_post(); ?>
                        <li <?php post_class(); ?>>
                            <h3 class="page-title"><a href="<?php the_permalink(); ?>" role="link" class="lnk lnk-page"><?php the_title(); ?></a></h3>
                            <?php if ( the_excerpt() ) : ?><div class="pate-excerpt"><?php the_excerpt(); ?></div><?php endif; ?>
                        </li>
                       <?php endwhile ?>
                    </ul>
                </li>
                <?php endif; endforeach; ?>
            </ul>
            <?php else: ?>
                <h2><?php _e( 'Whoops....', 'default' ); ?></h2>
                <p><?php _e( 'Looks like the author is still getting content ready for the site.', 'default' ); ?></p>
            <?php endif; ?>
        </div>
    </section>
    <footer id="article_footer" class="home-footer"></footer>
</article>
<?php get_footer(); ?>