<?php

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class S_Plants_Waste_Reasons_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/waste/reasons';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
