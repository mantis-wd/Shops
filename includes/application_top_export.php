<?php
/* -----------------------------------------------------------------------------------------
   $Id: application_top_export.php 1323 2005-10-27 17:58:08Z mz $

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(application_top.php,v 1.273 2003/05/19); www.oscommerce.com
   (c) 2003	 nextcommerce (application_top.php,v 1.54 2003/08/25); www.nextcommerce.org 

   Released under the GNU General Public License
   -----------------------------------------------------------------------------------------
   Third Party contribution:
   Add A Quickie v1.0 Autor  Harald Ponce de Leon
    
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

// start the timer for the page parse time log
define('PAGE_PARSE_START_TIME', microtime());

// set the level of error reporting
//error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT); //exlude E_STRICT on PHP 5.4
error_reporting(0);
//  error_reporting(E_ALL);

/*
 * turn off magic-quotes support, for both runtime and sybase, as both will cause problems if enabled
 */
if (version_compare(PHP_VERSION, 5.3, '<') && function_exists('set_magic_quotes_runtime')) set_magic_quotes_runtime(0);
if (version_compare(PHP_VERSION, 5.4, '<') && @ini_get('magic_quotes_sybase') != 0) @ini_set('magic_quotes_sybase', 0);

// Set the local configuration parameters - mainly for developers - if exists else the mainconfigure
if (file_exists('../includes/local/configure.php')) {
  include('../includes/local/configure.php');
} else {
  include('../includes/configure.php');
}

// BOF - Tomcraft - 2009-11-08 - FIX for PHP5.3 date_default_timezone_set
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {
	date_default_timezone_set('Europe/Berlin');
}
// EOF - Tomcraft - 2009-11-08 - FIX for PHP5.3 date_default_timezone_set
  
// define the project version
define('PROJECT_VERSION', 'modified eCommerce Shopsoftware');

// BOF - Tomcraft - 2009-11-09 - Added missing definition for TAX_DECIMAL_PLACES
define('TAX_DECIMAL_PLACES', 0);
// EOF - Tomcraft - 2009-11-09 - Added missing definition for TAX_DECIMAL_PLACES

// set the type of request (secure or not)
//BOF - web28 - 2010-09-03 - added native support for SSL-proxy connections
//$request_type = (getenv('HTTPS') == '1' || getenv('HTTPS') == 'on') ? 'SSL' : 'NONSSL';
if (file_exists('includes/request_type.php')) {
	include ('includes/request_type.php');
} else $request_type = 'NONSSL';
//EOF - web28 - 2010-09-03 - added native support for SSL-proxy connections

// set php_self in the local scope
require_once(DIR_FS_INC . 'set_php_self.inc.php');
$PHP_SELF = set_php_self();

//compatibility for modified eCommerce Shopsoftware 1.06 files
define('DIR_WS_BASE', '');

// include the list of project filenames
require(DIR_WS_INCLUDES . 'filenames.php');

// include the list of project database tables
require(DIR_WS_INCLUDES . 'database_tables.php');


// Store DB-Querys in a Log File
define('STORE_DB_TRANSACTIONS', 'false');

// include used functions
require_once(DIR_FS_INC . 'xtc_db_connect.inc.php');
require_once(DIR_FS_INC . 'xtc_db_close.inc.php');
require_once(DIR_FS_INC . 'xtc_db_error.inc.php');
require_once(DIR_FS_INC . 'xtc_db_perform.inc.php');
require_once(DIR_FS_INC . 'xtc_db_query.inc.php');
require_once(DIR_FS_INC . 'xtc_db_fetch_array.inc.php');
require_once(DIR_FS_INC . 'xtc_db_num_rows.inc.php');
require_once(DIR_FS_INC . 'xtc_db_data_seek.inc.php');
require_once(DIR_FS_INC . 'xtc_db_insert_id.inc.php');
require_once(DIR_FS_INC . 'xtc_db_free_result.inc.php');
require_once(DIR_FS_INC . 'xtc_db_fetch_fields.inc.php');
require_once(DIR_FS_INC . 'xtc_db_output.inc.php');
require_once(DIR_FS_INC . 'xtc_db_input.inc.php');
require_once(DIR_FS_INC . 'xtc_db_prepare_input.inc.php');
require_once (DIR_FS_INC.'html_encoding.php'); //new function for PHP5.4


// modification for new graduated system


// make a connection to the database... now
xtc_db_connect() or die('Unable to connect to database server!');

// set the application parameters
$configuration_query = xtc_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
while ($configuration = xtc_db_fetch_array($configuration_query)) {
  define($configuration['cfgKey'], stripslashes($configuration['cfgValue'])); //Web28 - 2012-08-09 - fix slashes
}

// if gzip_compression is enabled, start to buffer the output
if ( (GZIP_COMPRESSION == 'true') && ($ext_zlib_loaded = extension_loaded('zlib')) && (PHP_VERSION >= '4') ) {
  if (($ini_zlib_output_compression = (int)ini_get('zlib.output_compression')) < 1) {
    ob_start('ob_gzhandler');
  } else {
    ini_set('zlib.output_compression_level', GZIP_LEVEL);
  }
}

// Include Template Engine
require(DIR_WS_CLASSES . 'Smarty_2.6.27/Smarty.class.php');

?>
