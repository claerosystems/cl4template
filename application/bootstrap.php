<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core' . EXT;

if (is_file(APPPATH.'classes/kohana' . EXT)) {
	// Application extends the core
	require APPPATH.'classes/kohana' . EXT;
} else {
	// Load empty core extension
	require SYSPATH.'classes/kohana' . EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Edmonton');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_CA.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

//-- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-ca');

/**
 * Set Kohana::$environment to the value of KOHANA_ENVIRONMENT
 */
Kohana::$environment = KOHANA_ENVIRONMENT;

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * Type      | Setting    | Description                                    | Default Value
 * ----------|------------|------------------------------------------------|---------------
 * `string`  | base_url   | set the base URL for the application           | NULL
 * `string`  | index_file | set the index.php file name                    | "index.php"
 * `boolean` | errors     | use internal error and exception handling?     | TRUE
 * `boolean` | profile    | do internal benchmarking?                      | TRUE
 * `boolean` | caching    | cache the location of files between requests?  | FALSE
 * `string`  | charset    | character set used for all input and output    | "utf-8"
 * `string`  | cache_dir  | set the cache directory path                   | APPPATH."cache"
 * `integer` | cache_life | set the default cache lifetime                 | 60
 * `string`  | error_view | set the error rendering view                   | "kohana/error"
 */
$settings = array(
	'base_url'      => '/',
    'index_file'    => '',
    'errors'        => DEBUG_FLAG,
    'profile'       => DEBUG_FLAG,
    'caching'       => CACHE_FLAG,
    'cache_dir'     => ABS_ROOT . '/cache',
);
Kohana::init($settings);

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(ABS_ROOT . '/logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
* Setting the default language
* If set to NULL, then the route won't include a language by default
* If you want a language in the route, set default_lang to the language (ie, en-ca)
* This needs to be here because it's used within some of the cl4 modules
*/
define('DEFAULT_LANG', NULL);
$lang_options = '(en-ca|fr-ca)';

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 * ORDER MATTERS HERE!!!
 */
$modules = array();
$modules['cl4']          = MODPATH . 'cl4';         // cl4
$modules['cl4auth']      = MODPATH . 'cl4auth';     // cl4auth
$modules['cl4admin']     = MODPATH . 'cl4admin';    // cl4admin
$modules['cl4base']      = MODPATH . 'cl4base';     // cl4base
if (FIREPHP_FLAG) $modules['firephp'] = MODPATH . 'firephp'; // Fire PHP debugging - ONLY WORKS IN FIREFOX
$modules['database']     = MODPATH . 'database';    // Database access
$modules['image']        = MODPATH . 'image';       // Image manipulation
$modules['orm']          = MODPATH . 'orm';         // Object Relationship Mapping
$modules['auth']         = MODPATH . 'auth';        // Basic authentication
$modules['pagination']   = MODPATH . 'pagination';  // Paging of results
if (Kohana::$environment == Kohana::DEVELOPMENT) $modules['userguide'] = MODPATH . 'userguide'; // Kohana userguide and API documentation
if (CACHE_FLAG) $modules['cache'] = MODPATH . 'cache'; // Caching with multiple backends
if (DEBUG_FLAG) $modules['codebench'] = MODPATH . 'codebench'; // Benchmarking tool
Kohana::modules($modules);

// set up firephp for debugging
if (FIREPHP_FLAG && DEBUG_FLAG) {
	Kohana::$log->attach(new FirePHP_Log_Console());
}

if (isset($modules['cl4'])) {
	// sets the error handlers to use the customized Claero module versions only when the claero module is included
	cl4::set_error_handlers();
}

// this sets the default database to use
Database::$default = DATABASE_DEFAULT;

// this sets the session type so we don't need to set it when calling Session::instance()
Session::$default = SESSION_TYPE;

// the salt to use when creating the cookies for validation
Cookie::$salt = '=V,]tB|H!;?RP!2Fv(<)"mC\sx48XmiF5|@JkM{.?W+SV>lj?QQs^:;\!ah~oj%';

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI. Routes are selected by whichever one matches first.
 */

// Routes within this if state can only be access from the command line
// all other routes are also accessible from the command line as: php html/index.php --uri="page/action"
if (Kohana::$is_cli) { }

// routes for "static" pages without a sub folder
Route::set('pages', '(<lang>/)(<page>)', array('lang' => $lang_options))
	->defaults(array(
		'controller' => 'page',
		'lang' => DEFAULT_LANG,
		'page' => 'index',
));

// route for "static" pages with a sub folder
Route::set('pages_section', '(<lang>/)<section>/(<page>)', array('lang' => $lang_options))
	->defaults(array(
		'controller' => 'page',
		'lang' => DEFAULT_LANG,
		'section' => 'index',
		'page' => 'index',
));

// for all other pages, show a 404
Route::set('catch_all', '<path>', array('path' => '(|.+)'))
	->defaults(array(
		'controller' => 'base',
		'action' => '404',
));