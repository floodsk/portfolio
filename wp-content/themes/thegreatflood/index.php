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

$posts = get_pages( array( 'sort_column' => 'menu_order' ) );
get_header(); ?>
<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Home Summary' ) ) : ?><?php endif; ?>
<section role="content" id="content" <?php post_class( 'content' ); ?>>
    <div class="content-container">
        <?php if ( isset( $posts ) && !empty( $posts ) ): ?>
        <ul class="list-pages">
            <?php foreach( $posts as $post ): setup_postdata( $post ); ?>
            <li class="page-item">
                <?php $categories = get_the_category(); ?>
                <?php if ( isset( $categories ) && !empty( $categories ) ): ?><h2 class="page-category"><?php print $categories[ 0 ]->name; ?></h2><?php endif; ?>
                <div <?php post_class(); ?>>
                  <h3 class="page-title"><a href="<?php the_permalink(); ?>" role="link" class="lnk lnk-page"><?php the_title(); ?></a></h3>
                  <?php if ( the_excerpt() ) : ?><div class="pate-excerpt"><?php the_excerpt(); ?></div><?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <h2><?php _e( 'Whoops....', 'default' ); ?></h2>
            <p><?php _e( 'Looks like the author is still getting content ready for the site.', 'default' ); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
