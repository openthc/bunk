<?php 

namespace Test\Metrc\G_Plants;

class H_Plants_GrowthPhases_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/growthphases';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}