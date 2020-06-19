<?php
/**
 * APF Filter Form
 *
 * @author  FL1 Digital
 * @package Advanced Property Framework
 *
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$apf_settings = new APF_Settings();
?>

<div class="apf__results__filter">

    <div class="apf__results__filter__view">

        <input type="radio" id="apf_view_grid" name="apf_view" value="grid" checked />
        <label for="apf_view_grid" class="apf-view-on-change" data-view="grid"><i class="fal fa-th"></i></label>

        <input type="radio" id="apf_view_list" name="apf_view" value="list"/>
        <label for="apf_view_list" class="apf-view-on-change" data-view="list"><i class="fal fa-list"></i></label>

        <input type="checkbox" id="apf_view_map" name="apf_map" value="map" checked />
        <label for="apf_view_map" class="apf-view-on-change" data-view="map"><i class="fal fa-map"></i></label>

        <a href="#" class="apf__filter__refine" title="Refine search"><span class="fal fa-search"></span></a>

    </div><!-- apf__results__filter__view -->

    <div class="apf__results__filter__sort">

        <?php if($apf_settings->search_hide_gone()): ?>
            <input type="checkbox" id="apf_status" name="apf_status" class="apf__filter__status" value="exclude"<?php if($apf_status == 'exclude') { echo " checked";} ?>>
            <label for="apf_status" class="apf__ajax__trigger apf__status">Hide Sold, Sold STC &amp; Under offer</label>
        <?php endif; ?>

        <?php
            $branches_query = new WP_Query(array(
                'post_type' => 'branch',
                'post_status' => 'publish',
                'posts_per_page' => -1
            ));

            if($branches_query->have_posts()):
        ?>
            <select name="apf_branch">
                <option value="">Any branch</option>
                <?php while($branches_query->have_posts()) : $branches_query->the_post(); ?>
                    <option value="<?php the_field('branch_id'); ?>"><?php the_title(); ?></option>
                <?php endwhile; ?>
            </select>
        <?php endif; ?>

        <?php if($apf_settings->search_sorting_filters()): ?>
            <select name="apf_order">
                <?php foreach($apf_settings->search_sorting_filters() as $filter): ?>
                    <option value="<?php echo $filter['value']; ?>"<?php if($_SESSION["order"] == $filter['value']): ?> selected="selected"<?php endif; ?>><?php echo $filter['label'];  ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>

    </div><!-- apf__results__filter__sort -->

</div><!-- apf__results__filter -->
