<?php
/**
	OpenTHC Bunk API Application Bootstrap
*/

use Edoceo\Radix\DB\SQL;

define('APP_NAME', 'OpenTHC Bunk');
define('APP_SITE', 'https://bunk.openthc.org');
define('APP_ROOT', dirname(__FILE__));
define('APP_SALT', md5(APP_NAME . APP_SITE . APP_ROOT));

error_reporting((E_ALL|E_STRICT) ^ E_NOTICE);

require_once(APP_ROOT . '/vendor/autoload.php');
