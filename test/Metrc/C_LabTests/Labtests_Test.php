<?php 

namespace Test\Metrc\C_LabTests;

class Lab_Test extends \Test\Metrc_Test {

	protected $metrc_urls = array(
		['action' => 'GET', 'url' => 'labtests/v1/states'],
		['action' => 'GET', 'url' => 'labtests/v1/types'],
		['action' => 'GET', 'url' => 'labtests/v1/results'],
		['action' => 'PUT', 'url' => 'labtests/v1/results/release'],
		['action' => 'POST', 'url' => 'labtests/v1/record'],
		['action' => 'PUT', 'url' => 'labtests/v1/labtestdocument'],
		['action' => 'PUT', 'url' => 'labtests/v1/release'],
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