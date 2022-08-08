<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class N_Plants_Onhold_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/onhold';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
