<?php 

namespace Test\Metrc\G_Plants;

class D_Plants_Create_PlantBatch_Packages_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/create/plantbatch/packages';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}