<?php
/**
 * Manual loader
 *
 * When WordPress comes to use Composer auto-loading, this file can be removed.
 * Until that day comes, any file that needs to be loaded in the plugin should
 * be loaded thru this file.
 */

require_once "lib/php-fig-log/Psr/Log/AbstractLogger.php";
require_once "lib/php-fig-log/Psr/Log/InvalidArgumentException.php";
require_once "lib/php-fig-log/Psr/Log/LogLevel.php";
require_once "lib/php-fig-log/Psr/Log/LoggerAwareInterface.php";
require_once "lib/php-fig-log/Psr/Log/LoggerAwareTrait.php";
require_once "lib/php-fig-log/Psr/Log/LoggerTrait.php";
require_once "lib/php-fig-log/Psr/Log/NullLogger.php";
