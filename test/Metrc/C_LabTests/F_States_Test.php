<?php

namespace Test\Metrc\C_LabTests;

class F_States_Test extends \Test\Metrc_Test {

	protected $path = 'labtests/v1/states';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}