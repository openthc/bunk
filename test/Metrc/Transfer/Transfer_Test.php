<?php

namespace Test\Metrc\Transfer;

class Transfer_Response_Test extends \Test\Metrc_Test
{
	
	protected $metrc_urls = array(
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

			if ($url['action'] == "GET") {
				$this->assertValidResponses($res, $url['url'], $url['action']);
			} else {
				$this->assertValidDelete($res, $url['url']);
			}
		}
	}
	
	
}