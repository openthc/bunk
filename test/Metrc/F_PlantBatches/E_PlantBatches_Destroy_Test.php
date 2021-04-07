<?php 

namespace Test\Metrc\F_PlantBatches;

class E_PlantBatches_Destroy_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/destroy';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}