<?php 

namespace Test\Metrc\A_Harvests;

class D_Harvests_Waste_Types_Test extends \Test\Metrc_Test {
	
	protected $path = 'harvests/v1/finish';

	function test_post()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}
	
}