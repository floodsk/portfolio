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
<?php get_sidebar(); ?>
<article role="article" id="page_article" class="page-article">
    <header role="marquee" id="article_marquee" class="page-marquee">
        <h1 class="page-marquee-title"><?php the_title() ?></h1>
        <ul class="list-pipe">
            <li><?php the_category(' | '); ?></li>
        </ul>
    </header>
    <section role="contents" id="article_contents" class="page-contents">
        <div class="page-contents-container"><?php the_content() ?></div>
    </section>
    <footer id="article_footer" class="page-footer"></footer>
</article>
<?php get_footer(); ?>