<?php
/**
 * Test Basic Sync
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class C_Section_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_create()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_room_add',
		]);
		$res = $this->assertValidResponse($res);

		$res = $this->post_json('', [
			'action' => 'plant_room_add',
		]);
		$res = $this->assertValidResponse($res);

	}


	function test_update()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_room_modify',
		]);
		$res = $this->assertValidResponse($res);


		$res = $this->post_json('', [
			'action' => 'plant_room_modify',
		]);
		$res = $this->assertValidResponse($res);

	}


	function test_delete()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_room_remove',
		]);
		$res = $this->assertValidResponse($res);

		$res = $this->post_json('', [
			'action' => 'plant_room_remove',
		]);
		$res = $this->assertValidResponse($res);
	}

}
