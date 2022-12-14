<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'RealtynaPlugin' ) )
{
	final class RealtynaPlugin
	{
		protected static $_instance;
		private $realtyna_movies;

		public function __construct ()
		{
			require_once './RealtynaMovies.php';
			$this->realtyna_movies = new RealtynaMovies();
		}

		public static function get_instance ()
		{
			if ( is_null( self::$_instance ) )
				self::$_instance = new self;
		}

	}

	RealtynaPlugin::get_instance();
}