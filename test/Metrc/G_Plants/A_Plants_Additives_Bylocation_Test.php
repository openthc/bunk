<?php 

namespace Test\Metrc\G_Plants;

class A_Plants_ByLocation_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/additives/bylocation';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}