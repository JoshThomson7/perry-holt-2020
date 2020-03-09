<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * APF AJAX
 *
 * Used for Ajaxifying property results. Yeah!
 *
 * @author  Various
 * @package Advanced Property Framework
 *
*/
function apf_ajax() {

	/*
	/* Security check
	*/
	wp_verify_nonce('$C.cGLu/1zxq%.KH}PjIKK|2_7WDN`x[vdhtF5GS4|+6%$wvG)2xZgJcWv3H2K_M', 'apf_security');

	$_SESSION['type'] = htmlspecialchars(trim($_POST['apf_type_data']));
	$_SESSION['area_search'] = str_replace(',', '', $_POST['apf_area_search_data']); // get rid of commas
	$_SESSION['minprice'] = $_POST['apf_minprice_data'];
	$_SESSION['maxprice'] = $_POST['apf_maxprice_data'];
	$_SESSION['minbeds'] = $_POST['apf_minbeds_data'];
	$_SESSION['maxbeds'] = $_POST['apf_maxbeds_data'];
	$_SESSION['view'] = $_POST['apf_view_data'];
	$_SESSION['order'] = $_POST['apf_order_data'];
    $_SESSION['apf_status'] = $_POST['apf_status_data'];
    $_SESSION['apf_branch'] = $_POST['apf_branch'];
	$_SESSION['apf_page'] = $_POST['apf_page_data'];
    $_SESSION['apf_show'] = $_POST['apf_show_data'];

	// IMPORTANT: Must use get_template_directory() to get the full absolute path
	// of an include that's in a different folder than this file.
	// It's probably best practice anyway for any include/require

	require_once(apf_path().'templates/apf-query.php');
	require_once(apf_path().'templates/apf-loop.php');

	// DEBUG
	/*if(is_user_logged_in()) {
		print_r($_SESSION);
	}*/

	die();
}

add_action('wp_ajax_nopriv_apf_ajax', 'apf_ajax');
add_action('wp_ajax_apf_ajax', 'apf_ajax');

/*
*	Get total number of pages
*	Important: Must go after the query or it won't work
*/
function apf_total_pages($pages = '') {
    global $property_query;

    if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;

         if(!$pages) {
             $pages = 1;
         }
    }

    return $pages;
}
