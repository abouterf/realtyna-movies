<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'RealtynaMoviesWidget' ) )
{
	class RealtynaMoviesWidget extends WP_Widget
	{
		public function __construct ()
		{
			parent::__construct( 'movies-entries-counter', 'Movies Entries Counter' );
			add_action( 'widgets_init', function () {
				register_widget( 'RealtynaMoviesWidget' );
			} );
		}

		public $args = [
			'before_title'  => '<h4 class="realtyna-widget-heading">',
			'after_title'   => '</h4>',
			'before_widget' => '<div class="realtyna-widget-container">',
			'after_widget'  => '</div></div>',
		];

		public function widget ( $args, $instance )
		{
			echo $args[ 'before_widget' ];
			if ( ! empty( $instance[ 'title' ] ) )
			{
				echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			}
			echo '<div>';
			echo $this->get_movies_counts();
			echo '</div>';
			echo $args[ 'after_widget' ];
		}

		public function form ( $instance )
		{
			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( '', 'text_domain' );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<?php
		}

		public function update ( $new_instance, $old_instance ): array
		{
			$instance            = [];
			$instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';

			return $instance;
		}

		private function get_movies_counts (): int
		{
			$args         = [
				'post_type' => 'movie'
			];
			$movies_query = new WP_Query( $args );

			return $movies_query->post_count ? : 0;
		}

	}

	new RealtynaMoviesWidget();
}