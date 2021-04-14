<?php 

namespace Test\Metrc\B_Items;

class B_Item_Brand_Test extends \Test\Metrc_Test {

	protected $path = 'items/v1/brands';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}