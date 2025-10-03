#!/usr/bin/env php
<?php
/**
 * OpenTHC Bunk Application Init
 */

_config_create();

// Bootstrap OpenTHC Service
$d = dirname(__DIR__);
require_once("$d/boot.php");
// require_once("$d/vendor/openthc/common/lib/docker.php");

exit(0);

/**
 * Create Service Config File
 */
function _config_create()
{
	$cfg = [];

	// Redis
	$cfg['redis'] = [
		'hostname' => 'rdb',
	];

	// OpenTHC Services
	$cfg['openthc'] = [
		'bunk' => [
			'id' => getenv('OPENTHC_BUNK_ID'),
			'origin' => getenv('OPENTHC_BUNK_ORIGIN'),
			'public' => getenv('OPENTHC_BUNK_PUBLIC'),
			'secret' => getenv('OPENTHC_BUNK_SECRET'),
		],
		'dir' => [
			'id' => getenv('OPENTHC_DIR_ID'),
			'origin' => getenv('OPENTHC_DIR_ORIGIN'),
			'public' => getenv('OPENTHC_DIR_PUBLIC'),
		],
		'sso' => [
			'id' => getenv('OPENTHC_SSO_ID'),
			'origin' => getenv('OPENTHC_SSO_ORIGIN'),
			'public' => getenv('OPENTHC_SSO_PUBLIC'),
		]
	];

	$cfg_data = var_export($cfg, true);
	$cfg_text = sprintf("<?php\n// Generated File\n\nreturn %s;\n", $cfg_data);
	$cfg_file = sprintf('%s/etc/config.php', dirname(__DIR__));

	file_put_contents($cfg_file, $cfg_text);

}
