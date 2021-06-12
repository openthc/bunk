<?php 

namespace Test\Metrc\A_Harvests;

class E_Harvests_InActive_Test extends \Test\Metrc_Test {
	
	protected $path = 'harvests/v1/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}