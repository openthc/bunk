<?php
/**
 * Test Vehicle
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class V_Vehicle_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_create()
	{
		$res = $this->post_json('', [
			'action' => 'vehicle_add',
		]);
		$res = $this->assertValidResponse($res);

	}

	function test_update()
	{
		$res = $this->post_json('', [
			'action' => 'vehicle_modify',
		]);
		$res = $this->assertValidResponse($res);

	}

	function test_delete()
	{
		$res = $this->post_json('', [
			'action' => 'vehicle_remove',
		]);
		$res = $this->assertValidResponse($res);

	}
}
