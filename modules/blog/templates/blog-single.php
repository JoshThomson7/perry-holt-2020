<?php
/*
*	Blog Single
*
*	@package Blog
*	@version 1.0
*/

get_header();

require_once(get_stylesheet_directory().'/modules/advanced-video-banners/templates/avb-inner.php');
?>

    <div class="max__width">
    	<div class="blog__single">
    		<article>
                <h1><?php echo get_the_title($post->ID); ?> <span><i class="ion-ios-calendar-outline"></i><?php the_time('j M Y'); ?></span></h1>
                <?php
                    if(has_post_thumbnail()):

                    $attachment_id = get_post_thumbnail_id();
                    $blog_image = vt_resize($attachment_id,'' , 1200, 600, true);
                ?>
                    <div class="blog__featured__image" style="background-image:url(<?php echo $blog_image['url'] ?>)">

                    </div><!-- blog__featured__image -->
                <?php endif; ?>

    			<?php include(get_template_directory().'/modules/flexible-content/flexible-content.php'); ?>
    		</article>

            <?php require_once('blog-sidebar.php'); ?>
    	</div><!-- blog__single -->
    </div><!-- max__width -->

<?php get_footer(); ?>
