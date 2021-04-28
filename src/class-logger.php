<?php

namespace WP_Debug_Logger;

use Psr\Log\LogLevel;

class Logger implements \Psr\Log\LoggerInterface {

	protected $levels = [
		LogLevel::EMERGENCY => 0,
		LogLevel::ALERT => 1,
		LogLevel::CRITICAL => 2,
		LogLevel::ERROR => 3,
		LogLevel::WARNING => 4,
		LogLevel::NOTICE => 5,
		LogLevel::INFO => 6,
		LogLevel::DEBUG => 7,
	];

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
		if ( ! WP_DEBUG ) {
			return; // Don't allow writing when WP_DEBUG is false
		}

		if ( ! WP_DEBUG_LOG ) {
			return; // Don't allow writing when WP_DEBUG_LOG is false
		}

		if ( $this->meets_minimum_level( $level, WP_DEBUG_MINIMUM_LEVEL ) ) {
			$content = date('Y-m-d H:i:s' ) . ' ';
			$content .= strtoupper( $level ) . ': ';
			$content .= $this->interpolate( $message, $context );

			error_log( $content );
		}
	}

	/**
	 * Determine if the current level meets the minimum *severity* level
	 *
	 * For a minimum level of "error"
	 *
	 * - a current level of "critical" does match, because it's more severe
	 * - a current level of "error" does match, because it's equally severe
	 * - a current level of "notice" does not match, because it's less severe
	 *
	 * @param string $current_level
	 * @param string $minimum_level
	 *
	 * @return bool
	 */
	public function meets_minimum_level( string $current_level, string $minimum_level ) : bool {

		// The more severe levels have lower numeric values
		if ($this->get_numeric_level( $current_level ) <= $this->get_numeric_level( $minimum_level)) {
			return true;
		}

		return false;
	}

	/**
	 * Return the numeric level for a given level name
	 *
	 * @param string $level
	 *
	 * @return int
	 */
	public function get_numeric_level( string $level ) : int {
		if ( isset( $this->levels[ $level ] ) ) {
			return $this->levels[ $level ];
		}

		return $this->levels[ LogLevel::ERROR ];
	}
}
