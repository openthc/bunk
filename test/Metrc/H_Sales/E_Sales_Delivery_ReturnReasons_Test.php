<?php 

namespace Test\Metrc\H_Sales;

class E_Sales_Deliveries_ReturnReasons_Test extends \Test\Metrc_Test {
	
	protected $path = 'sales/v1/delivery/returnreasons';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
