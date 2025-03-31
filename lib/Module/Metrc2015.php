<?php
/**
 * METRC Group
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class Metrc2015 extends \OpenTHC\Module\Base
{
	/**
	 * @param \OpenTHC\App $a Slim Application
	 */
	function __invoke(\OpenTHC\App $a)
	{
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('metrc');
		});

		$a->get('/facilities/v1', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/facilities.php');
		});

		$a->get('/harvests/v1/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_active.php');
		});

		$a->get('/harvests/v1/inactive', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_active.php');
		});

		$a->get('/harvests/v1/onhold', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_active.php');
		});

		$a->get('/harvests/v1/{id}', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/harvests/harvest.php');
		});

		$a->get('/harvests/v1/waste/types', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/harvests/waste_types.php');
		});

		$a->post('/harvests/v1/create/packages', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/harvests/v1/create/packages/testing', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/harvests/v1/move', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/harvests/v1/removewaste', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/harvests/v1/rename', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/harvests/v1/finish', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/harvests/v1/unfinish', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/items/v1/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/items/active.php');
		});

		$a->get('/items/v1/categories', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/items/categories.php');
		});

		$a->get('/items/v1/brands', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/items/brands.php');
		});

		$a->post('/items/v1/create', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/items/v1/{id}', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/items/active.php');
		});

		$a->delete('/items/v1/{id}', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/items/v1/update', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/labtests/v1/states', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/labtests/states.php');
		});

		$a->get('/labtests/v1/types', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/labtests/types.php');
		});

		$a->get('/labtests/v1/results', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/labtests/results.php');
		});

		$a->put('/labtests/v1/results/release', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/labtests/v1/record', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/labtests/v1/labtestdocument', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/labtests/v1/release', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/locations/v1', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/locations/id.php');
		});

		$a->delete('/locations/v1', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/locations/v1/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/locations/active.php');
		});

		$a->get('/locations/v1/types', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/locations/types.php');
		});

		$a->post('/locations/v1/create', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/locations/v1/update', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/packages/v1/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
		});

		$a->get('/packages/v1/inactive', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/inactive.php');
		});

		$a->get('/packages/v1', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
		});

		$a->get('/packages/v1/label', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
		});

		$a->get('/packages/v1/onhold', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
		});

		$a->get('/packages/v1/types', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/types.php');
		});

		$a->get('/packages/v1/reasons', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/reasons.php');
		});

		$a->post('/packages/v1/create', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/packages/v1/create/testing', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/packages/v1/create/plantings', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/packages/v1/change/item', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/packages/v1/change/note', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/packages/v1/change/locations', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/packages/v1/adjust/reasons', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/packages/reasons.php');
		});

		$a->post('/packages/v1/adjust', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/packages/v1/finish', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/packages/v1/unfinish', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/packages/v1/remediate', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/patients/v1/active', function($REQ, $RES, $ARG) {
			return $RES->withJSON([]);
		});

		$a->get('/plantbatches/v1', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plant_batches/id.php');
		});

		$a->get('/plantbatches/v1/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plant_batches/active.php');
		});

		$a->get('/plantbatches/v1/inactive', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plant_batches/inactive.php');
		});

		$a->get('/plantbatches/v1/types', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plant_batches/types.php');
		});

		$a->post('/plantbatches/v1/createplantings', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plantbatches/v1/createpackages', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plantbatches/v1/split', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plantbatches/v1/create/packages/frommotherplant', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plantbatches/v1/changegrowthphase', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->put('/plantbatches/v1/moveplantbatches', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plantbatches/v1/additives', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plantbatches/v1/destroy', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/plants/v1', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/id.php');
		});

		$a->get('/plants/v1/label', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/id.php');
		});

		$a->get('/plants/v1/vegetative', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/vegetative.php');
		});

		$a->get('/plants/v1/flowering', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/flowering.php');
		});

		$a->get('/plants/v1/onhold', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/onhold.php');
		});

		$a->get('/plants/v1/inactive', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/inactive.php');
		});

		$a->map(['GET', 'POST'], '/plants/v1/additives', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/additives.php');
		});

		$a->get('/plants/v1/growthphases', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/growth_phases.php');
		});

		$a->get('/plants/v1/types', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/type.php');
		});

		$a->get('/plants/v1/waste/methods', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/methods.php');
		});

		$a->get('/plants/v1/waste/reasons', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/plants/reasons.php');
		});

		$a->post('/plants/v1/moveplants', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plants/v1/changegrowthphases', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plants/v1/destroyplants', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plants/v1/additives/bylocation', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plants/v1/create/plantings', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plants/v1/create/plantbatch/packages', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plants/v1/manicureplants', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->post('/plants/v1/harvestplants', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/sales/v1/customertypes', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/customer_types.php');
		});

		$a->get('/sales/v1/deliveries/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/active.php');
		});

		$a->get('/sales/v1/deliveries/inactive', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/inactive.php');
		});

		$a->map(['GET', 'POST', 'PUT', 'DELETE'],'/sales/v1/deliveries', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/deliveries.php');
		});

		$a->get('/sales/v1/delivery/returnreasons', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/return_reasons.php');
		});

		$a->put('/sales/v1/deliveries/complete', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->map(['GET', 'PUT', 'POST', 'DELETE'],'/sales/v1/receipts', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/receipts.php');
		});

		$a->get('/sales/v1/receipts/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/receipts_active.php');
		});

		$a->get('/sales/v1/receipts/inactive', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/receipts_active.php');
		});

		$a->map(['GET', 'POST', 'PUT', 'DELETE'],'/sales/v1/transactions', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/sales/transactions.php');
		});

		$a->map(['GET', 'DELETE'], '/strains/v1', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/strains/id.php');
		});

		$a->post('/strains/v1/update', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/strains/v1/active', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/strains/active.php');
		});

		$a->post('/strains/v1/create', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/transfers/v1/incoming', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/incoming.php');
		});

		$a->get('/transfers/v1/outgoing', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/outgoing.php');
		});

		$a->get('/transfers/v1/rejected', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/rejected.php');
		});

		$a->get('/transfers/v1/{delv_id}/deliveries', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/deliveries.php');
		});

		$a->get('/transfers/v1/delivery/{pack_id}/packages', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/delivery_packages.php');
		});

		$a->get('/transfers/v1/delivery/{whole_id}/packages/wholesale', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/packages_wholesale.php');
		});

		$a->get('/transfers/v1/delivery/package/{lab_id}/requiredlabtestbatches', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/required_labtest_batches.php');
		});

		$a->get('/transfers/v1/delivery/packages/states', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/packages_state.php');
		});

		$a->map(['POST', 'PUT', 'DELETE'], '/transfers/v1/delivery/external/incoming', function($REQ, $RES, $ARG) {
			return $RES->write("");
		});

		$a->get('/transfers/v1/templates/{id}/deliveries', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/templates_delivery.php');
		});

		$a->map(['GET','POST', 'PUT', 'DELETE'], '/transfers/v1/templates', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/templates.php');
		});


		$a->get('/transfers/v1/types', function($REQ, $RES, $ARG) {
			return require_once( APP_ROOT . '/lib/metrc/transfer/types.php');
		});

		$a->get('/unitsofmeasure/v1/active', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/metrc/unitsofmeasure.php');
		});

	}

}
