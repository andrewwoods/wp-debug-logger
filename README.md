
# WP Debug Logger

__Modernizing Logging For WordPress__

As PHP moves forward, so must WordPress. This plugin helps WordPress use
the tools of modern PHP. Monolog — PHP's most popular logging package —
is a composer package. Since WordPress doesn't currently have a
universal way to support composer, this WordPress plugin is meant to
start bridging the gap. This logger is
[PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md)
compliant, a PHP standard which Monolog also uses.



## Version

The current version is 0.1.0. This project uses [semantic versioning](http://semver.org).



## Installation

1. Upload the `wp-debug-logger` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enable Debugging in your `wp-config.php`

### Enable Debugging

In order to enable standard debugging in WordPress, you'll need to add
some settings to your `wp-config.php` file.

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_MINIMUM_LEVEL', 'debug' );

// For good measure, this will hide errors from being displayed on-screen
@ini_set('display_errors', 0);
```

#### Minimum Level

`WP_DEBUG_MINIMUM_LEVEL` is a new constant that determines the minimum
severity level you wish to write to your `wp-content/debug.log` file. In
your *development* environment, I recommend using `debug` so you can see
all the errors being written. For your *production* environment, I'd
recommend the `error` level, so you can capture all the significant
problems. Here are the values to use: **emergency, alert, critical,
error, warning, notice, info, debug**. Note: they're all lowercase, as
the value is case-sensitive.

#### Displaying Errors

In your **development** environment, you may choose to set
`WP_DEBUG_DISPLAY` to `true`, so the error messages show in your
browser. However, I **strongly recommend** that you do not change it,
for your *production* environment. These settings can be placed
anywhere above the line.

```
/* That’s all, stop editing! Happy blogging. */
```



## Logging Levels

There are 8 logging levels available, [defined by RFC
5424](https://tools.ietf.org/html/rfc5424). The levels specified in
order from the most severe to the least severe:

* **Emergency**: system is unusable
* **Alert**: action must be taken immediately
* **Critical**: critical conditions
* **Error**: error conditions
* **Warning**: warning conditions
* **Notice**: normal but significant condition
* **Info**: informational messages
* **Debug**: debug-level messages



## Example Usage

The work of writing to the `wp-content/debug.log` file is done by the
Logger class. It determines the format of the message, and makes use of
the `error_log()` function PHP provides to do the writing. In this way,
this plugin acts like syntactic sugar in a more modern PHP way.

Each of the logging levels, has a corresponding method in the Logger
class. Here's how to use the Logger class from your code.

```php
$logger = new \WP_Debug_Logger\Logger();
$logger->error('The SQL query returned zero rows');
````

it's recommended that you replace fully namespaced class names with an
import at the top of your file.

```php
use WP_Debug_Logger\Logger;

// ... your code ...

$logger = new Logger();
$logger->error('The SQL query returned zero rows');
````

### Static Log Methods

If you have a Laravel background, you may be used to using Laravel's Log
facade. While there is no service container to access, I did create a
`Log` class with static methods to wrap the Logger class. So you can
change the above example to read as follows.

```php
use WP_Debug_Logger\Log;

// ... your code ...

Log::error('The SQL query returned zero rows');
````

Here's the list of all static methods for the Log class

```php
Log::emergency( 'This is an emergency message' );
Log::alert( 'This is an alert message' );
Log::critical( 'This is a critical message' );
Log::error( 'This is an error message' );
Log::warning( 'This is a warning message' );
Log::notice( 'This is a notice message' );
Log::info( 'This is a info message' );
Log::debug( 'This is a debug message' );
````

### Passing Data to the Log

Sometimes writing a simple message isn't enough. Wouldn't it be nice if
you could include some data? Then you can make sure that the data has
the content you think it does. If you're on your local environment,
using the step debugging tools in XDebug will give you superior results.
On a server though, it's useful to write the data to your log.

**Please do not log passwords, secret keys, or other sensitive data.**

Each of these methods, accepts an associative array as an optional
second parameter. The keys of the array are used to identify replacement
strings, and the value will be interpolated.

```php
Log::debug(
	'Success! The user "{username}" logged in!',
	[ 'username' => 'awoods' ]
);
```

## Helper Methods

Occasionally, you need to use `print_r()` on a piece of data, in order
to see how it's structured. To make it easy for you, the `print()`
method will write the `print_r()` data to the log as a `debug` level
message. It's good for examining the structure of a piece of data, but i
don't recommend leaving this in your code - since it makes your log less
scannable.

```php
Log::print(
	'your message here',
	$your_data
);
```


The `var_dump()` is related to `print_r()` in purpose, in that you can
see how data is structured. However, it also includes length
information. The `dump()` method will write the `var_dump()` data to the
log as a `debug` level message. Just like the `print` method, I don't
recommend leaving this in your code - since it makes your log less
scannable.

```php
Log::dump(
	'your message here',
	$your_data
);
```


## Frequently Asked Questions

### Why not just use the error_log function?

You still can. However, the plugin will add value to your logging
efforts. Using this logger will add structure io the debug.log file,
*and* give you a modern PHP interface to control the amount of logging
in your website. Using a method with the logging level indicates the
severity of the message.



## Ideas for sections/pages

* Features
* Language Translations
* Screenshots
* Submit Issues



## Resources

* [PSR List](https://github.com/php-fig/fig-standards/blob/master/index.md)
* [PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md)

* [Semantic Versioning](http://semver.org)
* [GitHub Markdown](https://help.github.com/categories/writing-on-github/)
* [Contributing Guidelines](https://help.github.com/articles/setting-guidelines-for-repository-contributors/)
* [Changelog](docs/CHANGELOG.md)
* [Humans TXT](http://humanstxt.org/) 
* [Robots TXT](http://www.robotstxt.org/) 
* [Git Ignore Generator](https://www.gitignore.io/)
* [Open Source Licenses](http://opensource.org/licenses/GPL-3.0)



## Credits and Acknowledgments

* Project Creator:  [Andrew Woods](https://andrewwoods.net)

