<?php

namespace OpenTHC\Bunk\Test\Metrc\A_Harvests;

class H_Harvests_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'harvests/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
