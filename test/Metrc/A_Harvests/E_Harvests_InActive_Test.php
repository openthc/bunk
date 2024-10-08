<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\A_Harvests;

class E_Harvests_InActive_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'harvests/v1/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
