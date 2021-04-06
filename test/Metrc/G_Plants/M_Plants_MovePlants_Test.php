<?php 

namespace Test\Metrc\G_Plants;

class M_Plants_MovePlants_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/moveplants';

	function test_post()
	{
		$res = $this->ghc->post($this->path);
		$this->assertValidResponse($res);
	}
}