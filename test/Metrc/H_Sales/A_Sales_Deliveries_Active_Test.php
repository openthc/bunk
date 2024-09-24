<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class A_Sales_Deliveries_Active_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'sales/v1/deliveries/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
