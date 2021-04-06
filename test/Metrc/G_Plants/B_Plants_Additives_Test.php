<?php 

namespace Test\Metrc\G_Plants;

class B_Plants_Additives_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/additives';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}