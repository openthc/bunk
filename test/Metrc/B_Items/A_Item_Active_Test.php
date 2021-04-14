<?php 

namespace Test\Metrc\B_Items;

class A_Item_Active_Test extends \Test\Metrc_Test {

	protected $path = 'items/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
