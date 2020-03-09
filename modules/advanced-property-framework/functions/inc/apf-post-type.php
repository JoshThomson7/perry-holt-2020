<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*================================================================================================================*/
/*                                                                                                                */
/*                                                1. POST TYPES                                                   */
/*                                                                                                                */
/*================================================================================================================*/
/*--------------------------------------------------------------------------*/
/*                                 PROPERTY                                 */
/*--------------------------------------------------------------------------*/
add_action( 'init', 'create_property_posttype', 4 );
function create_property_posttype()
{
    $labels = array(
        'name' => __( 'Properties' ),
        'singular_name' => __( 'Property' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Create Property' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Property' ),
        'new_item' => __( 'New Property' ),
        'view' => __( 'View Property' ),
        'view_item' => __( 'View Property' ),
        'search_items' => __( 'Search Properties' ),
        'not_found' => __( 'No properties found' ),
        'not_found_in_trash' => __( 'No properties found in trash' ),
        'parent' => __( 'Parent Property' ),
      );

    $args = array(
        'labels' => $labels,
        'description' => __( 'This is where you can see the properties that come form the feed. DO NOT CHANGE THEM HERE!' ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-admin-home',
        'hierarchical' => true,
        '_builtin' => false, // It's a custom post type, not built in!
        'rewrite' => array( 'slug' => 'property/%property_type%/%property_area%', 'with_front' => true ),
        'query_var' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('property_type', 'property_area'),
      );

    register_post_type('property', $args);
}



/*================================================================================================================*/
/*                                                                                                                */
/*                                                2. TAXONOMIES                                                   */
/*                                                                                                                */
/*================================================================================================================*/
// property_dept
add_action( 'init', 'create_property_dept_taxonomies', 0 );

function create_property_dept_taxonomies() {
  // Add new taxonomy, make it hierarchical => true for categories-like taxonomies)
  $labels = array(
    'name' => _x( 'Departments', 'taxonomy general name' ),
    'singular_name' => _x( 'Department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Departments' ),
    'all_items' => __( 'All Departments' ),
    'parent_item' => __( 'Parent Departments' ),
    'parent_item_colon' => __( 'Parent Departments:' ),
    'edit_item' => __( 'Edit Department' ),
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Department' ),
    'menu_name' => __( 'Department' ),
  );

  register_taxonomy('property_dept',array('property'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'public' => false,
    'rewrite' => false,
  ));
}

// property_type
add_action( 'init', 'create_property_type_taxonomies', 0 );

function create_property_type_taxonomies() {
  // Add new taxonomy, make it hierarchical => true for categories-like taxonomies)
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Types' ),
    'parent_item_colon' => __( 'Parent Types:' ),
    'edit_item' => __( 'Edit Type' ),
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type' ),
    'menu_name' => __( 'Types' ),
  );

  register_taxonomy('property_type',array('property'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'public' => false,
    'rewrite' => array( 'slug' => 'property', 'with_front' => true ),
  ));
}


/*--------------------------------------------------------------------------*/
/*                             property_area                                */
/*--------------------------------------------------------------------------*/
/* ================ Create taxonomy "property_area" ================ */

// Hook into the init action and call create_property_area_taxonomies when it fires
add_action( 'init', 'create_property_area_taxonomies', 0 );

function create_property_area_taxonomies()
{
  // Add new taxonomy, make it hierarchical => true for categories-like taxonomies)
  $labels = array(
    'name' => _x( 'Areas', 'taxonomy general name' ),
    'singular_name' => _x( 'Areas', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Areas' ),
    'all_items' => __( 'All Areas' ),
    'parent_item' => __( 'Parent Areas' ),
    'parent_item_colon' => __( 'Parent Areas:' ),
    'edit_item' => __( 'Edit Area' ),
    'update_item' => __( 'Update Area' ),
    'add_new_item' => __( 'Add New Area' ),
    'new_item_name' => __( 'New Area' ),
    'menu_name' => __( 'Areas' ),
  );

  register_taxonomy('property_area',array('property'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'public' => false,
    'rewrite' => array( 'slug' => 'property/%property_type%', 'with_front' => true ),
  ));
}



/*================================================================================================================*/
/*                                                                                                                */
/*                                                3. URL REWRITING                                                */
/*                                                                                                                */
/*================================================================================================================*/
// Rewrite rule to display hierarchical URLs
// IMPORTANT: Every time you make a change to any rewrite rule in the code below, or above,
// remember to visit the Permalinks page in Wordpress to flush the rules. No need to click
// on Update, simply visit it.

// Properties
function filter_property_link($link, $post) {
    if ($post->post_type != 'property')
        return $link;

    if ($cats = get_the_terms($post->ID, 'property_type'))
        $link = str_replace('%property_type%', array_pop($cats)->slug, $link);

    if ($cats = get_the_terms($post->ID, 'property_area'))
       $link = str_replace('%property_area%', array_pop($cats)->slug, $link);

    return $link;
}

add_filter('post_type_link', 'filter_property_link', 10, 2);
