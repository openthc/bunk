<?php 

namespace Test\Metrc\E_Packages;

class D_Packages_Change_Item_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/change/item';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}