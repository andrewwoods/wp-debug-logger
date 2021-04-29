<?php

namespace WP_Debug_Logger;

/**
 * Class Log
 *
 * Provides a static wrapper to the Logger class. This makes it easier for developers
 * to use from their calling code.
 *
 * @package WP_Debug_Logger
 */
class Log {

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function emergency( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->emergency($message, $context);
	}

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function alert( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->alert($message, $context);
	}

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function critical( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->critical($message, $context);
	}

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function error( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->error($message, $context);
	}

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function warning( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->warning($message, $context);
	}

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function notice( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->notice($message, $context);
	}

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function info( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->info($message, $context);
	}

	/**
	 * @param string $message
	 * @param array $context
	 */
	public static function debug( string $message, array $context = array() ) {
		$logger = new Logger();
		$logger->debug($message, $context);
	}

	/**
	 * Write print_r data to the log using the debug level
	 *
	 * @param string $message
	 * @param $value
	 */
	public static function print( string $message, $value ) {
		$data = print_r( $value, true );

		$logger = new Logger();
		$logger->debug( $message . '=' . $data );
	}

	/**
	 * Write var_dump data to the log using the debug level
	 *
	 * @param string $message
	 * @param $value
	 */
	public static function dump( string $message, $value ) {
		ob_start();
		var_dump( $value ); // since var_dump() only outputs, it has to be buffered
		$data = ob_get_clean();

		$logger = new Logger();
		$logger->debug( $message . "=\n" . $data );
	}
}
