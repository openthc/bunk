<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\I_Strains;

class C_Strains_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'strains/v1';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidResponse($res, $this->path);
	}

}
