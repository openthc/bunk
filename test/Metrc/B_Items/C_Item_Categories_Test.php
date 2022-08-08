<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\B_Items;

class C_Item_Categories_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'items/v1/categories';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
