<?php 

namespace Test\Metrc\E_Packages;

class H_Packages_Create_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/create';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}