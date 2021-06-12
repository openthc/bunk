<?php

namespace Test\Metrc\G_Plants;

class O_Plants_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
