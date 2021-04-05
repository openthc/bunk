<?php 

namespace Test\Metrc\E_Packages;

class O_Packages_Remediate_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/remediate';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}