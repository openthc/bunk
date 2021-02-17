<?php
/**
 * METRC Group
 */

namespace OpenTHC\Bunk\Module;

class METRC extends \OpenTHC\Module\Base
{
	/**
		@param $a Slim Application
	*/
	function __invoke($a)
	{
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('metrc');
		});

		$a->group('/v2015', function($C) {

			$this->get('/facilities/v1', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/facilities.php');
			});

			$this->get('/harvests/v1/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_active.php');
			});

			$this->get('/harvests/v1/inactive', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_active.php');
			});

			$this->get('/harvests/v1/onhold', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_active.php');
			});

			$this->get('/harvests/v1/{id}', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvest.php');
			});

			$this->get('/harvests/v1/waste/types', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/waste_types.php');
			});

			$this->post('/harvests/v1/create/packages', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/create_packages.php');
			});

			$this->post('/harvests/v1/create/packages/testing', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/create_packages.php');
			});

			$this->put('/harvests/v1/move', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/move.php');
			});

			$this->post('/harvests/v1/removewaste', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/remove_waste.php');
			});

			$this->put('/harvests/v1/move', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/move.php');
			});

			$this->put('/harvests/v1/finish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_finish.php');
			});

			$this->put('/harvests/v1/unfinish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_unfinish.php');
			});

			$this->get('/items/v1/{id}', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/items/active.php');
			});

			$this->get('/items/v1/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/items/active.php');
			});

			$this->get('/items/v1/categories', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/items/categories.php');
			});

			$this->get('/items/v1/brands', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/items/brands.php');
			});

			$this->post('/items/v1/create', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/items/create.php');
			});

			$this->post('/items/v1/update', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/items/update.php');
			});

			$this->get('/labtests/v1/states', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/labtests/states.php');
			});

			$this->get('/labtests/v1/types', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/labtests/types.php');
			});

			$this->get('/labtests/v1/results', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/labtests/results.php');
			});

			$this->post('/labtests/v1/record', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/labtests/record.php');
			});

			$this->put('/labtests/v1/labtestdocument', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/labtests/labtestdocument.php');
			});

			$this->put('/labtests/v1/release', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/labtests/release.php');
			});

			$this->get('/locations/v1/', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/locations/id.php');
			});

			$this->get('/locations/v1/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/locations/active.php');
			});

			$this->get('/locations/v1/types', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/locations/types.php');
			});

			$this->post('/locations/v1/create', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/locations/create.php');
			});

			$this->get('/locations/v1/update', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/locations/update.php');
			});

			$this->get('/packages/v1/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
			});

			$this->get('/packages/v1/inactive', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
			});

			$this->get('/packages/v1/label', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
			});
			
			$this->get('/packages/v1/onhold', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
			});	

			$this->get('/packages/v1/types', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/types.php');
			});

			$this->get('/packages/v1/reasons', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/reasons.php');
			});

			$this->post('/packages/v1/create', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/create.php');
			});

			$this->post('/packages/v1/testing', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/create.php');
			});

			$this->post('/packages/v1/create/plantings', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/plantings.php');
			});

			$this->post('/packages/v1/change/items', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/item.php');
			});

			$this->put('/packages/v1/change/note', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/note.php');
			});

			$this->post('/packages/v1/change/locations', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/locations.php');
			});

			$this->post('/packages/v1/adjust', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/adjust.php');
			});

			$this->post('/packages/v1/change/finish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/finish.php');
			});

			$this->post('/packages/v1/change/unfinish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/unfinish.php');
			});

			$this->post('/packages/v1/change/remediate', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/remediate.php');
			});

			$this->get('/plantbatches/v1/', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/id.php');
			});

			$this->get('/plants/v1/vegetative', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/rooms/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/sales/v1/customertypes', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/strains/v1/active', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/transfers/v1/incoming', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/transfers/v1/outgoing', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/transfers/v1/rejected', function($REQ, $RES, $ARG) {
				die("{$_SERVER['REQUEST_URI']} is not implemented yet");
			});

			$this->get('/unitsofmeasure/v1/active', function($REQ, $RES, $ARG) {
				return require_once(APP_ROOT . '/lib/metrc/unitsofmeasure.php');
			});

		});

	}

}

