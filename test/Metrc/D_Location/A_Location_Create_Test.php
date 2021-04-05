<?php 

namespace Test\Metrc\D_Location;

class A_Location_Test extends \Test\Metrc_Test {

	protected $path = 'locations/v1/create';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}