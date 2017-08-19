<aside id="sidebar" class="sidebar" role="complementary">
    <?php if ( is_home() ): ?>
    <div class="about">
        <h1 class="about-title">Shannon Flood</h1>
        <ul class="list-inline">
            <li><a href="" role="link" rel="bookmark" target="_blank" class="btn btn-primary">Contact</a></li>
            <li><a href="" role="link" rel="bookmark" target="_blank" class="btn btn-primary">LinkedIn</a></li>
        </ul>
    </div>
    <?php else: ?> 
    <nav role="navigation" id="nav" class="nav">
        <ul class="list-nav">
            <li class="nav-home"><a href="<?php echo get_option('home'); ?>/" role="link" rel="bookmark" class="lnk lnk-nav">Home</a></li>
            <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
        </ul>
    </nav>
    <?php endif; ?>
</aside>
