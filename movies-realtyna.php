<?php
/**
 * Plugin Name:       Movies
 * Description:       Implementing CRUD Features For Movies | Realtyna Test Project
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Erfan Kargosha
 * Author URI:        https://webouterf.ir/
 */

if ( ! defined( 'ABSPATH' ) )
	exit;

define( 'PREFIX', 'REALTYNA' );
define( 'REALTYNA_VERSION', '1.0.0' );
define( 'REALTYNA__FILE__', __FILE__ );
define( 'REALTYNA_PLUGIN_BASE', plugin_basename( REALTYNA__FILE__ ) );
define( 'REALTYNA_PATH', plugin_dir_path( REALTYNA__FILE__ ) );
define( 'REALTYNA_URL', plugin_dir_url( REALTYNA__FILE__ ) );

require_once REALTYNA_PATH . 'includes/RealtynaPlugin.php';