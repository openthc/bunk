<?php 

namespace Test\Metrc\E_Packages;

class A_Packages_Active_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}