<?php 

namespace Test\Metrc\B_Items;

class D_Item_Categories_Test extends \Test\Metrc_Test {

	protected $path =  'items/v1/create';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}