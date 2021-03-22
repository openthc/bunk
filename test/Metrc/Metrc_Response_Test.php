<?php

	namespace Test\Metrc;
	class Metrc_Response_Test extends \Test\Metrc_TestCase
	{
		
		protected $metrc_urls = array(
			['action' => 'GET', 'url' => 'facilities/v1'],
			['action' => 'GET', 'url' =>'unitsofmeasure/v1/active'],
			['action' => 'GET', 'url' => 'harvests/v1/active'],
			['action' => 'GET', 'url' => 'harvests/v1/inactive'],
			['action' => 'GET', 'url' => 'harvests/v1/1'],
			['action' => 'GET', 'url' => 'harvests/v1/waste/types'],
			['action' => 'POST', 'url' => 'harvests/v1/create/packages'],
			['action' => 'POST', 'url' => 'harvests/v1/create/packages/testing'],
			['action' => 'PUT', 'url' => 'harvests/v1/move'],
			['action' => 'POST', 'url' => 'harvests/v1/removewaste'],
			['action' => 'PUT', 'url' => 'harvests/v1/finish'],
			['action' => 'PUT', 'url' => 'harvests/v1/unfinish'],
			['action' => 'GET', 'url' => 'items/v1/active'],
			['action' => 'GET', 'url' => 'items/v1/categories'],
			['action' => 'GET', 'url' => 'items/v1/brands'],
			['action' => 'POST', 'url' => 'items/v1/create'],
			['action' => 'GET', 'url' => 'items/v1/{id}'],
			['action' => 'DELETE', 'url' => 'items/v1/{id}'],
			['action' => 'POST', 'url' => 'items/v1/update'],
			['action' => 'GET', 'url' => 'labtests/v1/states'],
			['action' => 'GET', 'url' => 'labtests/v1/types'],
			['action' => 'GET', 'url' => 'labtests/v1/results'],
			['action' => 'PUT', 'url' => 'labtests/v1/results/release'],
			['action' => 'POST', 'url' => 'labtests/v1/record'],
			['action' => 'PUT', 'url' => 'labtests/v1/labtestdocument'],
			['action' => 'PUT', 'url' => 'labtests/v1/release'],
			['action' => 'GET', 'url' => 'locations/v1/'],
			['action' => 'DELETE', 'url' => 'locations/v1/'],
			['action' => 'GET', 'url' => 'locations/v1/create'],
			['action' => 'POST', 'url' => 'locations/v1/update'],
			['action' => 'GET', 'url' => 'packages/v1/active'],
			['action' => 'GET', 'url' => 'packages/v1/inactive'],
			['action' => 'GET', 'url' => 'packages/v1'],
			['action' => 'GET', 'url' => 'packages/v1/label'],
			['action' => 'GET', 'url' => 'packages/v1/onhold'],
			['action' => 'GET', 'url' => 'packages/v1/reasons'],
			['action' => 'POST', 'url' => 'packages/v1/create'],
			['action' => 'POSTT', 'url' => 'packages/v1/create/testing'],
			['action' => 'POST', 'url' => 'packages/v1/create/plantings'],
			['action' => 'POST', 'url' => 'packages/v1/change/item'],
			['action' => 'PUT', 'url' => 'packages/v1/change/note'],
			['action' => 'POST', 'url' => 'packages/v1/change/locations'],
			['action' => 'GET', 'url' => 'packages/v1/adjust/reasons'],
			['action' => 'POST', 'url' => 'packages/v1/adjust'],
			['action' => 'POST', 'url' => 'packages/v1/finish'],
			['action' => 'POST', 'url' => 'packages/v1/unfinish'],
			['action' => 'POST', 'url' => 'packages/v1/remediate'],
			['action' => 'GET', 'url' => 'plantbatches/v1'],
			['action' => 'GET', 'url' => 'plantbatches/v1/active'],
			['action' => 'GET', 'url' => 'plantbatches/v1/inactive'],
			['action' => 'GET', 'url' => 'plantbatches/v1/types'],
			['action' => 'POST', 'url' => 'plantbatches/v1/createplantings'],
			['action' => 'POST', 'url' => 'plantbatches/v1/split'],
			['action' => 'POST', 'url' => 'plantbatches/v1/create/packages/frommotherplant'],
			['action' => 'PUT', 'url' => 'plantbatches/v1/moveplantbatches'],
			['action' => 'POST', 'url' => 'plantbatches/v1/additives'],
			['action' => 'POST', 'url' => 'plantbatches/v1/destroy'],
			['action' => 'GET', 'url' => 'plants/v1'],
			['action' => 'GET', 'url' => 'plants/v1/label'],
			['action' => 'GET', 'url' => 'plants/v1/vegatative'],
			['action' => 'GET', 'url' => 'plants/v1/flowering'],
			['action' => 'GET', 'url' => 'plants/v1/onhold'],
			['action' => 'GET', 'url' => 'plants/v1/inactive'],
			['action' => 'GET', 'url' => 'plants/v1/additives'],
			['action' => 'POST', 'url' => 'plants/v1/additives'],
			['action' => 'GET', 'url' => 'plants/v1/growthphases'],
			['action' => 'GET', 'url' => 'plants/v1/types'],
			['action' => 'GET', 'url' => 'plants/v1/waste/methods'],
			['action' => 'GET', 'url' => 'plants/v1/waste/reasons'],
			['action' => 'POST', 'url' => 'plants/v1/moveplants'],
			['action' => 'POST', 'url' => 'plants/v1/changegrowthphases'],
			['action' => 'POST', 'url' => 'plants/v1/destroyplants'],
			['action' => 'POST', 'url' => 'plants/v1/additives/bylocation'],
			['action' => 'POST', 'url' => 'plants/v1/create/plantings'],
			['action' => 'POST', 'url' => 'plants/v1/create/plantbatch/packages'],
			['action' => 'POST', 'url' => 'plants/v1/manicureplants'],
			['action' => 'POST', 'url' => 'plants/v1/harvestplants'],
			['action' => 'GET', 'url' => 'sales/v1/customertypes'],
			['action' => 'GET', 'url' => 'sales/v1/deliveries/active'],
			['action' => 'GET', 'url' => 'sales/v1/deliveries/inactive'],
			['action' => 'GET', 'url' => 'sales/v1/deliveries'],
			['action' => 'POST', 'url' => 'sales/v1/deliveries'],
			['action' => 'PUT', 'url' => 'sales/v1/deliveries'],
			['action' => 'DELETE', 'url' => 'sales/v1/deliveries'],
			['action' => 'GET', 'url' => 'sales/v1/returnreasons'],
			['action' => 'PUT', 'url' => 'sales/v1/deliveries/complete'],
			['action' => 'GET', 'url' => 'sales/v1/receipts'],
			['action' => 'POST', 'url' => 'sales/v1/receipts'],
			['action' => 'PUT', 'url' => 'sales/v1/receipts'],
			['action' => 'DELETE', 'url' => 'sales/v1/receipts'],
			['action' => 'GET', 'url' => 'sales/v1/receipts/active'],
			['action' => 'GET', 'url' => 'sales/v1/receipts/inactive'],
			['action' => 'POST', 'url' => 'sales/v1/transactions'],
			['action' => 'PUT', 'url' => 'sales/v1/transactions'],
			['action' => 'DELETE', 'url' => 'sales/v1/transactions'],
			['action' => 'GET', 'url' => 'strains/v1'],
			['action' => 'DELETE', 'url' => 'strains/v1'],
			['action' => 'POST', 'url' => 'strains/v1/update'],
			['action' => 'GET', 'url' => 'strains/v1/active'],
			['action' => 'POST', 'url' => 'strains/v1/create'],
			['action' => 'GET', 'url' => 'transfers/v1/incoming'],
			['action' => 'GET', 'url' => 'transfers/v1/outgoing'],
			['action' => 'GET', 'url' => 'transfers/v1/rejected'],
			['action' => 'GET', 'url' => 'transfers/v1/{incoming}/deliveries'],
			['action' => 'GET', 'url' => 'transfers/v1/delivery/{pack_id}/packages'],
			['action' => 'GET', 'url' => 'transfers/v1/delivery/packages/states'],
			['action' => 'POST', 'url' => 'transfers/v1/delivery/external/incoming'],
			['action' => 'PUT', 'url' => 'transfers/v1/delivery/external/incoming'],
			['action' => 'DELETE', 'url' => 'transfers/v1/delivery/external/incoming'],
			['action' => 'GET', 'url' => 'transfers/v1/templates/{id}/deliveries'],
			['action' => 'POST', 'url' => 'transfers/v1/templates'],
			['action' => 'PUT', 'url' => 'transfers/v1/templates'],
			['action' => 'DELETE', 'url' => 'transfers/v1/templates'],
			['action' => 'GET', 'url' => 'transfers/v1/types'],
		);


		function test_valid_response() {
			foreach ($this->metrc_urls as $url) {
				$res = $this->ghc->request($url['action'], $url['url']);

				if ($url['action'] <> "DELETE") {
					$this->assertValidResponses($res, $url['url']);
				} else {
					$this->assertValidDelete($res);
				}
			}
		}
		
	}