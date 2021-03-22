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

			$this->put('/harvests/v1/finish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_finish.php');
			});

			$this->put('/harvests/v1/unfinish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/harvests/harvests_unfinish.php');
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

			$this->get('/items/v1/{id}', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/items/active.php');
			});

			$this->delete('/items/v1/{id}', function($REQ, $RES, $ARG) {
				return "";
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

			$this->put('/labtests/v1/results/release', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/labtests/release.php');
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

			$this->get('/locations/v1', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/locations/id.php');
			});

			$this->delete('/locations/v1', function($REQ, $RES, $ARG) {
				return "";
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

			$this->post('/locations/v1/update', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/locations/update.php');
			});

			$this->get('/packages/v1/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
			});

			$this->get('/packages/v1/inactive', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/active.php');
			});

			$this->get('/packages/v1', function($REQ, $RES, $ARG) {
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

			$this->post('/packages/v1/create/testing', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/create.php');
			});

			$this->post('/packages/v1/create/plantings', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/plantings.php');
			});

			$this->post('/packages/v1/change/item', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/item.php');
			});

			$this->put('/packages/v1/change/note', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/note.php');
			});

			$this->post('/packages/v1/change/locations', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/locations.php');
			});

			$this->get('/packages/v1/adjust/reasons', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/reasons.php');
			});

			$this->post('/packages/v1/adjust', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/adjust.php');
			});

			$this->post('/packages/v1/finish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/finish.php');
			});

			$this->post('/packages/v1/unfinish', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/unfinish.php');
			});

			$this->post('/packages/v1/remediate', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/packages/remediate.php');
			});

			$this->get('/plantbatches/v1', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/id.php');
			});

			$this->get('/plantbatches/v1/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/active.php');
			});

			$this->get('/plantbatches/v1/inactive', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/active.php');
			});

			$this->get('/plantbatches/v1/types', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/types.php');
			});

			$this->post('/plantbatches/v1/createplantings', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/create_plantings.php');
			});

			$this->post('/plantbatches/v1/createpackages', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/create_packages.php');
			});
			
			$this->post('/plantbatches/v1/split', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/split.php');
			});

			$this->post('/plantbatches/v1/create/packages/frommotherplant', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/from_mother_plant.php');
			});

			$this->post('/plantbatches/v1/changegrowthphase', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/change_growth_phase.php');
			});

			$this->put('/plantbatches/v1/moveplantbatches', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/move_plant_batches.php');
			});

			$this->post('/plantbatches/v1/additives', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/additives.php');
			});

			$this->post('/plantbatches/v1/destroy', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plant_batches/destroy.php');
			});

			$this->get('/plants/v1', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/id.php');
			});

			$this->get('/plants/v1/label', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/id.php');
			});

			$this->get('/plants/v1/vegetative', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/vegetative.php');
			});
			
			$this->get('/plants/v1/flowering', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/flowering.php');
			});

			$this->get('/plants/v1/onhold', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/onhold.php');
			});

			$this->get('/plants/v1/inactive', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/inactive.php');
			});

			$this->map(['GET', 'POST'], '/plants/v1/additives', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/additives.php');
			});

			$this->get('/plants/v1/growthphases', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/growth_phases.php');
			});

			$this->get('/plants/v1/types', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/type.php');
			});

			$this->get('/plants/v1/waste/methods', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/methods.php');
			});

			$this->get('/plants/v1/waste/reasons', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/reasons.php');
			});

			$this->post('/plants/v1/moveplants', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/move_plants.php');
			});

			$this->post('/plants/v1/changegrowthphases', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/change_growth_phases.php');
			});

			$this->post('/plants/v1/destroyplants', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/destroy_plants.php');
			});

			$this->post('/plants/v1/additives/bylocation', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/by_location.php');
			});

			$this->post('/plants/v1/create/plantings', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/plantings.php');
			});

			$this->post('/plants/v1/create/plantbatch/packages', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/packages.php');
			});

			$this->post('/plants/v1/manicureplants', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/manicure_plant.php');
			});

			$this->post('/plants/v1/harvestplants', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/plants/harvest_plants.php');
			});

			$this->get('/sales/v1/customertypes', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/customer_types.php');
			});

			$this->get('/sales/v1/deliveries/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/active.php');
			});

			$this->get('/sales/v1/deliveries/inactive', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/inactive.php');
			});

			$this->map(['GET', 'POST', 'PUT', 'DELETE'],'/sales/v1/deliveries', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/deliveries.php');
			});

			$this->get('/sales/v1/delivery/returnreasons', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/return_reasons.php');
			});

			$this->put('/sales/v1/deliveries/complete', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/complete.php');
			});

			$this->map(['GET', 'PUT', 'POST', 'DELETE'],'/sales/v1/receipts', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/receipts.php');
			});

			$this->get('/sales/v1/receipts/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/receipts_active.php');
			});

			$this->get('/sales/v1/receipts/inactive', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/receipts_active.php');
			});

			$this->map(['GET', 'POST', 'PUT', 'DELETE'],'/sales/v1/transactions', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/sales/transactions.php');
			});

			$this->map(['GET', 'DELETE'], '/strains/v1', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/strains/id.php');
			});

			$this->post('/strains/v1/update', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/strains/update.php');
			});

			$this->get('/strains/v1/active', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/strains/active.php');
			});

			$this->post('/strains/v1/create', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/strains/create.php');
			});

			$this->get('/transfers/v1/incoming', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/incoming.php');
			});

			$this->get('/transfers/v1/outgoing', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/outgoing.php');
			});

			$this->get('/transfers/v1/rejected', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/rejected.php');
			});

			$this->get('/transfers/v1/{delv_id}/deliveries', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/deliveries.php');
			});

			$this->get('/transfers/v1/delivery/{pack_id}/packages', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/delivery_packages.php');
			});

			$this->get('/transfers/v1/delivery/{whole_id}/packages/wholesale', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/packages_wholesale.php');
			});

			$this->get('/transfers/v1/delivery/package/{lab_id}/requiredlabtestbatches', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/required_labtest_batches.php');
			});

			$this->get('/transfers/v1/delivery/packages/states', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/packages_state.php');
			});

			$this->map(['POST', 'PUT', 'DELETE'], '/transfers/v1/delivery/external/incoming', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/external_incoming.php');
			});

			$this->get('/transfers/v1/templates/{id}/deliveries', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/templates_delivery.php');
			});
			
			$this->map(['GET','POST', 'PUT', 'DELETE'], '/transfers/v1/templates', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/templates.php');
			});


			$this->get('/transfers/v1/types', function($REQ, $RES, $ARG) {
				return require_once( APP_ROOT . '/lib/metrc/transfer/types.php');
			});

			$this->get('/unitsofmeasure/v1/active', function($REQ, $RES, $ARG) {
				return require_once(APP_ROOT . '/lib/metrc/unitsofmeasure.php');
			});

		});

	}

}

