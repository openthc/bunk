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
		);


		function test_valid_response() {
			foreach ($this->$metrc_urls as $url) {
				$res = $this->ghc->request($url[0], $url[1]);

				if ($url[0] <> "DELETE"){
					$this->assertValidResponse($res);
				} else {
					$this->assertValidDelete($res);
				}
			}
		}
		
	}