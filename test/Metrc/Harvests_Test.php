<?php 

	namespace Test\Metrc;

	class Harvest_Test extends \Test\Metrc_Test {

		protected $metrc_urls = array(
			['action' => 'GET', 'url' => 'facilities/v1'],
			['action' => 'GET', 'url' =>'unitsofmeasure/v1/active'],
			['action' => 'GET', 'url' => 'harvests/v1/active'],
			['action' => 'GET', 'url' => 'harvests/v1/inactive'],
			['action' => 'GET', 'url' => 'harvests/v1/1'],
			['action' => 'GET', 'url' => 'harvests/v1/waste/types'],
			['action' => 'POST', 'url' => 'harvests/v1/create/packages', 'params' => require()],
			['action' => 'POST', 'url' => 'harvests/v1/create/packages/testing', 'params' => require()],
			['action' => 'PUT', 'url' => 'harvests/v1/move', 'params' => require()],
			['action' => 'POST', 'url' => 'harvests/v1/removewaste', 'params' => require()],
			['action' => 'PUT', 'url' => 'harvests/v1/finish', 'params' => require()],
			['action' => 'PUT', 'url' => 'harvests/v1/unfinish', 'params' => require()],
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