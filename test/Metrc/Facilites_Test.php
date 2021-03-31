<?php

namespace Test\Metrc;

class Facilities_Test extends \Test\Metrc {
    protected $path = 'facilities/v1';

    function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}