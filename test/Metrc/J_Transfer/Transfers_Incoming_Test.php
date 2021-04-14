<?php

namespace Test\Metrc\J_Transfer;

class Transfer_Incoming_Test extends \Test\Metrc_Test
{
	
	protected $path = 'transfers/v1/incoming';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
