<?php

namespace Test\Metrc\J_Transfer;

class Transfer_Delivery_Packages_States_Test extends \Test\Metrc_Test
{
	
	protected $path = 'transfers/v1/delivery/packages/states';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}