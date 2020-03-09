<?php
/*
    Single property sidebar
*/

$opening_times = new APF_Opening_Times;
?>
<div class="apf__single__property__sidebar">

    <?php
        // Get branch
        $property_branch_id = get_field('property_branch_id');
        $branch_query = new WP_Query(array(
            'post_type'         => 'branch',
            'post_status'       => 'publish',
            'meta_query' => array(
                array(
                    'key'       => 'branch_id',
                    'value'     => $property_branch_id,
                    'compare'   => 'IN'
                )
            )
        ));
        while($branch_query->have_posts()) : $branch_query->the_post();
            $attachment_id = get_post_thumbnail_id($post->ID);
            $branch_image = vt_resize( $attachment_id,'' , 400, 264, true );
            $branch_address = get_field('branch_address');
    ?>

        <article class="viewing">
            <h3>Book a viewing</h3>
            <p>Call <strong><?php the_field('branch_phone'); ?></strong> or book online</p>
            <a href="#" class="apf__book__viewing__button" title="Book a viewing">Book a viewing</a>
        </article>

        <article class="branch">
            <h3>Branch</h3>

            <div class="branch__img">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <img src="<?php echo $branch_image['url']; ?>" alt="<?php the_title(); ?>">
                </a>
            </div><!-- branch__img -->

            <div class="branch__details">
                <div class="branch__dept">
                    <h4><?php the_title(); ?></h4>
                    <p class="address"><i class="fal fa-map-marker"></i><?php echo $branch_address['address']; ?></p>

                    <?php if(get_field('branch_phone')): ?><p><i class="fal fa-phone"></i><?php the_field('branch_phone'); ?></p><?php endif; ?>
                    <?php if(get_field('branch_email')): ?><p><i class="fal fa-envelope"></i><?php echo hide_email(get_field('branch_email')); ?></p><?php endif; ?>
                </div><!-- branch-dept -->

                <div class="branch__hours">
                    <h4>Opening hours</h4>

                    <ul class="hours-table">        
                        <?php
                            foreach($opening_times->opening_times($post->ID) as $opening_time):
                                $today = date("l");
                                $is_today = $opening_time->weekday['is_today'];
                        ?>
                            <li class="<?php echo $is_today.$opening_time->status['class']; ?>"><?php echo $opening_time->display; ?></li>
                        <?php endforeach; ?>
                    </ul><!-- hours-table -->
                </div><!-- branch__hours -->
            </div><!-- branch__details -->
        </article>
    <?php endwhile; wp_reset_postdata(); ?>

    <article class="share">
        <h3>Share</h3>
        <p>Have a friend who might be interested?</p>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-532c1f08328bf447"></script>

        <div class="addthis_toolbox addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
            <a class="addthis_button_facebook"></a>
            <a class="addthis_button_twitter"></a>
            <a class="addthis_button_pinterest_share"></a>
            <a class="addthis_button_google_plusone_share"></a>
            <a class="addthis_button_linkedin"></a>
            <a class="addthis_button_email"></a>
        </div><!-- apf__single__property__share -->
    </article>

    <article class="documents">
        <h3>Useful links</h3>
        <ul>
            <?php if(has_term('to-let', 'property_type', $property_id)): ?>
                <li><a href="<?php echo esc_url(home_url()); ?>/tenant-fees/" target="_blank"><i class="fal fa-tag"></i>Tenant Fees</a></li>
            <?php endif; ?>

            <?php if(get_field('property_epc')): ?>
                <li><a href="#epc" title="View EPC" class="scroll"><i class="fi flaticon-plug"></i>View EPC</a></li>
            <?php endif; ?>

            <?php
                if(get_field('property_brochure')):
                    $brochure_num = 1;
                    while(have_rows('property_brochure')) : the_row(); ?>
                        <li><a href="<?php the_sub_field('property_brochure_file'); ?>" target="_blank" class="apf__article__button"><i class="fi flaticon-big-brochure"></i>View brochure <?php echo $brochure_num; ?></a>

                     <?php if($brochure_num == 1) { break; } ?>
                    <?php $brochure_num++; endwhile; ?>
            <?php endif; ?>

            <li><a href="<?php echo apf_back_to_search_url(); ?>" title="Back to search"><i class="fal fa-search"></i>Back to search</a></li>
        </ul>
    </article>

</div><!-- apf__single__property__sidebar -->
