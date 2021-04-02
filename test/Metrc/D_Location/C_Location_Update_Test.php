<?php 

namespace Test\Metrc\D_Location;

class C_Location_Test extends \Test\Metrc_Test {

	protected $path = 'locations/v1/update';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
	
}