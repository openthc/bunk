<?php
/**
 * Test Helper for LeafData
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\A_System;

class A_System_Test extends \OpenTHC\Bunk\Test\Base
{
	function test_env()
	{
		$x = getenv('OPENTHC_TEST_ORIGIN');
		$this->assertNotEmpty($x);
	}

}
