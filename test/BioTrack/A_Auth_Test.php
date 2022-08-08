<?php
/**
 * Test Authentication
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class A_Auth_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	function test_auth_fail()
	{
		$res = $this->post_json('', [
			'action' => 'login',
			'training' => 0,
			'license_number' => $_ENV['biotrack-company-g'],
			'username' => '',
			'password' => '',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(0, $res['success']);

		$this->assertArrayHasKey('error', $res);
		$this->assertArrayNotHasKey('errorcode', $res);
		$this->assertEquals('Invalid username or password.', $res['error']);

	}

	function test_auth_good()
	{
		// Good Login
		$res = $this->post_json('', [
			'action' => 'login',
			'training' => 0, // $_ENV['biotrack-training-mode'],
			'license_number' => $_ENV['biotrack-company-g'],
			'username' => $_ENV['biotrack-username'],
			'password' => $_ENV['biotrack-password'],
		]);

		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);

		$this->assertArrayHasKey('time', $res);
		$this->assertArrayHasKey('sessionid', $res);
		$this->assertMatchesRegularExpression('/^\w{24,128}$/', $res['sessionid']);

	}

}
