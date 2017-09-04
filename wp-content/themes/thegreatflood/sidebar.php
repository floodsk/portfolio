<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<aside id="secondary" class="widget-area sidebar" role="complementary">
    <?php if ( is_home() && is_front_page() ): ?>
    <nav role="navigation" id="nav" class="nav nav-connect">
        <?php if ( has_custom_logo() ): ?>
        <figure class="logo logo-default">
            <a href="<?php print get_site_url(); ?>" role="link"><img src="<?php print esc_url( $logo[ 0 ] ) ?>" alt="Shannon Flood, UX and UI Designer"></a>
            <figcaption class="sr-only">
                <h1 class="title"><a href="<?php print get_site_url(); ?>" role="link"><?php print get_bloginfo( 'name' ); ?></a></h1>
            </figcaption>
        </figure>
        <?php else: ?>
        <h1 class="title"><a href="<?php print get_site_url(); ?>" role="link"><?php print get_bloginfo( 'name' ); ?></a></h1>
        <?php endif; ?>
        <?php wp_nav_menu( array( 'theme_location' => 'thegreatflood-connect-menu' ) ); ?>
    </nav>
    <?php else: ?> 
    <nav role="navigation" id="nav" class="nav nav-projects">
       <h1 class="title sr-only"><?php print get_bloginfo( 'name' ); ?></h1>
       <?php wp_nav_menu( array( 'theme_location' => 'thegreatflood-project-menu' ) ); ?>
    </nav>
    <?php endif; ?>
</aside>
