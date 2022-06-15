<?php

namespace OpenTHC\Bunk\Test\Metrc\I_Strains;

class A_Strains_Active_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'strains/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
