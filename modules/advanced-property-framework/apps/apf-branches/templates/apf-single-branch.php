<?php
/*
    Branches template
*/

global $post;

get_header();

avb_banners('inner');

// Address
$address = get_field('branch_address');

$opening_times = new APF_Opening_Times;
$times = $opening_times->todays_times($post->ID);
?>

<section class="find-a-branch">
    <div class="max__width">
        <div class="branches">

            <div class="branch single__branch">
                <?php if(get_field('branch_image')): ?>
                    <div class="branch-thumb">
                        <?php
                            $attachment_id = get_field('branch_image');
                            $branch_image = vt_resize( $attachment_id,'' , 690, 560, true ); // Set to false if you don't want to crop the image
                        ?>
                        <img src="<?php echo $branch_image['url'] ?>" alt="<?php the_title(); ?>" />
                    </div><!-- branch-thumb -->
                <?php endif; ?>

                <div class="branch-details">
                    <div class="branch-address">
                        <h3>Address</h3>
                        <p class="address">
                            <i class="fal fa-map-marker"></i>
                            <?php echo ( !$address ? 'No address set' : str_replace(',', '<br />', $address['address']) ); ?>
                        </p>

                        <?php if(get_field('branch_phone')): ?>
                            <h3>Phone</h3>
                            <p>
                                <i class="fal fa-phone"></i>
                                <?php the_field('branch_phone'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if(get_field('branch_email')): ?>
                            <h3>Email</h3>
                            <p>
                                <i class="fal fa-envelope"></i>
                                <?php echo hide_email(get_field('branch_email')); ?>
                            </p>
                        <?php endif; ?>
                    </div><!-- branch-addres -->

                    <?php
                        if($opening_times->has_times()):
                        
                        $todays_times = $opening_times->todays_times($post->ID);
                    ?>
                        <div class="branch-hours">
                            <h3>Opening hours <small class="<?php echo $todays_times->status['class']; ?>"><?php echo $todays_times->status['text']; ?></small></h3>
                            <ul class="hours-table">
                                
                                <?php
                                    foreach($opening_times->opening_times($post->ID) as $opening_time):
                                        $today = date("l");
                                        $is_today = $opening_time->weekday['is_today'];
                                ?>
                                    <li class="<?php echo $is_today.$opening_time->status['class']; ?>"><?php echo $opening_time->display; ?></li>
                                <?php endforeach; ?>
                            </ul><!-- hours-table -->
                        </div><!-- branch-hours -->
                    <?php endif; ?>

                </div><!-- branch-details -->

            </div><!-- branch -->
        </div><!-- branches -->
    </div><!-- max__width -->

    <?php flexible_content(); ?>
</section><!-- find-a-branch -->

<?php get_footer(); ?>
