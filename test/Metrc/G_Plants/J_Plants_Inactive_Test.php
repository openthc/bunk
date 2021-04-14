<?php 

namespace Test\Metrc\G_Plants;

class J_Plants_Inactive_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/inactive';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}