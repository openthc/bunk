<?php

namespace OpenTHC\Bunk\Test\Metrc;

class Facilities_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

    protected $path = 'facilities/v1';

    function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
