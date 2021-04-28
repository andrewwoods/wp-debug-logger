=== WP Debug Logger ===
Contributors: awoods
Tags: psr-3, logs, logging, debug, monolog
Requires at least: 5.7
Tested up to: 5.7
Requires PHP: 7.4
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Provide a PSR-3 compatible logger for WordPress core that writes to the
debug.log

== Description ==

As PHP moves forward, so must WordPress. THis plugin helps WordPress use
the tools of modern PHP. Monolog - PHP's most popular logging package
- is a composer package. Since WordPress doesn't currently have a
universal way to support composer,  this WordPress plugin is meant to
start bridging the gap, 


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the `wp-debug-logger` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enable Debugging in your `wp-config.php`

```php
// in your wp-config.php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_MINIMUM_LEVEL', 'debug' );

// For good measure, this will hide errors from being displayed on-screen
@ini_set('display_errors', 0);
```

== Frequently Asked Questions ==

= Why not just use the error_log function =

You still can. However, the plugin will add value to your logging
efforts. Using this logger will add structure io the
debug.log file, *and* give you a modern PHP interface to control the
amount of logging in your website.


== Changelog ==

= 0.1.0 =

* Initial Version


