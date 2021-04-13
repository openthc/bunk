<?php 

namespace Test\Metrc\E_Packages;

class B_Packages_Adjust_Reasons_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/adjust/reasons';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}