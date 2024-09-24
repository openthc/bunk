<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc;

class Facilities_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

    protected $path = 'facilities/v1';

    function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}
}
