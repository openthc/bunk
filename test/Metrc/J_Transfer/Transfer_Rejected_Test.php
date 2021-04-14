<?php

namespace Test\Metrc\J_Transfer;

class Transfer_Rejected_Test extends \Test\Metrc_Test
{
	
	protected $path = 'transfers/v1/rejected';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
