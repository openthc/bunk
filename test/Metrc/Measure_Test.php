<?php

namespace OpenTHC\Bunk\Test\Metrc;

class Measure_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

    protected $path = 'unitsofmeasure/v1/active';

    function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
