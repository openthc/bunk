<?php 

	namespace Test\Metrc;

	class PlantBatches_Test extends \Test\Metrc_Test {

		protected $metrc_urls = array(
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
		);

		
		function test_valid_response() {
			foreach ($this->metrc_urls as $url) {
				$res = $this->ghc->request($url['action'], $url['url']);

				if ($url['action'] == "GET") {
					$this->assertValidResponses($res, $url['url'], $url['action']);
				} else {
					$this->assertValidDelete($res, $url['url']);
				}
			}
		}
	}