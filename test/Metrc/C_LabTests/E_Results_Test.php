<?php

namespace Test\Metrc\C_LabTests;

class E_Results_Test extends \Test\Metrc_Test {

	protected $path = 'labtests/v1/results';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
