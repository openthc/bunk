<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class I_Sales_CustomerTypes_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'sales/v1/customertypes';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
