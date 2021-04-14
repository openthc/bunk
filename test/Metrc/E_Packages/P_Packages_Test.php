<?php 

namespace Test\Metrc\E_Packages;

class P_Packages_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}