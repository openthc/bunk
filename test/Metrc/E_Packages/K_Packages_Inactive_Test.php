<?php

namespace OpenTHC\Bunk\Test\Metrc\E_Packages;

class K_Packages_Inactive_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'packages/v1/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
