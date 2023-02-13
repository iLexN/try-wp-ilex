<?php
declare( strict_types=1 );

namespace IlexNg\WpIlex\Taxonomies;

final class Location {
	public function init(): void {
		add_action( 'init', [ $this, 'countryInit' ] );
		add_filter( 'term_updated_messages', [ $this, 'countryUpdatedMessages' ] );
	}

	public function countryInit(): void {

		register_taxonomy( 'country', [ 'post' ], [
			'hierarchical'          => false,
			'public'                => true,
			'show_in_nav_menus'     => true,
			'show_ui'               => true,
			'show_admin_column'     => false,
			'query_var'             => true,
			'rewrite'               => array('slug' => 'country', 'with_front' => false),
			'capabilities'          => [
				'manage_terms' => 'edit_posts',
				'edit_terms'   => 'edit_posts',
				'delete_terms' => 'edit_posts',
				'assign_terms' => 'edit_posts',
			],
			'labels'                => [
				'name'                       => __( 'Countries', 'YOUR-TEXTDOMAIN' ),
				'singular_name'              => _x( 'Country', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
				'search_items'               => __( 'Search Countries', 'YOUR-TEXTDOMAIN' ),
				'popular_items'              => __( 'Popular Countries', 'YOUR-TEXTDOMAIN' ),
				'all_items'                  => __( 'All Countries', 'YOUR-TEXTDOMAIN' ),
				'parent_item'                => __( 'Parent Country', 'YOUR-TEXTDOMAIN' ),
				'parent_item_colon'          => __( 'Parent Country:', 'YOUR-TEXTDOMAIN' ),
				'edit_item'                  => __( 'Edit Country', 'YOUR-TEXTDOMAIN' ),
				'update_item'                => __( 'Update Country', 'YOUR-TEXTDOMAIN' ),
				'view_item'                  => __( 'View Country', 'YOUR-TEXTDOMAIN' ),
				'add_new_item'               => __( 'Add New Country', 'YOUR-TEXTDOMAIN' ),
				'new_item_name'              => __( 'New Country', 'YOUR-TEXTDOMAIN' ),
				'separate_items_with_commas' => __( 'Separate countries with commas', 'YOUR-TEXTDOMAIN' ),
				'add_or_remove_items'        => __( 'Add or remove countries', 'YOUR-TEXTDOMAIN' ),
				'choose_from_most_used'      => __( 'Choose from the most used countries', 'YOUR-TEXTDOMAIN' ),
				'not_found'                  => __( 'No countries found.', 'YOUR-TEXTDOMAIN' ),
				'no_terms'                   => __( 'No countries', 'YOUR-TEXTDOMAIN' ),
				'menu_name'                  => __( 'Countries', 'YOUR-TEXTDOMAIN' ),
				'items_list_navigation'      => __( 'Countries list navigation', 'YOUR-TEXTDOMAIN' ),
				'items_list'                 => __( 'Countries list', 'YOUR-TEXTDOMAIN' ),
				'most_used'                  => _x( 'Most Used', 'country', 'YOUR-TEXTDOMAIN' ),
				'back_to_items'              => __( '&larr; Back to Countries', 'YOUR-TEXTDOMAIN' ),
			],
			'show_in_rest'          => true,
			'rest_base'             => 'country',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		] );
	}

	public function countryUpdatedMessages( $messages ) {
		$messages['country'] = [
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Country added.', 'YOUR-TEXTDOMAIN' ),
			2 => __( 'Country deleted.', 'YOUR-TEXTDOMAIN' ),
			3 => __( 'Country updated.', 'YOUR-TEXTDOMAIN' ),
			4 => __( 'Country not added.', 'YOUR-TEXTDOMAIN' ),
			5 => __( 'Country not updated.', 'YOUR-TEXTDOMAIN' ),
			6 => __( 'Countries deleted.', 'YOUR-TEXTDOMAIN' ),
		];

		return $messages;
	}
}
