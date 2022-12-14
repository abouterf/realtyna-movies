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
			require_once REALTYNA_PATH . 'includes/RealtynaMovies.php';
		}

		public static function get_instance ()
		{
			if ( is_null( self::$_instance ) )
				self::$_instance = new self;
		}

	}

	RealtynaPlugin::get_instance();
}