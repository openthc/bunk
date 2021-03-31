<?php 

namespace Test\Metrc\A_Harvests;

class I_Harvests_Unfinish_Test extends \Test\Metrc_Test {
	
	protected $path = 'harvests/v1/unfinish';

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}
	
}