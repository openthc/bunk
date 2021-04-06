<?php 

namespace Test\Metrc\F_PlantBatches;

class H_PlantBatches_Split_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/split';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}