<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\B_Items;

class A_Item_Active_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'items/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
