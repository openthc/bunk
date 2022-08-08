<?php
/**
 * Test Helper for LeafData
 *
 * SPDX-License-Identifier: MIT
 */

namespace Test\A_System;

class A_System_Test extends \PHPUnit\Framework\TestCase
{
	function test_env()
	{
		$x = getenv('OPENTHC_TEST_BASE');
		$this->assertNotEmpty($x);
	}

}
