<?php
/**
 * Test Basic Sync
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class Contact_Test extends \OpenTHC\Bunk\Test\BioTrack\Base
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_employee_create()
	{
		/*
		  $res = $this->cre->employee_add(array(
		  'name' => 'Test Name',
		  'birth_month' => '10',
		  'birth_day' => '07',
		  'birth_year' => '1986',
		  'hire_month' => '01',
		  'hire_day' => '15',
		  'hire_year' => '2013'
		  ), 'Test Name', );
		*/

		$res = $this->cre->contact()->create([
			'id' => '6',
			'name' => 'Employee Name',
			'dob' => '1969-04-20',
			'doh' => '2014-05-20',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);

		$res = $this->cre->sync_employee();
		foreach ($res as $rec) {
			// Find the one created, and then eval it.
			if ($rec == 'the one I care about') {
				$this->assertEquals('Employee Name', $rec['name']);
			}
		}

	}

	function test_employee_update()
	{
		/*
		  $res = $this->thc->employee_modify(array(
		  'id' => 47, //employee id
		  'name' => 'Test Name',
		  'birth_month' => '10',
		  'birth_day' => '07',
		  'birth_year' => '1986',
		  'hire_month' => '01',
		  'hire_day' => '15',
		  'hire_year' => '2013'
		  ));
		 *
		 */
		//initialize the result to test
		// $res = $this->ghc->employee_modify('132412', 'michael', '1996-10-01', '2016-07-23');

		$res = $this->cre->contact()->update('6', [
			'name' => 'EMPLOYEE UPDATE',
			'dob' => '1969-04-20',
			'doh' => '2020-04-20',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);
		// 	47, //id
			// 	'Test Name', //name
			// 	'11/01/1975', //date of birth
			// 	'08/13/2013' //date hired
			// );
		//test if all are ok
	}

	function test_employee_delete()
	{
		// $res = $this->ghc->employee_remove('132412', 'michael', '1996-07-01', '2016-11-12');
		// $res = $this->cre->employee_remove('47');
				$res = $this->cre->contact()->delete('6');
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);
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
