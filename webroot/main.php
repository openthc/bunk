<?php
/**
 * Front Controller - via Slim
 */

require_once(dirname(dirname(__FILE__)) . '/boot.php');

// App Configuration
$cfg = [];
$cfg['debug'] = true;
$app = new OpenTHC\App($cfg);

// App Container
$con = $app->getContainer();

// 404 Handler
$con['notFoundHandler'] = function($c) {
	return function ($REQ, $RES) {
		return $RES->withJSON([
			'data' => null,
			'meta' => [ 'detail' => 'Not Found [BWF-021]' ]
		], 404);
	};
};

// BioTrack Fake Interface
$app->group('/biotrack', 'OpenTHC\Bunk\Module\BioTrack');

// LeafData Info
$app->group('/leafdata', 'OpenTHC\Bunk\Module\LeafData');

// METRC Fake Interface
$app->group('/metrc', 'OpenTHC\Bunk\Module\METRC');

// Go!
$app->run();
