<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * APF Sessions
 *
 * Initialise sessions and declare session variables
 *
 * @author  Various
 * @package Advanced Property Framework
 *

*/
add_action('init', 'apf_session_start', 1);
add_action('wp_logout', 'apf_session_destroy');
add_action('wp_login', 'apf_session_destroy');

function apf_session_start() {
	session_start();
}

function apf_session_destroy() {
    session_destroy();
}

function apf_sessions() {

	if(is_singular(array('property'))) {

		// Do no'ing!

	} else {

	    if(isset($_GET['apf_search']) && $_GET['apf_search'] == 'go') {

            $_SESSION['dept'] = $_GET['dept'];
	        $_SESSION['type'] = $_GET['type'];
	        $_SESSION['area_search'] = $_GET['area_search'];
	        $_SESSION['minprice'] = $_GET['minprice'];
	        $_SESSION['maxprice'] = $_GET['maxprice'];
	        $_SESSION['minbeds'] = $_GET['minbeds'];
	        $_SESSION['maxbeds'] =  $_GET['maxbeds'];
	        $_SESSION['order'] = $_GET['order'];
            $_SESSION['view'] = $_GET['view'];
            $_SESSION['apf_branch'] = $_GET['apf_branch'];
	        $_SESSION['apf_status'] = $_GET['apf_status'];
	        $_SESSION['apf_page'] = $_GET['apf_page'];

	    } else {

            $_SESSION['dept'] = 'residential';
	        $_SESSION['type'] = 'sales';
	        $_SESSION['area_search'] = '';
	        $_SESSION['minprice'] = 0;
	        $_SESSION['maxprice'] = 10000000;
	        $_SESSION['minbeds'] = 0;
	        $_SESSION['maxbeds'] =  100;
	        $_SESSION['order'] = 'desc';
            $_SESSION['view'] = 'grid';
            $_SESSION['apf_branch'] = $_GET['apf_branch'];
	        $_SESSION['apf_status'] = '';
	        $_SESSION['apf_page'] = 1;
	    }

	}

}
