<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class G_Sales_Receipts_Inactive_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path =  'sales/v1/receipts/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
