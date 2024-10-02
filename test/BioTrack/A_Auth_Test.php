<?php
/**
 * Test Authentication
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class A_Auth_Test extends \OpenTHC\Bunk\Test\BioTrack\Base
{
	function test_auth_fail()
	{
		$res = $this->cre->auth('999000403', 'fail@openthc.example.org', 'password');
		// $res = $this->assertValidResponse($res);
		$this->assertIsArray($res);
		$this->assertEquals(0, $res['success']);

		$this->assertArrayHasKey('error', $res);
		$this->assertArrayNotHasKey('errorcode', $res);
		$this->assertEquals('Invalid username or password.', $res['error']);

	}

	function test_auth_good()
	{
		// Good Login
		$res = $this->cre->auth($_ENV['biotrack-company-g'], $_ENV['biotrack-username'], $_ENV['biotrack-password']);
		// $res = $this->assertValidResponse($res);
		$this->assertIsArray($res);
		$this->assertEquals(1, $res['success']);

		$this->assertArrayHasKey('time', $res);
		$this->assertArrayHasKey('sessionid', $res);
		$this->assertMatchesRegularExpression('/^\w{24,128}$/', $res['sessionid']);

	}

}
