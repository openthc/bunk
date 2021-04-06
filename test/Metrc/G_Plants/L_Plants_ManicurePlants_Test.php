<?php 

namespace Test\Metrc\G_Plants;

class L_Plants_ManicurePlants_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/manicureplants';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}