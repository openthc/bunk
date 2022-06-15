<?php

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class F_Sales_Receipts_Active_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path =  'sales/v1/receipts/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
