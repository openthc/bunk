<?php

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class C_Sales_Deliveries_Inactive_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'sales/v1/deliveries/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
