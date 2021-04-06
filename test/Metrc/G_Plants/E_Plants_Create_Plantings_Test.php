<?php 

namespace Test\Metrc\G_Plants;

class E_Plants_Create_Plantings_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/create/plantings';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}