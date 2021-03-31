<?php 

namespace Test\Metrc\D_Location;

class Location_Test extends \Test\Metrc_Test {

	protected $metrc_urls = array(
		['action' => 'GET', 'url' => 'locations/v1'],
		['action' => 'DELETE', 'url' => 'locations/v1'],
		['action' => 'POST', 'url' => 'locations/v1/create'],
		['action' => 'POST', 'url' => 'locations/v1/update'],
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