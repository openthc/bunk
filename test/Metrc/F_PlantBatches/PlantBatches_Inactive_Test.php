<?php 

namespace Test\Metrc\F_PlantBatches;

class PlantBatches_Inactive_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}