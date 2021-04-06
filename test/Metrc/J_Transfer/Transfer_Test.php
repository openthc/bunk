<?php

namespace Test\Metrc\J_Transfer;

class Transfer_Incoming_Test extends \Test\Metrc_Test
{
	
	protected $path = 'transfers/v1/incoming';

	protected $metrc_urls = array(
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

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}