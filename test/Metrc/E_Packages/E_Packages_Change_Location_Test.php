<?php 

namespace Test\Metrc\E_Packages;

class E_Packages_Change_Location_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/change/locations';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}