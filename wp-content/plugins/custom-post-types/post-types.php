<?php


// Register Custom Post Type
function vbtk_custom_plugin_register_post_types() {

	// EVENT CUSTOM POST TYPE
	register_post_type( 'xxxxxx', array(
		'label'                 => __( 'XXXXX', 'text_domain' ),
		'description'           => __( 'XXXXX Description', 'text_domain' ),
		'labels'                => array(
			'name'                  => _x( 'XXXXXs', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'XXXXX', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'XXXXXs', 'text_domain' ),
			'name_admin_bar'        => __( 'XXXXX', 'text_domain' ),
			'archives'              => __( 'XXXXX Archives', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent XXXXX:', 'text_domain' ),
			'all_items'             => __( 'All Events', 'text_domain' ),
			'add_new_item'          => __( 'Add New XXXXX', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New XXXXX', 'text_domain' ),
			'edit_item'             => __( 'Edit XXXXX', 'text_domain' ),
			'update_item'           => __( 'Update XXXXX', 'text_domain' ),
			'view_item'             => __( 'View XXXXX', 'text_domain' ),
			'search_items'          => __( 'Search XXXXX', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		),
		'supports'              => array( ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-calendar-alt',
	) );

	


}
add_action( 'init', 'vbtk_custom_plugin_register_post_types', 0 );

// Register Custom Taxonomy
function vbtk_custom_plugin_register_taxonomies() {

	// RESOURCE TAGS TAXONOMY
	$labels = array(
		'name'                       => _x( 'XXXXXs', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'XXXXX', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'XXXXX', 'text_domain' ),
		'all_items'                  => __( 'All XXXXXs', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New XXXXX', 'text_domain' ),
		'add_new_item'               => __( 'Add New XXXXX', 'text_domain' ),
		'edit_item'                  => __( 'Edit XXXXX', 'text_domain' ),
		'update_item'                => __( 'Update XXXXX', 'text_domain' ),
		'view_item'                  => __( 'View XXXXX', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove XXXXXs', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular XXXXXs', 'text_domain' ),
		'search_items'               => __( 'Search XXXXXs', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No XXXXXs', 'text_domain' ),
		'items_list'                 => __( 'XXXXX list', 'text_domain' ),
		'items_list_navigation'      => __( 'XXXXX list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'vbtk-xxxxxx', array( 'resource' ), $args );

}
add_action( 'init', 'vbtk_custom_plugin_register_taxonomies', 0 );


