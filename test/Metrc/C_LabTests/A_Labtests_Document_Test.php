<?php

namespace Test\Metrc\C_LabTests;

class A_Labtests_Document_Test extends \Test\Metrc_Test {

	protected $path = 'labtests/v1/labtestdocument';

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}

}