
# WP Debug Logger

__Modernizing Logging For WordPress__

As PHP moves forward, so must WordPress. THis plugin helps WordPress use
the tools of modern PHP. Monolog - PHP's most popular logging package
- is a composer package. Since WordPress doesn't currently have a
universal way to support composer,  this WordPress plugin is meant to
start bridging the gap, 



## Version

The current version is 0.1.0. This project uses [semantic versioning](http://semver.org).



## Installation

1. Upload the `wp-debug-logger` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

### Enable Debugging

In order to enable standard debugging in WordPress, you'll need to add
some settings to your `wp-content/wp-config.php` file.

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );

// For good measure, this will hide errors from being displayed on-screen
@ini_set('display_errors', 0);
```

In your **development** environment, you may choose to set
`WP_DEBUG_DISPLAY` to `true`, so the error messages show in your
browser. However, I **strongly recommend** that you do not change it,
for your *production* environment, These three lines can be placed
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



## Ideas for sections/pages

* Features
* Language Translations
* Frequently Asked Questions (FAQ)
* Screenshots
* Submit Issues



## Resources

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

