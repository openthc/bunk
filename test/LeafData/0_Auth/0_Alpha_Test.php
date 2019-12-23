<?php
/**
 * Test Authentication
 */

namespace Test\Auth;

class Alpha extends \Test\OpenTHC_Bunk_LeafData_Test
{
	public function test_auth()
	{
		/**
		 * Log in with bad credentials given the assumption that mechanism we're using to log in is correct
		 */
		// Case 1: Bad license, bad secret
		$c = $this->_api([
			'license' => 'invalid-license',
			'license-secret' => 'invalid-password',
		]);
		$res = $c->get('mmes');
		$res = $this->assertValidResponse($res, 401);


		// Case 2: Good license, bad secret
		$c = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => 'invalid-password',
		]);
		$res = $c->get('mmes');
		$res = $this->assertValidResponse($res, 401);

		// Case 3: Good
		$c = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);

		$res = $c->get('mmes');
		$res = $this->assertValidResponse($res);

	}

	public function test_license_list()
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);

		$res = $this->get('mmes');
		$this->assertIsArray($res);
		$this->assertCount(3050, $res);

		// Spin Each for Validity?

	}

}
