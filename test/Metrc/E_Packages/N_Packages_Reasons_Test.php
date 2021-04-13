<?php 

namespace Test\Metrc\E_Packages;

class N_Packages_Reasons_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/reasons';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}