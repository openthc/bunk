<?php 

namespace Test\Metrc\C_LabTests;

class C_Lab_Release_Test extends \Test\Metrc_Test {

	protected $url = 'labtests/v1/release';

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}

}