<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * ATeam Post Type
 *
 * @package modules/woocommerce
 * @version 1.0
*/

add_action( 'init', 'ateam_create_team_post_type', 4 );
function ateam_create_team_post_type() {
  	$labels = array(
		'name' => __( 'Team' ),
		'singular_name' => __( 'Team' ),
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Create Team Member' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Team Member' ),
		'new_item' => __( 'New Team Member' ),
		'view' => __( 'View Team Member' ),
		'view_item' => __( 'View Team Member' ),
		'search_items' => __( 'Search Team Members' ),
		'not_found' => __( 'No team members found' ),
		'not_found_in_trash' => __( 'No team members found in trash' ),
		'parent' => __( 'Parent Team Member' ),
	  );

	$args = array(
		'labels' => $labels,
		'description' => __( 'This is where you can create team members.' ),
		'public' => false,
		'show_ui' => true,
		'capability_type' => 'post',
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'menu_icon' => 'dashicons-groups',
		'menu_position' => 30,
		'hierarchical' => true,
		'_builtin' => false, // It's a custom post type, not built in!
		'rewrite' => array( 'slug' => 'team', 'with_front' => true ),
		'query_var' => true,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	  );

	register_post_type('team', $args);
}
