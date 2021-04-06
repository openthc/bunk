<?php 

namespace Test\Metrc\I_Strains;

class B_Strains_Create_Test extends \Test\Metrc_Test {

	protected $path = 'strains/v1/create';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}