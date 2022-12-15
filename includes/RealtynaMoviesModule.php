<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'RealtynaMoviesModule' ) )
{
	class RealtynaMoviesModule
	{
		public function __construct ()
		{
			add_action( 'add_meta_boxes', [ $this, 'realtyna_imdb_rating_metabox' ] );
			add_action( 'save_post', [ $this, 'realtyna_imdb_rating_save' ], 1 );
			add_action( 'rest_api_init', [ $this, 'realtyna_add_imdb_meta_data_to_rest' ] );
			add_action( 'init', [ $this, 'realtyna_add_movies_list_shortcode' ] );
		}

		public function realtyna_imdb_rating_metabox ()
		{
			add_meta_box( 'realtyna_movie_rating_box', 'IMDB Rating', [
				$this,
				'realtyna_imdb_rating_box_html'
			], 'movie' );
		}

		public function realtyna_imdb_rating_box_html ( $post )
		{
			$value = get_post_meta( $post->ID, 'imdb_rating', true );
			?>
			<div class="hide-if-no-js">
				<label>
					<input step="0.1" placeholder="step is 0.1, e.g 7.1" type="number" name="imdb_rating" value="<?php echo $value ?>" class="form-input-tip ui-autocomplete-input">
				</label>
			</div>
			<?php
		}

		public function realtyna_imdb_rating_save ( $post_id )
		{
			if ( array_key_exists( 'imdb_rating', $_POST ) )
			{
				update_post_meta( $post_id, 'imdb_rating', $_POST[ 'imdb_rating' ] );
			}
		}

		public function realtyna_add_imdb_meta_data_to_rest ()
		{
			register_rest_field( 'movie', 'imdb_rating', [
				'get_callback' => function ( $data ) {
					return get_post_meta( $data[ 'id' ], 'imdb_rating', true );
				},
				'schema'       => null,
			] );
		}

		public function realtyna_add_movies_list_shortcode ()
		{
			add_shortcode( 'realtyna_list_movies', [ $this, 'realtyna_list_movies_function' ] );
		}

		public function realtyna_list_movies_function (): string
		{
			global $post;
			$output       = '';
			$args         = [
				'post_type'      => 'movie',
				'orderby'        => 'title',
				'order'          => 'ASC',
				'posts_per_page' => 10,
			];
			$movies_query = new WP_Query( $args );
			if ( $movies_query->have_posts() )
			{
				$output .= '<ul>';
				while ( $movies_query->have_posts() )
				{
					$movies_query->the_post();

					$title = get_the_title();
					$link  = get_the_permalink();

					$output .= "<li><a href=\"{$link}\">{$title}</a></li>";
				}
				$output .= '</ul>';
			}
			else
			{
				$output .= '<div>No Results</div>';
			}

			wp_reset_postdata();

			return $output;
		}
	}

	new RealtynaMoviesModule;
}