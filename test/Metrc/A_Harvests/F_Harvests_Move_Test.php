<?php 

namespace Test\Metrc\A_Harvests;

class F_Harvests_Move_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/move';

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}
	
}