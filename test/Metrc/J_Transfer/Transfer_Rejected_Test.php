<?php
/**
 * SPDX-License-Identifier: MIT
 */

class Transfer_Rejected_Test extends \OpenTHC\Bunk\Test\Metrc_Test
{

	protected $path = 'transfers/v1/rejected';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
