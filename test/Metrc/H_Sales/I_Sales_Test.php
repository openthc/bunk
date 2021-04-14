<?php 

namespace Test\Metrc\H_Sales;

class I_Sales_CustomerTypes_Test extends \Test\Metrc_Test {

	protected $path = 'sales/v1/customertypes';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
	
}
