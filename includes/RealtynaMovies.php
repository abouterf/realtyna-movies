<?php

class RealtynaMovies
{
	public function __construct ()
	{
		add_action( 'init', [ $this, 'realtyna_register_post_type' ] );
	}

	public function realtyna_register_post_type ()
	{
		$details = [
			'name'                  => 'Movies',
			'singular_name'         => 'Movie',
			'menu_name'             => 'Movies',
			'name_admin_bar'        => 'Movie',
			'add_new'               => 'Add New Movie',
			'add_new_item'          => 'Add New Movie',
			'new_item'              => 'New Movie',
			'edit_item'             => 'Edit Movie',
			'view_item'             => 'View Movie',
			'all_items'             => 'All Movies',
			'search_items'          => 'Search Movies',
			'parent_item_colon'     => 'Parent Movies:',
			'not_found'             => 'No movies found.',
			'not_found_in_trash'    => 'No movies found in Trash.',
			'featured_image'        => 'Movie Cover Image',
			'set_featured_image'    => 'Set cover image',
			'remove_featured_image' => 'Remove cover image',
			'use_featured_image'    => 'Use as cover image',
			'archives'              => 'Movie archives',
			'insert_into_item'      => 'insert into movies',
			'uploaded_to_this_item' => 'Uploaded to this movie',
			'filter_items_list'     => 'Filter movies list',
			'items_list_navigation' => 'Movies list navigation',
			'items_list'            => 'Movies list',
		];

		$args = [
			'labels'             => $details,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => [ 'slug' => 'recipe' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'supports'           => [ 'title', 'editor', 'author', 'thumbnail' ],
			'taxonomies'         => [ 'category', 'post_tag' ],
			'show_in_rest'       => true
		];
		register_post_type( 'movie', [
			'label' => 'Movies',
		] );
	}
}