<?php 

namespace Test\Metrc\G_Plants;

class N_Plants_Onhold_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/onhold';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}