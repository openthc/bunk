<?php

namespace OpenTHC\Bunk\Test\Metrc\F_PlantBatches;

class I_PlantBatches_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plantbatches/v1';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
