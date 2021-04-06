<?php 

namespace Test\Metrc\H_Sales;

class G_Sales_Receipts_Inactive_Test extends \Test\Metrc_Test {

	protected $path =  'sales/v1/receipts/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}