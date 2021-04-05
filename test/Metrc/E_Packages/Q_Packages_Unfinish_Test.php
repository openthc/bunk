<?php 

namespace Test\Metrc\E_Packages;

class Q_Packages_Unfinish_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/unfinish';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}