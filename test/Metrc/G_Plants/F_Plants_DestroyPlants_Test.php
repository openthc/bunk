<?php 

namespace Test\Metrc\G_Plants;

class F_Plants_DestroyPlants_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/destroyplants';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}