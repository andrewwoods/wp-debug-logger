=== Debug Logger ===
Contributors: awoods
Tags: psr-3, logs, logging, debug, monolog, dev, development
Requires at least: 5.7
Tested up to: 5.7
Requires PHP: 7.4
Stable tag: 0.2.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Provide a PSR-3 compatible logger for WordPress core that writes to the
debug.log

== Description ==

As PHP moves forward, so must WordPress. This plugin helps WordPress use the tools of modern PHP. Monolog — PHP's most popular logging package — is a composer package. Since WordPress doesn't currently have a universal way to support composer, this WordPress plugin is meant to start bridging the gap. This logger is [PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md) compliant, a PHP standard which Monolog also uses.



== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the `wp-debug-logger` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enable debugging in your `wp-config.php`

`
// in your wp-config.php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_MINIMUM_LEVEL', 'debug' );

// For good measure, this will hide errors from being displayed on-screen
@ini_set('display_errors', 0);
`
1. As you write your code, sprinkle in these Log methods.

= Minimum Level =

WP_DEBUG_MINIMUM_LEVEL is a new constant that determines the minimum severity level you wish to write to your *wp-content/debug.log* file. In your *development* environment, I recommend using `debug` so you can see all the errors being written. For your *production* environment, I'd recommend the `error` level, so you can capture all the significant problems. Here are the values to use: **emergency, alert, critical, error, warning, notice, info, debug**. Note: they're all lowercase, as the value is case-sensitive.

= Displaying Errors =

In your **development** environment, you may choose to set `WP_DEBUG_DISPLAY` to `true`, so the error messages show in your browser. However, I **strongly recommend** that you do not change it, for your *production* environment. These settings can be placed anywhere above the line.

`
/* That’s all, stop editing! Happy blogging. */
`

== Logging Levels ==

There are 8 logging levels available, [defined by RFC 5424](https://tools.ietf.org/html/rfc5424). The levels specified in
order from the most severe to the least severe:

* **Emergency**: system is unusable
* **Alert**: action must be taken immediately
* **Critical**: critical conditions
* **Error**: error conditions
* **Warning**: warning conditions
* **Notice**: normal but significant condition
* **Info**: informational messages
* **Debug**: debug-level messages



== Frequently Asked Questions ==

= Why not just use the error_log function? =

You still can. However, the plugin will add value to your logging efforts. Using this logger will add structure io the debug.log file, *and* give you a modern PHP interface to control the amount of logging in your website. The logging methods in this plugin also provide information about the severity of the error.

= Where can I find more documentation? =

This project is [developed on Github](https://github.com/andrewwoods/wp-debug-logger). There is a more complete readme there, with links to supplemental information.

= Why use PSR-3? =

A PSR is a PHP Standard Recommendation. PSRs are use to create and maintain interoperability between PHP-based frameworks and content management systems.



== Screenshots ==

No screenshots yet.



== Upgrade Notice ==

No notices yet.



== Changelog ==

= 0.2.0 =

* Add `Log::print()` and `Log::dump()` methods
* Improve documentation

= 0.1.0 =

* Import PSR-3 from PHP FIG into `lib` directory
* Create Logger class to write log
* Create Log class to statically interact with Logger class
* Add usage instructions and logging levels

