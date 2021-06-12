<?php

namespace Test\Metrc\C_LabTests;

class G_Types_Test extends \Test\Metrc_Test {

	protected $path = 'labtests/v1/types';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
