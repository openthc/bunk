<?php 

namespace Test\Metrc\E_Packages;

class G_Packages_Create_Plantings_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/create/plantings';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}