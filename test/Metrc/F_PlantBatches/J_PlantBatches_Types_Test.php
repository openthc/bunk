<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\F_PlantBatches;

class J_PlantBatches_Types_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plantbatches/v1/types';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
