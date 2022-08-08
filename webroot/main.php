<?php
/**
 * Main Controller - via Slim
 */

require_once(dirname(dirname(__FILE__)) . '/boot.php');

// Rewrite a bunch of URL Stuff before Slim
_url_host_helper_rewrite();

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
$app->group('/biotrack/v2013', 'OpenTHC\Bunk\Module\BioTrack');

// BioTrack Fake Interface
$app->group('/ccrs/v2021', 'OpenTHC\Bunk\Module\CCRS');

// LeafData Fake Interface
$app->group('/leafdata/v2018', 'OpenTHC\Bunk\Module\LeafData');

// Metrc Fake Interface
$app->group('/metrc/v2015', 'OpenTHC\Bunk\Module\METRC');

// Go!
$app->run();
