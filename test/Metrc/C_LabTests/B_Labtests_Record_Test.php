<?php

namespace Test\Metrc\C_LabTests;

class B_Labtests_Record_Test extends \Test\Metrc_Test {

	protected $path = 'labtests/v1/record';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}