<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class G_Plants_Flowering_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'plants/v1/flowering';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
