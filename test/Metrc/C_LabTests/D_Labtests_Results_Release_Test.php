<?php

namespace Test\Metrc\C_LabTests;

class D_Results_Release_Test extends \Test\Metrc_Test {

	protected $path = 'labtests/v1/results/release';

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}

}