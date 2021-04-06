<?php 

namespace Test\Metrc\G_Plants;

class I_Plants_HarvestPlants_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/harvestplants';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}