<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-21324493-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-21324493-3');
    </script>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title( '-', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <?php
        wp_head();
        global $woocommerce, $current_user;
    ?>
</head>

<body <?php body_class(); ?>>

    <nav id="nav_mobile" class="nav__mobile">
		<div>
		    <div class="menu__logo"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo.png" alt="<?php bloginfo('name'); ?> /"></div>
	    	<?php wp_nav_menu(array('menu' => 'Mobile Menu', 'container' => false)); ?>
	    </div>
	</nav>

	<div id="page">

		<header class="header">
            <div class="header__main">

                <div class="max__width">

                    <div class="burger__menu">
                        <a href="#nav_mobile"><i class="fal fa-bars"></i></a>
                    </div><!-- burger__menu -->

                    <div class="logo">
                        <a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div><!-- logo -->

                    <div class="header__right">
                        <div class="header__right__top">
                            <ul>
                                <li><a href="<?php echo esc_url(home_url()); ?>/find-a-branch/" target="_blank"><i class="fal fa-map-marker"></i> <span>Find a branch</span></a></li>
                                <li><a href="<?php echo esc_url(home_url()); ?>/report-a-problem/" target="_blank"><i class="fal fa-wrench"></i> <span>Report a problem</span></a></li>
                                <li><a href="tel:0208 7496060"><i class="fal fa-phone"></i> <strong>0208 7496060</strong></a></li>
                            </ul>

                            <?php if(get_field('header_social', 'options')): ?>
                                <ul class="header__social">
                                    <?php while(have_rows('header_social', 'options')) : the_row(); ?>
                                        <li>
                                            <a href="<?php the_sub_field('header_social_icon'); ?>" title="<?php the_sub_field('header_social_platform'); ?>" target="_blank">
                                                <i class="<?php the_sub_field('header_social_icon'); ?>"></i>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul><!-- header__social -->
                            <?php endif; ?>
                        </div><!-- header__right__top -->

                        <div class="empty-div"></div>

                        <nav class="header__nav">
                            <?php wp_nav_menu(array('menu' => 'Main Menu', 'container' => false)); ?>
                        </nav>

                        <nav class="header__nav">
                            <?php wp_nav_menu(array('menu' => 'Contact Menu', 'container' => false)); ?>
                        </nav>
                    </div><!-- header__right -->
                </div><!-- max__width -->
            </div><!-- header__main -->
		</header><!-- header -->
