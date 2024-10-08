<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class R_Plants_Waste_Methods_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'plants/v1/waste/methods';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
