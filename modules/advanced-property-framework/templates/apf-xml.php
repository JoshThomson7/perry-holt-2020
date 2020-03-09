<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $apf_is_map;

$apf_is_map = true;

//print_r($_SESSION);

require_once(get_template_directory().'/modules/advanced-property-framework/templates/apf-query.php');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<markers>';
?>
    <?php
        while($property_query->have_posts()) : $property_query->the_post();

            // Name
            $name = htmlentities(utf8_decode(get_the_title()));

            // Permalink
            $permalink = get_permalink();

            // Address
            if(get_field('property_address')) {
                $get_address = get_field('property_address');
                $lat = $get_address['lat'];
                $lng = $get_address['lng'];
            }

            // shitty fix if properties have no lat/lng
            if(empty($lat) || empty($lat)) { continue; }

            // Price
            if(!empty(apf_the_property_price(mull, mull, false, false))) {
                $property_price = apf_the_property_price(null, true, false, false);
            }

            // Feat image
            $property_image = htmlentities(utf8_decode(apf_the_property_image(null, null, false, false)));
    ?>
        <marker lat="<?php echo $lat; ?>" lng="<?php echo $lng; ?>" permalink="<?php the_permalink(); ?>" name="<?php echo $name; ?>" price="<?php echo $property_price; ?>" type="<?php echo get_post_type(); ?>" status="<?php apf_the_property_status(true, false); ?>" seo="<?php apf_the_property_seo_title(); ?>" image="<?php echo $property_image; ?>" />
    <?php endwhile; wp_reset_query(); ?>
</markers>
