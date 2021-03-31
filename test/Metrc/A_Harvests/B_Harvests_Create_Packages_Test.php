<?php

namespace Test\Metrc\A_Harvests;

class B_Harvests_Create_Packages_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/create/packages';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}