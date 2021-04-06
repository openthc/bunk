<?php 

namespace Test\Metrc\G_Plants;

class R_Plants_Waste_Methods_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/waste/methods';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}