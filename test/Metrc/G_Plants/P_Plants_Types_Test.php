<?php 

namespace Test\Metrc\G_Plants;

class P_Plants_Types_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/types';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}