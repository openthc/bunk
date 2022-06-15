<?php
/**
 * Test Basic Sync
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class C_Contact_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_employee_create()
	{
		$res = $this->post_json('', [
			'action' => 'employee_add',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertTrue(true);
	}

	function test_employee_update()
	{
		$res = $this->post_json('', [
			'action' => 'employee_modify',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertTrue(true);
	}

	function test_employee_delete()
	{
		$res = $this->post_json('', [
			'action' => 'employee_remove',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertTrue(true);
	}

	function test_user_create()
	{
		// _curl_post '{ "action": "user_add" }'
		$this->assertTrue(true);
	}

	function test_user_update()
	{
		// _curl_post '{ "action": "user_modify" }'
		$this->assertTrue(true);
	}

	function test_user_delete()
	{
		// _curl_post '{ "action": "user_remove" }'
		$this->assertTrue(true);
	}

}
