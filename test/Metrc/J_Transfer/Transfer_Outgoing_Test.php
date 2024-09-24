<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\J_Transfer;

class Transfer_Outgoing_Test extends \OpenTHC\Bunk\Test\Metrc\Base
{

	protected $path = 'transfers/v1/outgoing';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

}
