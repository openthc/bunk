<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\E_Packages;

class M_Packages_Onhold_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'packages/v1/onhold';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
