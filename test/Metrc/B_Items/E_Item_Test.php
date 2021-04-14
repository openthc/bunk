<?php 

namespace Test\Metrc\B_Items;

class E_Item_Test extends \Test\Metrc_Test {

	protected $path =  'items/v1/3';
	
	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidResponse($res);
	}
}
