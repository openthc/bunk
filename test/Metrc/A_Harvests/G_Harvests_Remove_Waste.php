<?php 

namespace Test\Metrc\A_Harvests;

class G_Harvests_Remove_Waste_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/waste/types';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
	
}