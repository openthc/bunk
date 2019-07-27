<?php
/**
 * Front Controller - via Slim
 */

require_once(dirname(dirname(__FILE__)) . '/boot.php');

// App Configuration
$cfg = null;
$cfg = array('debug' => true);
$app = new OpenTHC\App($cfg);

// App Container
$con = $app->getContainer();

// 404 Handler
$con['notFoundHandler'] = function($c) {
	return function ($REQ, $RES) {
		return $RES->withJSON(array(
			'status' => 'failure',
			'detail' => 'Not Found',
		), 404);
	};
};

// BioTrack Fake Interface
$app->group('/biotrack', 'App\Module\BioTrack');

// LeafData Info
$app->group('/leafdata', 'App\Module\LeafData');

// METRC Fake Interface
$app->group('/metrc', 'App\Module\METRC');

// OpenTHC Bunk Interface
// $app->group('/openthc', 'App\Module\OpenTHC');

$app->run();
