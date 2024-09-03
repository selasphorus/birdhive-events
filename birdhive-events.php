<?php
/**
 * @package brdhv_events
 */

/*
Plugin Name: Birdhive Events Manager
Plugin URI: 
Description: 
Version: 0.1
Author: atc
Author URI: 
License: 
Text Domain: brdhv
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

$plugin_path = plugin_dir_path( __FILE__ );

/* +~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+ */

function brdhv_register_post_type_event() {

	$labels = array(
		'name' => __( 'Brdhv Events', 'brdhv' ),
		'singular_name' => __( 'Event', 'brdhv' ),
		'add_new' => __( 'New Event', 'brdhv' ),
		'add_new_item' => __( 'Add New Event', 'brdhv' ),
		'edit_item' => __( 'Edit Event', 'brdhv' ),
		'new_item' => __( 'New Event', 'brdhv' ),
		'view_item' => __( 'View Event', 'brdhv' ),
		'search_items' => __( 'Search Events', 'brdhv' ),
		'not_found' =>  __( 'No Events Found', 'brdhv' ),
		'not_found_in_trash' => __( 'No Events found in Trash', 'brdhv' ),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'events' ),
		'capability_type' => $caps,
		'map_meta_cap'       => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		//'menu_icon'          => 'dashicons-yes-alt',
		'menu_position'      => null,
		'supports'           => array( 'title', 'author', 'thumbnail', 'editor', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ), //
		'taxonomies' => array( 'admin_tag', 'event_category' ), 
		'show_in_rest' => false,    
	);

	register_post_type( 'event', $args );

}
add_action( 'init', 'brdhv_register_post_type_event' );

?>