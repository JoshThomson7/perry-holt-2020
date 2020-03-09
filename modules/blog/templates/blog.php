<?php
/*
	Blog
*/

get_header();

// Inner Banner
require_once(get_stylesheet_directory().'/modules/advanced-video-banners/templates/avb-inner.php');
?>

    <div class="max__width">
        <section class="blog">
    		<?php require_once('blog-loop.php'); ?>
    		<?php require_once('blog-sidebar.php'); ?>
    	</section><!-- blog -->
    </div><!-- max__width -->

<?php get_footer(); ?>
