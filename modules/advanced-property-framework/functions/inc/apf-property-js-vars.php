<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * APF Property JS Vars
 *
 * Outputs javascript variables used in
 * property search and arrange viewing forms
 *
 * @author  Various
 * @package Advanced Property Framework
 *

*/
function apf_property_js_vars() {

	global $property_query, $post;

	$apf_js_vars = '';
	$apf_js_vars .= "var the_hard_men_path = '".esc_url(get_stylesheet_directory_uri())."';\n";

	// Search vars
	if(isset($_SESSION)) {

        $apf_js_vars .= "var apf_dept = '".$_SESSION["dept"]."';\n";
		$apf_js_vars .= "var apf_type = '".$_SESSION["type"]."';\n";
		$apf_js_vars .= "var apf_area_search = '".$_SESSION["area_search"]."';\n";
		$apf_js_vars .= "var apf_minprice = '".$_SESSION["minprice"]."';\n";
		$apf_js_vars .= "var apf_maxprice = '".$_SESSION["maxprice"]."';\n";
		$apf_js_vars .= "var apf_minbeds = '".$_SESSION["minbeds"]."';\n";
		$apf_js_vars .= "var apf_maxbeds = '".$_SESSION["maxbeds"]."';\n";
		$apf_js_vars .= "var apf_view = '".$_SESSION["view"]."';\n";
		$apf_js_vars .= "var apf_order = '".$_SESSION["order"]."';\n";
        $apf_js_vars .= "var apf_status = '".$_SESSION["apf_status"]."';\n";
        $apf_js_vars .= "var apf_branch = '".$_SESSION["apf_branch"]."';\n";
		$apf_js_vars .= "var apf_page = '".$_SESSION["apf_page"]."';\n";

	} else {

        $apf_js_vars .= "var apf_dept = 'residential';\n";
		$apf_js_vars .= "var apf_type = 'sales';\n";
	    $apf_js_vars .= "var apf_area_search = '';\n";
	    $apf_js_vars .= "var apf_minprice = '0';\n";
	    $apf_js_vars .= "var apf_maxprice = '10000000';\n";
	    $apf_js_vars .= "var apf_minbeds = '0';\n";
	    $apf_js_vars .= "var apf_maxbeds = '100';\n";
	    $apf_js_vars .= "var apf_view = 'grid';\n";
		$apf_js_vars .= "var apf_order = 'desc';\n";
        $apf_js_vars .= "var apf_status = '';\n";
        $apf_js_vars .= "var apf_branch = '';\n";
		$apf_js_vars .= "var apf_page = '1';\n";

	}

	// Single property vars
	if(is_singular('property')) {

		$apf_js_vars .= "var apf_property_id = '".get_the_id($post->ID)."';\n";
		$apf_js_vars .= "var apf_property_title = '".get_the_title($post->ID)." - ".apf_the_property_price(true, true, false, false)."';\n";
		$apf_js_vars .= "var apf_property_url = '".get_permalink($post->ID)."';\n";

	}

	echo $apf_js_vars;
}
