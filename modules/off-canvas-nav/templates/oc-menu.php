<nav class="oc__nav">
    <div class="oc__nav__background">
        <figure class="panel__left"></figure>
        <figure class="panel__right"></figure>
    </div><!-- nav__background -->

    <div class="oc__nav__content">
        <a href="#" class="oc__nav__trigger"><i class="fal fa-times"></i></a>
        
        <article class="oc__nav__content__panel panel__left">
            <div class="logo">
                <a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo.jpg" alt="<?php bloginfo('name'); ?>">
                </a>
            </div><!-- logo -->
            
            <div class="asm">
                <?php wp_nav_menu(array('menu' => 'Main Menu', 'items_wrap' => '<ul class="asm__main">%3$s</ul>', 'container' => false, 'walker' => new Slide_Menu)); ?>
            </div><!-- asm -->
        </article>

        <article class="oc__nav__content__panel panel__right">
            <div id="oc_nav_response" class="fc_masonry"></div>
        </article>
    </div><!-- oc__nav__content -->
</nav><!-- off__canvas__nav -->