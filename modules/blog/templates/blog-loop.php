<?php
/*
*	Blog Loop
*
*	@package Blog
*	@version 1.0
*/

if(is_category()) {
    $cat = get_queried_object();
    $cat_slug = $cat->slug;
}

// Prepare query
$blog = new WP_Query(array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => 15,
    'cat'               => $cat_slug,
    'orderby'           => 'date',
    'order'             => 'desc'
));
?>

	<div class="blog__loop">

		<div class="blog__posts">

			<?php
				while($blog->have_posts()) : $blog->the_post();

                    if(get_field('page_banner')) {
                        $attachment_id = get_field('page_banner');
                    } else {
                        $attachment_id = get_post_thumbnail_id();
                    }

				    $blog_img = vt_resize($attachment_id,'' , 800, 533, true);
                    $blog_img = ' style="background-image:url('.$blog_img['url'].')"';
			?>

					<article>
		                <a href="<?php the_permalink(); ?>" class="blog__post__img" title="<?php the_title(); ?>"<?php echo $blog_img; ?>>
		                    <div class="blog__post__img__overlay">
		                        <span class="ion-ios-plus-outline"></span>
		                    </div><!-- blog__post__img__overlay -->
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
