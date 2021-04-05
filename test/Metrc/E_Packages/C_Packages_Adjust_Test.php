<?php 

namespace Test\Metrc\E_Packages;

class C_Packages_Adjust_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/adjust';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}