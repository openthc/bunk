<?php 

namespace Test\Metrc\H_Sales;

class B_Sales_Deliveries_Complete_Test extends \Test\Metrc_Test {
	
	protected $path = 'sales/v1/deliveries/complete';

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}

}