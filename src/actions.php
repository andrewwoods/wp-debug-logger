<?php

namespace WP_Debug_Logger;

use Psr\Log\LogLevel;

function set_default_constants() {
	if ( ! defined( 'WP_DEBUG_MINIMUM_LEVEL' ) ) {
		if ( 'development' === wp_get_environment_type() ) {
			define( 'WP_DEBUG_MINIMUM_LEVEL', LogLevel::DEBUG );
		} else if ( 'staging' === wp_get_environment_type() ) {
			define( 'WP_DEBUG_MINIMUM_LEVEL', LogLevel::NOTICE );
		} else {
			define( 'WP_DEBUG_MINIMUM_LEVEL', LogLevel::ERROR );
		}
	}
}
