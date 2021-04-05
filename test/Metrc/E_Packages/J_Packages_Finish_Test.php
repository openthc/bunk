<?php 

namespace Test\Metrc\E_Packages;

class J_Packages_Finish_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/finish';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}