<?php 

namespace Test\Metrc\B_Items;

class F_Item_Update_Test extends \Test\Metrc_Test {

	protected $path =  'items/v1/update';
	
	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}