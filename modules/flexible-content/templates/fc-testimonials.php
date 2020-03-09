<?php
/*
 Testimonials
 */

// format
$display_format = ' '.get_sub_field('testimonials_display_format');

// order by
$order_by = get_sub_field('testimonials_order_by');

// no. of items
$posts_per_page = get_sub_field('testimonials_number');

// carousel
$carousel_open = '';
$carousel_close = '';
if(get_sub_field('testimonials_display_format') === 'grid' && get_sub_field('testimonials_carousel')) {
    $carousel_open = '<div id="testimonials_carousel">';
    $carousel_close = '</div>';
}

echo '<div class="testimonials__wrapper'.$display_format.'">';
echo $carousel_open;

// Prepare query
$pages = $wp_query->max_num_pages;
$testimonials = new WP_Query(array(
    'post_type'         => 'testimonial',
    'post_status'       => 'publish',
    'orderby'           => $order_by,
    'order'             => 'asc',
    'posts_per_page'    => $posts_per_page,
    'paged'             => $paged
));

while($testimonials->have_posts()) : $testimonials->the_post();

// Stars
$stars = get_field('testim_rating');

// align
$align = '';
if(get_field('testim_video_id')) {
    $align = ' '.get_field('testim_video_position');
}
?>
    <article>
        <div class="testimonial__meta">
            <h3><?php the_title(); ?></h3>
            <div class="stars">
                <?php for($x = 1; $x <= $stars; $x++): ?>
                    <span>&#x2605;</span>
                <?php endfor; ?>
            </div><!-- stars -->
        </div><!-- testimonial__meta -->

        <?php if(get_field('testim_video_id')): ?>
            <div class="video-wrapper">
                <div class="video-responsive">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php the_field('testim_video_id'); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div><!-- video-responsive -->
            </div><!-- video-wrapper -->
        <?php endif; ?>

        <div class="testim__content">
            <p><?php if(get_sub_field('testimonials_display_format') === 'grid') { echo trunc(get_field('testim_quote'), 25); } else { the_field('testim_quote'); } ?></p>
            <h5><?php the_field('testim_name'); ?></h5>
        </div><!-- testim__content -->
    </article>
<?php
endwhile; wp_reset_postdata();

echo '</div><!-- testimonials__wrapper -->';
echo $carousel_open;
?>

<?php pagination($testimonials->max_num_pages); ?>
