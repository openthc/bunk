<?php 

namespace Test\Metrc\F_PlantBatches;

class D_PlantBatches_CreatePlantings_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/createplantings';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}