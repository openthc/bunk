<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class K_Plants_Label_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/label';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
