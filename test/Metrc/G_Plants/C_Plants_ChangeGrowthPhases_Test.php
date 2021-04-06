<?php 

namespace Test\Metrc\G_Plants;

class C_Plants_ChangeGrowthPhases_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/changegrowthphases';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}