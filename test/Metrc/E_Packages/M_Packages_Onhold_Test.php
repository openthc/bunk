<?php 

namespace Test\Metrc\E_Packages;

class M_Packages_Onhold_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/onhold';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
