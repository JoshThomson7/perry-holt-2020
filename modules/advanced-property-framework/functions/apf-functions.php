<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once('inc/apf-sessions.php');
require_once('inc/apf-post-type.php');
require_once('inc/apf-cpt-columns.php');
require_once('inc/apf-pages.php');
require_once('inc/apf-templates.php');
require_once('inc/apf-property-js-vars.php');
require_once('inc/apf-enqueue.php');
require_once('inc/apf-endpoints.php');
require_once('inc/apf-acf-functions.php');
require_once('inc/apf-ajax.php');
require_once('providers/apf-jupix.php');

// apps
require_once(apf_path().'/apps/apf-branches/functions/apf-branches-functions.php');
require_once(apf_path().'/apps/apf-update/functions/apf-update-ajax.php');

/*--------------------------------------------------------------------------*/
/*    function apf_path()
/*    returns the full APF path
/*--------------------------------------------------------------------------*/
function apf_path($apf_url = false) {

    if($apf_url) {
        $apf_path = get_stylesheet_directory_uri()  . '/modules/advanced-property-framework/';
    } else {
        $apf_path = get_stylesheet_directory()  . '/modules/advanced-property-framework/';
    }

    return $apf_path;
}

/*--------------------------------------------------------------------------*/
/*    function apf_search_form()
/*    outputs property search form
/*--------------------------------------------------------------------------*/
function apf_search_form($is_banner = null) {

    if($is_banner === true) { 
        echo '<div class="avb__apf__search">';
        echo '<div class="max__width">';
    }

    require_once(apf_path().'templates/apf-search-form.php');

    if($is_banner === true) { 
        echo '</div>';
        echo '</div>';
    }

}

/*--------------------------------------------------------------------------*/
/*    function is_apf()
/*    checks if the current page belongs to APF
/*--------------------------------------------------------------------------*/
function is_apf() {

    global $post;

    $property_search_obj = get_page_by_path('property-search', OBJECT, 'page');
    $property_search_id = $property_search_obj->ID;

    if($property_search_id == $post->ID || is_singular('property')) {
        return true;
    } else {
        return false;
    }
}

/*--------------------------------------------------------------------------*/
/*    function apf_is_property_search()
/*    checks if we're in the property search page
/*--------------------------------------------------------------------------*/
function apf_is_property_search() {

    global $post;

    $property_search_obj = get_page_by_path('property-search', OBJECT, 'page');
    $property_search_id = $property_search_obj->ID;

    if($property_search_id == $post->ID) {
        return true;
    } else {
        return false;
    }
}

/*--------------------------------------------------------------------------*/
/*    Add .apf class to body_class
/*--------------------------------------------------------------------------*/
add_filter( 'body_class','apf_body_class' );
function apf_body_class( $classes ) {

    if(is_apf()) {
        $classes[] = 'apf__body';
    }

    if(apf_is_property_search()) {
        $classes[] = 'apf__property__search';
    }

    if(is_singular('property')) {
        $classes[] = 'apf__single';
    }

    return $classes;

}

/*--------------------------------------------------------------------------*/
/*    function apf_map_alter_query()
/*    Alters the query on the map XML template to display
/*    the right number of properties on Google map
/*--------------------------------------------------------------------------*/
/*function apf_map_alter_query( $query ){
    global $apf_is_map; //Declared in templates/apf-xml.php

    if( $apf_is_map == true ) {
        $query->set('posts_per_page', $_SESSION['apf_show']);
    }

    return $query;
}
add_action( 'pre_get_posts', 'apf_map_alter_query' );*/


/*--------------------------------------------------------------------------*/
/*    function apf_featured_image_description()
/*    Adds a description to the featured image field
/*--------------------------------------------------------------------------*/
//add_filter( 'admin_post_thumbnail_html', 'apf_featured_image_description');
function apf_featured_image_description( $content ) {
    global $typenow;

    if ( (is_edit_page('edit') || is_edit_page('new') ) && "property" == $typenow){
        $content .= '<p><i>Upload the main property image here. This will appear on the listing.</i></p>';
    }

    return $content;
}


/*--------------------------------------------------------------------------*/
/*    function apf_back_to_search_url()
/*    returns the back to search URL based
/*    on $_SESSION variables
/*--------------------------------------------------------------------------*/
function apf_back_to_search_url() {

    $back_to_search = get_permalink(get_page_by_path('property-search'));

    //pagination
    if($_SESSION["apf_page"] > 1) {
        $back_to_search .= 'page/'.$_SESSION["apf_page"].'/';
    }

    $back_to_search .= '?type='.$_SESSION["type"];
    $back_to_search .= '&amp;area_search='.$_SESSION["area_search"];
    $back_to_search .= '&amp;minprice='.$_SESSION["minprice"];
    $back_to_search .= '&amp;maxprice='.$_SESSION["maxprice"];
    $back_to_search .= '&amp;minbeds='.$_SESSION["minbeds"];
    $back_to_search .= '&amp;maxbeds='.$_SESSION["maxbeds"];
    $back_to_search .= '&amp;status='.$_SESSION["apf_status"];
    $back_to_search .= '&amp;view='.$_SESSION["view"];
    $back_to_search .= '&amp;order='.$_SESSION["order"];
    $back_to_search .= '&amp;apf_page='.$_SESSION["apf_page"];
    $back_to_search .= '&amp;apf_search=go';

    return $back_to_search;
}


/*--------------------------------------------------------------------------*/
/*    function apf_pagination()
/*    returns the back to search URL based
/*    on $_SESSION variables
/*--------------------------------------------------------------------------*/
function apf_pagination($pages = '', $range = 4) {
    $showitems = ($range * 2)+1;

    global $paged;
    $paged = $_SESSION['apf_page'];

    if(empty($paged)) $paged = 1;

    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if(!$pages) {
            $pages = 1;
        }
    }

    if(1 != $pages) {

        echo "<div class=\"apf__pagination\"><div class=\"apf__page__count\">Page ".$paged." of ".$pages."</div><div class=\"apf__page__numbers\">";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class=\"apf__ajax__trigger apf__pagination\">&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class=\"apf__ajax__trigger apf__paginate\">&lsaquo;</a>";

        for ($i=1; $i <= $pages; $i++) {

            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                echo ($paged == $i)? "<span class=\"apf__current__page\">".$i."</span>":"<a href=\"#\" class=\"inactive apf__ajax__trigger apf__paginate\" data-apf-paged=\"".$i."\">".$i."</a>";
            }

        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\" class=\"apf__ajax__trigger apf__paginate\">&rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' class=\"apf__ajax__trigger apf__paginate\">&raquo;</a>";
        echo "</div></div>\n";
    }
}

?>
