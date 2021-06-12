<?php

namespace Test\Metrc\A_Harvests;

class H_Harvests_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
