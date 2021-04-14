<?php

namespace Test\Metrc;

class Measure_Test extends \Test\Metrc_Test {
	
    protected $path = 'unitsofmeasure/v1/active';

    function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
