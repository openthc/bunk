<?php 

namespace Test\Metrc\H_Sales;

class C_Sales_Deliveries_Inactive_Test extends \Test\Metrc_Test {
	
	protected $path = 'sales/v1/deliveries/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
