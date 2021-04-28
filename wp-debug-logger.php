<?php
/**
 * Plugin Name:     WP Debug Logger
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Provide a PSR-3 compatible logger for WordPress
 * Author:          awoods
 * Author URI:      https://andrewwoods.net
 * Text Domain:     wp-debug-logger
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wp_Debug_Logger
 */

require_once "loader.php";

add_action( 'plugins_loaded', 'WP_Debug_Logger\set_default_constants' );
