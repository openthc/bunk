<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\E_Packages;

class N_Packages_Reasons_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'packages/v1/reasons';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
