<?php
/**
 * Test Basic Sync
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class Section_Test extends \OpenTHC\Bunk\Test\BioTrack\Base
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_create()
	{
		$res = $this->cre->section()->create([
			'name' => 'TEST ROOM',
			'type' => 'INVENTORY',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);

		$res = $this->cre->section()->create([
			'name' => 'TEST ROOM',
			'type' => 'PLANT',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);

	}


	function test_update()
	{
		$res = $this->cre->section()->update('111111', [
			'name' => 'SECTION UPDATE',
			'type' => 'INVENTORY',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);

		$res = $this->cre->section()->update('222222', [
			'name' => 'SECTION UPDATE',
			'type' => 'INVENTORY',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);

	}


	function test_delete()
	{
		$res = $this->cre->section()->delete('111111', [
			'type' => 'INVENTORY',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);

		$res = $this->cre->section()->delete('222222', [
			'type' => 'INVENTORY',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertArrayHasKey('transactionid', $res);
		$this->assertMatchesRegularExpression('/^\d+$/', $res['transactionid']);
	}

}
