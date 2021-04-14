<?php 

namespace Test\Metrc\G_Plants;

class Q_Plants_Vegetative_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/vegetative';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
