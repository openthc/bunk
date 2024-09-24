<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\C_LabTests;

class F_States_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'labtests/v1/states';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
