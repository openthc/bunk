<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\F_PlantBatches;

class A_PlantBatches_Active_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plantbatches/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
