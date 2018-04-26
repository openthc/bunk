<?php
/**
	Front Controller - via Slim
*/

require_once(dirname(dirname(__FILE__)) . '/boot.php');

// Create App Container
$con = new \Slim\Container(array(
	'debug' => true, // true,
	'settings' => array(
		'addContentLengthHeader' => false,
		'displayErrorDetails' => true,
		//'routerCacheFile' => '/tmp/bunk-router-cache.bin',
	),
));

// Create App
$app = new \Slim\App($con);

// BioTrack Fake Interface
$app->group('/biotrack', function() {

	// Info
	$this->get('', function() {

		$file = APP_ROOT . '/webroot/biotrack.md';
		$text = file_get_contents($file);

		$pd = new Parsedown();
		echo $pd->text($text);

	});

	// This one is sloppy cause I just slapped in some existing crap I had
	$this->post('/v2013/serverjson.asp', function($REQ, $RES, $ARG) {
		return require_once(APP_ROOT . '/lib/biotrack.php');
	});

});

// LeafData Info
$app->group('/leafdata', function() {

	$this->get('', function($REQ, $RES, $ARG) {

		$file = APP_ROOT . '/webroot/leafdata.md';
		$text = file_get_contents($file);

		$pd = new Parsedown();
		echo $pd->text($text);
	});
});

// LeafData Fake API Interface
$app->group('/leafdata/v2018', function() {

	$this->get('/areas', function($REQ, $RES, $ARG) {
		return $RES->withJSON(array(array(
			'_object_type' => $ARG['obj'],
			'global_id' => sprintf('BLD001.AR%06d', substr($_SERVER['REQUEST_TIME'], 0, -6)),
		)));
	});

	$this->get('/batches', function($REQ, $RES, $ARG) {
	});

	$this->get('/disposals', function($REQ, $RES, $ARG) {
	});

	$this->get('/inventory_types', function($REQ, $RES, $ARG) {
	});

	$this->get('/inventory', function($REQ, $RES, $ARG) {
	});

	$this->get('/inventory_adjustments', function($REQ, $RES, $ARG) {
	});

	$this->get('/inventory_transfers', function($REQ, $RES, $ARG) {
	});

	$this->get('/inventory_transfers_deliveries', function($REQ, $RES, $ARG) {
	});

	$this->get('/lab_results', function($REQ, $RES, $ARG) {
	});

	$this->get('/mmes', function($REQ, $RES, $ARG) {
	});

	$this->get('/plants', function($REQ, $RES, $ARG) {
	});

	$this->get('/sales', function($REQ, $RES, $ARG) {
	});

	$this->get('/strains', function($REQ, $RES, $ARG) {
	});

	$this->get('/taxes', function($REQ, $RES, $ARG) {
	});

	$this->get('/users', function($REQ, $RES, $ARG) {
	});

});

// METRC Info
$app->group('/metrc', function() {

	$this->get('', function($REQ, $RES, $ARG) {

		$file = APP_ROOT . '/webroot/metrc.md';
		$text = file_get_contents($file);

		$pd = new Parsedown();
		echo $pd->text($text);
	});

});

// METRC Fake Interface
// @todo Add METRC APIs Here
$app->group('/metrc/v2014', function($C) {

	$this->get('/facilities/v1', function($REQ, $RES, $ARG) {
	});

	$this->get('/harvests/v1/active', function($REQ, $RES, $ARG) {
	});

	$this->get('/items/v1/active', function($REQ, $RES, $ARG) {
	});

	$this->get('/labtests/v1/states', function($REQ, $RES, $ARG) {
	});

	$this->get('/packages/v1/active', function($REQ, $RES, $ARG) {
	});

	$this->get('/plantbatches/v1/active', function($REQ, $RES, $ARG) {
	});

	$this->get('/plants/v1/vegetative', function($REQ, $RES, $ARG) {
	});

	$this->get('/rooms/v1/active', function($REQ, $RES, $ARG) {
	});

	$this->get('/sales/v1/customertypes', function($REQ, $RES, $ARG) {
	});

	$this->get('/strains/v1/active', function($REQ, $RES, $ARG) {
	});

	$this->get('/transfers/v1/incoming', function($REQ, $RES, $ARG) {
	});

	$this->get('/transfers/v1/outgoing', function($REQ, $RES, $ARG) {
	});

	$this->get('/transfers/v1/rejected', function($REQ, $RES, $ARG) {
	});

	$this->get('/unitsofmeasure/v1/active', function($REQ, $RES, $ARG) {
	});


});

$app->run();
