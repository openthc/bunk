<?php 

namespace Test\Metrc\I_Strains;

class D_Strains_Update_Test extends \Test\Metrc_Test {

	protected $path = 'strains/v1/update';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}