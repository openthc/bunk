<?php
/**
 * Test Authentication
 */

namespace Test\Auth;

class Alpha extends \Test\BioTrack_Test
{
	function test_auth_fail()
	{
		$res = $this->post('', [
			'action' => 'login',
			'training' => $_ENV['biotrack-training-mode'],
			'license_number' => $_ENV['biotrack-company-g'],
			'username' => 'x',
			'password' => 'x',
		]);
		$res = $this->assertValidResponse($res, 200);
		$this->assertEquals(0, $res['success']);

		$this->assertArrayHasKey('error', $res);
		$this->assertArrayNotHasKey('errorcode', $res);
		$this->assertEquals('Invalid username or password.', $res['error']);

	}

	function test_auth_good()
	{
		// Good Login
		$res = $this->post('', [
			'action' => 'login',
			'training' => $_ENV['biotrack-training-mode'],
			'license_number' => $_ENV['biotrack-company-g'],
			'username' => $_ENV['biotrack-username-g'],
			'password' => $_ENV['biotrack-password-g'],
		]);

		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);

		$this->assertArrayHasKey('time', $res);
		$this->assertArrayHasKey('sessionid', $res);
		$this->assertRegExp('/^[0-9a-f]{128}$/', $res['sessionid']);

	}

}
