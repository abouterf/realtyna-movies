<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'RealtynaMovies' ) )
{
	class RealtynaMovies
	{
		public function __construct ()
		{
			add_action( 'init', [ $this, 'realtyna_register_genre_taxonomy_movies_post_type' ] );
			add_action( 'init', [ $this, 'realtyna_register_movies_post_type' ] );
		}

		public function realtyna_register_movies_post_type ()
		{
			$labels = [
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
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'menu_icon'          => 'dashicons-video-alt2',
				'show_in_menu'       => true,
				'query_var'          => true,
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 20,
				'supports'           => [ 'title', 'editor', 'author', 'thumbnail' ],
				'taxonomies'         => [ 'category', 'genre', 'post_tag' ],
				'show_in_rest'       => true
			];
			register_post_type( 'movie', $args );
		}

		public function realtyna_register_genre_taxonomy_movies_post_type ()
		{
			$labels = [
				'singular_name'              => 'Genre',
				'all_items'                  => 'All Genres',
				'edit_item'                  => 'Edit Genre',
				'view_item'                  => 'View Genre',
				'update_item'                => 'Update Genre',
				'add_new_item'               => 'Add New Genre',
				'new_item_name'              => 'New Genre Name',
				'search_items'               => 'Search Genres',
				'popular_items'              => 'Popular Genres',
				'separate_items_with_commas' => 'Separate genres with comma',
				'choose_from_most_used'      => 'Choose from most used genres',
				'not_found'                  => 'No Genres found',
			];
			register_taxonomy( 'genre', [ 'movie' ], [
				'label'             => 'Genre',
				'hierarchical'      => false,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'labels'            => $labels
			] );
			register_taxonomy_for_object_type( 'genre', 'movie' );
		}
	}

	new RealtynaMovies;
}