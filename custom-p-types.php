<?php
// events type taxonomy
register_taxonomy("event_type", 
	array("event"), 
	array("hierarchical" => true, 
		"label" => "Event Topics", 
		"singular_label" => "Event Topic",  
		'rewrite' => array( 'slug' => 'topic' )
	)
);
//events posttype 
add_action( 'init', 'create_event' );
function create_event() {
  $labels = array(
    'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'Event'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'view_item' => __('View Event'),
    'search_items' => __('Search Event'),
    'not_found' =>  __('No Events found'),
    'not_found_in_trash' => __('No Events found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title', 'editor', 'revisions', 'page-attributes', 'thumbnail'); // 'page-attributes' must be set for Simple Page Ordering plugin

  register_post_type( 'event',
    array(
      'labels' => $labels,
      'public' => true,
      'hierarchical' => true,
	    'has_archive' => true, //THIS IS CRUCIAL for use with Simple Page Ordering plugin
      'menu_icon' => 'dashicons-calendar', // dashicons will be used in WP 3.8+
      'supports' => $supports
	  
    )
  );
  flush_rewrite_rules();
}
// Show menudate meta field column on Menus admin screen
add_filter( 'manage_edit-event_columns', 'hhs_event_edit_columns' );
add_action( 'manage_event_posts_custom_column',  'hhs_event_custom_columns' );

function hhs_event_edit_columns( $columns ) {
	// relabel title column
	$columns['title'] = 'Event Title';
	
	// remove published date column
	unset( $columns['date'] );
	
	// append new columns
	$columns['event-date'] = 'Event Date';
	
	return $columns;
}

function hhs_event_custom_columns( $column ) {
	global $post;
	$event_date = get_post_meta( $post->ID, 'event_date', true ); //this equals the prefix defeined in WPAlchemy_MetaBox class in events-spec.php + the key defined in the field in events-meta.php

	switch ( $column ) {
		case 'event-date' :
			// escape as appropriate
			// the date shouldn't contain HTML
			echo esc_html( $event_date );
			break;
	}
}



// Menus sortable by startdate meta field on admin screen
add_filter( 'manage_edit-event_sortable_columns', 'hhs_event_sortable_columns' );
add_action( 'load-edit.php', 'hhs_event_edit_load' );

function hhs_event_sortable_columns( $columns ) {
	$columns['event-date'] = 'event-date';
	return $columns;
}

function hhs_event_edit_load() {
	add_filter( 'request', 'hhs_event_sort' );
}

function hhs_event_sort( $vars ) {
	// Check post type and for the orderby request
	if ( isset( $vars['post_type'] ) && 'event' == $vars['post_type'] &&
	     isset( $vars['orderby'] ) && 'event-date' == $vars['orderby'] ) {

		// Merge in with the rest of the query vars
		$vars = array_merge(
			$vars,
			array(
				'meta_key' => 'event_date', //this equals the prefix defeined in WPAlchemy_MetaBox class in menu-spec.php + the key defined in the field in menus-meta.php
				'orderby' => 'meta_value'
			)
		);
	}

	return $vars;
}


//*********************
//Family Posttype 
//*********************

//family posttype 
add_action( 'init', 'create_family' );
function create_family() {
  $labels = array(
    'name' => _x('Family', 'post type general name'),
    'singular_name' => _x('Family Member', 'post type singular name'),
    'add_new' => _x('Add New', 'Family Member'),
    'add_new_item' => __('Add New Family Member'),
    'edit_item' => __('Edit Family Member'),
    'new_item' => __('New Family Member'),
    'view_item' => __('View Family Member'),
    'search_items' => __('Search Family Members'),
    'not_found' =>  __('No Family Members found'),
    'not_found_in_trash' => __('No Family Members found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title', 'editor', 'revisions', 'page-attributes', 'thumbnail'); // 'page-attributes' must be set for Simple Page Ordering plugin

  register_post_type( 'family',
    array(
      'labels' => $labels,
      'public' => true,
      'hierarchical' => true,
	  'has_archive' => true, //THIS IS CRUCIAL for use with Simple Page Ordering plugin
      'menu_icon' => 'dashicons-groups', // dashicons will be used in WP 3.8+
      'supports' => $supports
	  
    )
  );
  flush_rewrite_rules();
}