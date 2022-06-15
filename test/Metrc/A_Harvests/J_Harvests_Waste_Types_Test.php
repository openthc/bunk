<?php

namespace OpenTHC\Bunk\Test\Metrc\A_Harvests;

class J_Harvests_Waste_Types_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'harvests/v1/waste/types';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
