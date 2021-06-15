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

// Clear Error Handlers to get all the spew and logs
if ($cfg['debug']) {
	unset($con['errorHandler']);
	unset($con['phpErrorHandler']);
}

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

// LeafData Fake Interface
$app->group('/leafdata', 'OpenTHC\Bunk\Module\LeafData');

// Metrc Fake Interface
$app->group('/metrc', 'OpenTHC\Bunk\Module\METRC');

// Go!
$app->run();
