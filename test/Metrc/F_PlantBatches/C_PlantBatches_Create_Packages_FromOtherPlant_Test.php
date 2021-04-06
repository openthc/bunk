<?php 

namespace Test\Metrc\F_PlantBatches;

class C_PlantBatches_Create_Packages_FromOtherPlant_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/create/packages/frommotherplant';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}