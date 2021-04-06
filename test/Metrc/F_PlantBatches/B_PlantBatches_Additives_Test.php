<?php 

namespace Test\Metrc\F_PlantBatches;

class B_PlantBatches_Additives_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/additives';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}