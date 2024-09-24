<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class E_Sales_Delivery_ReturnReasons_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'sales/v1/delivery/returnreasons';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
