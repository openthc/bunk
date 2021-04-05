<?php 

namespace Test\Metrc\F_PlantBatches;

class PlantBatches_MovePlantBatches_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/moveplantbatches';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}