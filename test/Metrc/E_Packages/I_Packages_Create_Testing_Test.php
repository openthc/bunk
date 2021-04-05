<?php 

namespace Test\Metrc\E_Packages;

class Packages_Create_Testing_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/create/testing';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}

}