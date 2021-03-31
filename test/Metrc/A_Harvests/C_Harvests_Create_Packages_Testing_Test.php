<?php 

namespace Test\Metrc\A_Harvests;

class C_Harvests_Create_Packages_Testing_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/create/packages/testing';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
	
}