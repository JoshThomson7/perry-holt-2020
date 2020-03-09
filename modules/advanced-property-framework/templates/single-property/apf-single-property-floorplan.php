<?php
/**
 * APF Single Property - Floorplan
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$apf_gallery = get_field('property_floorplans');
?>
<article>
    <h2>Floorplan</h2>

    <?php if(get_field('property_floorplans')): ?>
        <ul class="property__gallery__all">
            <?php
                $apf_floorplans = get_field('property_floorplans');
                foreach($apf_floorplans as $apf_floorplan):

                $property_floorplan_url = wp_get_attachment_image_src($apf_floorplan['ID'], 'full');
                $property_floorplan_url = $property_floorplan_url[0];
            ?>
                <li data-src="<?php echo $property_floorplan_url; ?>">
                    <a href="#"><img src="<?php echo $property_floorplan_url; ?>" /></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</article>