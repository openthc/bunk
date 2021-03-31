<?php 

namespace Test\Metrc\E_Packages;

class Packages_Test extends \Test\Metrc_Test {

	protected $metrc_urls = array(
		['action' => 'GET', 'url' => 'packages/v1/active'],
		['action' => 'GET', 'url' => 'packages/v1/inactive'],
		['action' => 'GET', 'url' => 'packages/v1'],
		['action' => 'GET', 'url' => 'packages/v1/label'],
		['action' => 'GET', 'url' => 'packages/v1/onhold'],
		['action' => 'GET', 'url' => 'packages/v1/reasons'],
		['action' => 'POST', 'url' => 'packages/v1/create'],
		['action' => 'POST', 'url' => 'packages/v1/create/testing'],
		['action' => 'POST', 'url' => 'packages/v1/create/plantings'],
		['action' => 'POST', 'url' => 'packages/v1/change/item'],
		['action' => 'PUT', 'url' => 'packages/v1/change/note'],
		['action' => 'POST', 'url' => 'packages/v1/change/locations'],
		['action' => 'GET', 'url' => 'packages/v1/adjust/reasons'],
		['action' => 'POST', 'url' => 'packages/v1/adjust'],
		['action' => 'POST', 'url' => 'packages/v1/finish'],
		['action' => 'POST', 'url' => 'packages/v1/unfinish'],
		['action' => 'POST', 'url' => 'packages/v1/remediate'],
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