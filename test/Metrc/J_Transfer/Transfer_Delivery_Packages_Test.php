<?php

namespace Test\Metrc\J_Transfer;

class Transfer_Delivery_Packages_Test extends \Test\Metrc_Test
{
	
	protected $path = 'transfers/v1/delivery/{pack_id}/packages';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}