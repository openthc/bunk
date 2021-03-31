<?php 

namespace Test\Metrc\G_Plants;

class Plants_Test extends \Test\Metrc_Test {

	protected $metrc_urls = array(
		['action' => 'GET', 'url' => 'plants/v1'],
		['action' => 'GET', 'url' => 'plants/v1/label'],
		['action' => 'GET', 'url' => 'plants/v1/vegetative'],
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