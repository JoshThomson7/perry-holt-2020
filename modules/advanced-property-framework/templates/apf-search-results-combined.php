<?php
// Uncomment to debug sessions
//print_r($_SESSION);

get_header();

// Globals
global $post, $wp_query;

require_once(get_stylesheet_directory().'/modules/advanced-video-banners/templates/avb-inner.php');

require_once('apf-query.php');
?>

    <section class="apf apf__combined">

        <?php apf_search_form(); ?>

        <div class="apf__results">

            <div class="apf__results__list">

                <?php require_once('apf-filter-form.php'); ?>

                <div class="apf__properties">
                    <div class="apf__properties__loading__overlay">
                        <svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" stroke="#1c1c31"> <g fill="none" fill-rule="evenodd" stroke-width="2"> <circle cx="22" cy="22" r="1"> <animate attributeName="r" begin="0s" dur="1.8s" values="1; 20" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite" /> <animate attributeName="stroke-opacity" begin="0s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite" /> </circle> <circle cx="22" cy="22" r="1"> <animate attributeName="r" begin="-0.9s" dur="1.8s" values="1; 20" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite" /> <animate attributeName="stroke-opacity" begin="-0.9s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite" /> </circle> </g> </svg><p>Updating</p>
                    </div><!-- apf__properties__loading__overlay -->

                    <?php require_once('apf-loop.php'); ?>
                </div><!-- apf__properties -->

            </div><!-- apf__results__list -->

            <?php require_once('apf-map.php'); ?>

            <script>var apf_total_pages = <?php echo apf_total_pages($property_query->max_num_pages); ?>;</script>

        </div><!-- apf__results -->

    </section><!-- apf apf__combined -->
<?php get_footer(); ?>
