<?php
/*
*	Blog Archive
*
*	@package Blog
*	@version 1.0
*/

get_header();

require_once(get_stylesheet_directory().'/modules/advanced-video-banners/templates/avb-inner.php');
?>

    <div class="max__width">
        <div class="blog__loop">

    		<div class="blog__posts">

    			<?php
    				while(have_posts()) : the_post();

    				    $attachment_id = get_field('page_banner');
    				    $blog_img = vt_resize($attachment_id,'' , 800, 533, true);
    			?>

    					<article>
    		                <a href="<?php the_permalink(); ?>" class="blog__post__img" title="<?php the_title(); ?>">

    		                    <div class="blog__post__img__overlay">
    		                        <span class="ion-ios-plus-outline"></span>
    		                    </div><!-- blog__post__img__overlay -->

    		                    <img src="<?php echo $blog_img[url]; ?>" alt="<?php the_title(); ?>">

    		                </a>

    		                <div class="blog__post__content__wrap">

    		                    <div class="blog__post__content">
    		                        <h3><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
    		                        <p><?php echo trunc(get_the_excerpt(), 20); ?></p>
    		                    </div><!-- blog__post__content -->

    		                    <div class="blog__post__meta">
    		                        <div class="blog__post__meta__data">

    		                            <span><i class="ion-ios-calendar-outline"></i><?php the_time('j M Y'); ?></span>

    		                        </div><!-- blog__post__meta__data -->

    		                        <a href="<?php the_permalink(); ?>" title="Full details">Read full article</a>
    		                    </div><!-- blog__post__meta -->

    		                </div><!-- blog__post__content__wrap -->
    		            </article>
    		    <?php endwhile; wp_reset_query(); ?>

    		</div><!-- blog__posts -->

    	</div><!-- blog__loop -->

    </div><!-- max__width -->
<?php get_footer(); ?>
