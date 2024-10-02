<?php
/**
 * Test BioTrack Vehicle Interface
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class Vehicle_Test extends \OpenTHC\Bunk\Test\BioTrack\Base
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_create()
	{
		$res = $this->cre->vehicle()->create(array(
			'gid' => 2,
			'name' => 'BatMobile',
			'year' => 1949,
			'make' => 'Sedan',
			'model' => 'BatMobile',
			'color' => 'BatMobile',
			'tag' => 'BatMobile',
			'vin' => 'BatMobile'
		));
		$this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);
	}

	function testModify()
	{
		$res = $this->cre->vehicle()->update('3', array(
			'name' => 'BatMobile',
			'year' => 1949,
			'make' => 'Sedan',
			'model' => 'BatMobile',
			'color' => 'BatMobile',
			'tag' => 'BatMobile',
			'vin' => 'BatMobile'
		));
		$this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);
	}

	function testRemove()
	{
		$res = $this->cre->vehicle()->delete('1234');
		$this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);
	}

}
