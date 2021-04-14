<?php 

namespace Test\Metrc\E_Packages;

class L_Packages_Label_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/label';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
