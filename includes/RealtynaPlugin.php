<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'RealtynaPlugin' ) )
{
	final class RealtynaPlugin
	{
		protected static $_instance;

		public function __construct ()
		{
			$this->do_includes();
		}

		public static function get_instance ()
		{
			if ( is_null( self::$_instance ) )
				self::$_instance = new self;
		}

		private function do_includes ()
		{
			require_once REALTYNA_PATH . 'includes/RealtynaMovies.php';
			require_once REALTYNA_PATH . 'includes/RealtynaMoviesModule.php';
		}

	}

	RealtynaPlugin::get_instance();
}