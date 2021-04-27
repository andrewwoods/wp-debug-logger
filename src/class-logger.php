<?php

namespace WP_Debug_Logger;

use Psr\Log\LogLevel;

class Logger implements \Psr\Log\LoggerInterface {

	/**
	 * Interpolates context values into the message placeholders.
	 *
	 * @param string $message The content for the debug log.
	 *
	 * @param array $context
	 *
	 * @return string
	 */
	public function interpolate( string $message, array $context = array() ) : string {

		$replace = array();
		foreach ( $context as $key => $val ) {
			// check that the value can be cast to string
			if ( ! is_array( $val ) && ( ! is_object( $val ) || method_exists( $val, '__toString' ) ) ) {
				$replace[ '{' . $key . '}' ] = $val;
			}
		}

		// interpolate replacement values into the message and return
		return strtr( $message, $replace );
	}

	/**
	 * @inheritDoc
	 */
	public function emergency( $message, array $context = array() ) {
		$this->log( LogLevel::EMERGENCY, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function alert( $message, array $context = array() ) {
		$this->log( LogLevel::ALERT, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function critical( $message, array $context = array() ) {
		$this->log( LogLevel::CRITICAL, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function error( $message, array $context = array() ) {
		$this->log( LogLevel::ERROR, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function warning( $message, array $context = array() ) {
		$this->log( LogLevel::WARNING, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function notice( $message, array $context = array() ) {
		$this->log( LogLevel::NOTICE, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function info( $message, array $context = array() ) {
		$this->log( LogLevel::INFO, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function debug( $message, array $context = array() ) {
		$this->log( LogLevel::DEBUG, $message, $context );
	}

	/**
	 * @inheritDoc
	 */
	public function log( $level, $message, array $context = array() ) {
		$content = date('Y-m-d H:i:s' ) . ' ';
		$content .= strtoupper( $level ) . ': ';
		$content .= $this->interpolate( $message, $context );

		error_log( $content );
	}
}
