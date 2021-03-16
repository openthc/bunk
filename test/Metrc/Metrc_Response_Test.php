<?php

	namespace Test\Metrc;
	class Metrc_Response_Test extends \Test\Metrc_TestCase
	{
		
		protected $metrc_urls = array(
			['action' => 'GET', 'url' =>'/facilities/v1'],
			['action' => 'GET', 'url' =>'/unitsofmeasure/v1/active'],
			['action' => 'GET', 'url' => '/harvests/v1/active'],
			['action' => 'GET', 'url' => '/harvests/v1/inactive'],
			['action' => 'GET', 'url' => '/harvests/v1/{id}'],
			['action' => 'GET', 'url' => '/harvests/v1/waste/types'],
			['action' => 'POST', 'url' => '/harvests/v1/create/packages'],
			['action' => 'POST', 'url' => '/harvests/v1/create/packages/testing'],
			['action' => 'PUT', 'url' => '/harvests/v1/move'],
			['action' => 'POST', 'url' => '/harvests/v1/removewaste'],
			['action' => 'PUT', 'url' => '/harvests/v1/finish'],
			['action' => 'PUT', 'url' => '/harvests/v1/unfinish'],
			['action' => 'GET', 'url' => '/items/v1/active'],
			['action' => 'GET', 'url' => '/items/v1/categories'],
			['action' => 'GET', 'url' => '/items/v1/brands'],
			['action' => 'POST', 'url' => '/items/v1/create'],
			['action' => 'GET', 'url' => '/items/v1/{id}'],
			['action' => 'DELETE', 'url' => '/items/v1/{id}'],
			['action' => 'POST', 'url' => '/items/v1/update'],
			['action' => 'GET', 'url' => '/labtests/v1/states'],
			['action' => 'GET', 'url' => '/labtests/v1/types'],
			['action' => 'GET', 'url' => '/labtests/v1/results'],
			['action' => 'PUT', 'url' => '/labtests/v1/results/release'],
			['action' => 'POST', 'url' => '/labtests/v1/record'],
			['action' => 'PUT', 'url' => '/labtests/v1/labtestdocument'],
			['action' => 'PUT', 'url' => '/labtests/v1/release'],
			['action' => 'GET', 'url' => '/locations/v1/'],
			['action' => 'DELETE', 'url' => '/locations/v1/'],
			['action' => 'GET', 'url' => '/locations/v1/create'],
			['action' => 'POST', 'url' => '/locations/v1/update'],
			['action' => 'GET', 'url' => '/packages/v1/active'],
			['action' => 'GET', 'url' => '/packages/v1/inactive'],
			['action' => 'GET', 'url' => '/packages/v1'],
			['action' => 'GET', 'url' => '/packages/v1/label'],
			['action' => 'GET', 'url' => '/packages/v1/onhold'],
			['action' => 'GET', 'url' => '/packages/v1/reasons'],
			['action' => 'POST', 'url' => '/packages/v1/create'],
			['action' => 'POSTT', 'url' => '/packages/v1/create/testing'],
			['action' => 'POST', 'url' => '/packages/v1/create/plantings'],
			['action' => 'POST', 'url' => '/packages/v1/change/item'],
			['action' => 'PUT', 'url' => '/packages/v1/change/note'],
			['action' => 'POST', 'url' => '/packages/v1/change/locations'],
			['action' => 'GET', 'url' => '/packages/v1/adjust/reasons'],
			['action' => 'POST', 'url' => '/packages/v1/adjust'],
			['action' => 'POST', 'url' => '/packages/v1/finish'],
			['action' => 'POST', 'url' => '/packages/v1/unfinish'],
			['action' => 'POST', 'url' => '/packages/v1/remediate'],
			['action' => 'GET', 'url' => '/plantbatches/v1'],
			['action' => 'GET', 'url' => '/plantbatches/v1/active'],
			['action' => 'GET', 'url' => '/plantbatches/v1/inactive'],
			['action' => 'GET', 'url' => '/plantbatches/v1/types'],
			['action' => 'POST', 'url' => '/plantbatches/v1/createplantings'],
			['action' => 'POST', 'url' => '/plantbatches/v1/split'],
			['action' => 'POST', 'url' => '/plantbatches/v1/create/packages/frommotherplant'],
			['action' => 'PUT', 'url' => '/plantbatches/v1/moveplantbatches'],
			['action' => 'POST', 'url' => '/plantbatches/v1/additives'],
			['action' => 'POST', 'url' => '/plantbatches/v1/destroy'],
			['action' => 'GET', 'url' => '/plants/v1'],
			['action' => 'GET', 'url' => '/plants/v1/label'],
			['action' => 'GET', 'url' => '/plants/v1/vegatative'],
			['action' => 'GET', 'url' => '/plants/v1/flowering'],
			['action' => 'GET', 'url' => '/plants/v1/onhold'],
			['action' => 'GET', 'url' => '/plants/v1/inactive'],
			['action' => 'GET', 'url' => '/plants/v1/additives'],
			['action' => 'POST', 'url' => '/plants/v1/additives'],
			['action' => 'GET', 'url' => '/plants/v1/growthphases'],
			['action' => 'GET', 'url' => '/plants/v1/types'],
			['action' => 'GET', 'url' => '/plants/v1/waste/methods'],
			['action' => 'GET', 'url' => '/plants/v1/waste/reasons'],
			['action' => 'POST', 'url' => '/plants/v1/moveplants'],
			['action' => 'POST', 'url' => '/plants/v1/changegrowthphases'],
			['action' => 'POST', 'url' => '/plants/v1/destroyplants'],
			['action' => 'POST', 'url' => '/plants/v1/additives/bylocation'],
			['action' => 'POST', 'url' => '/plants/v1/create/plantings'],
			['action' => 'POST', 'url' => '/plants/v1/create/plantbatch/packages'],
			['action' => 'POST', 'url' => '/plants/v1/manicureplants'],
			['action' => 'POST', 'url' => '/plants/v1/harvestplants'],
			['action' => 'GET', 'url' => '/sales/v1/customertypes'],
			['action' => 'GET', 'url' => '/sales/v1/deliveries/active'],
			['action' => 'GET', 'url' => '/sales/v1/deliveries/inactive'],
			['action' => 'GET', 'url' => '/sales/v1/deliveries'],
			['action' => 'POST', 'url' => '/sales/v1/deliveries'],
			['action' => 'PUT', 'url' => '/sales/v1/deliveries'],
			['action' => 'DELETE', 'url' => '/sales/v1/deliveries'],
		);


		function test_valid_response() {
			foreach ($this->metrc_urls as $url) {
				$res = $this->ghc->request($url['action'], $url['url']);

				if ($url['action'] <> "DELETE"){
					$this->assertValidResponse($res);
				} else {
					$this->assertValidDelete($res);
				}
			}
		}
		
	}