<div class="banner__boxes">

    <div class="banner__boxes__wrapper">
        <?php
            $banner_count = 0;
            while(have_rows('home_banner_boxes')) : the_row();

            $banner_class = '';
            $banner_form = false;

            if($banner_count == 1) {
                $banner_class = ' main';
                $banner_form = true;
            }
        ?>
            <div class="banner__box <?php echo $banner_class; ?>">
                <div class="banner__box__content">
                    <?php/* <div class="banner__box__icon"><i class="<?php the_sub_field('home_banner_box_icon'); ?>"></i></div>*/?>

                    <h3><?php the_sub_field('home_banner_box_heading'); ?></h2>
                    <h4><?php the_sub_field('home_banner_box_caption'); ?></h4>

                    <?php /*if($banner_form == true): ?>
                        <form action="<?php echo esc_url(home_url()); ?>/free-valuation-request/" method="get">
                            <input type="text" name="pc" value="" placeholder="Enter postcode">
                            <input type="submit" value="Continue">
                        </form>
                    <?php else: */ ?>
                        <a href="<?php the_sub_field('home_banner_box_button_url'); ?>"<?php if($banner_form == true): ?> onClick="ga('send', 'event', 'Home Banner Valuation', 'click', 'Instant valuation');" style="background:#fff;color:#022e4f;"<?php endif; ?>><?php the_sub_field('home_banner_box_button_label'); ?></a>
                    <?php //endif; ?>
                </div><!-- banner__box__content -->
            </div><!-- banner__box -->
        <?php $banner_count++; endwhile; ?>

    </div><!-- banner__boxes__wrapper -->

    <?php apf_search_form(); ?>

</div><!-- banner__boxes -->
