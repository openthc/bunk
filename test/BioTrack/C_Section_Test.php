<?php
/**
 * Test Basic Sync
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class C_Section_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');

		//$this->thc = new RBE_BioTrack_WA();
		// $cfg = \OpenTHC\CRE::getEngine('biotrack');
		// $this->thc = new \OpenTHC\CRE\BioTrack($cfg);

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

	/** For Plants * */
	function testPlantRoomAdd()
	{
		//for plants
		$res = $this->thc->plant_room_add(array(
			'gid' => 1,
			'kind' => 'Plant',
			'name' => 'Cannabis',
			'location' => 'location'
		));

		//for inventory
		//assert
		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached
		// && MOre
	}

	function testPlantRoomModify()
	{
		$res = $this->thc->plant_room_modify(array(
			'id' => 23,
			'gid' => 1,
			'kind' => 'Plant',
			'name' => 'Cannabis',
			'location' => 'location'
		));

		//for inventory
		//assert
		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached
	}

	function testPlantRoomRemove()
	{
		$res = $this->thc->plant_room_remove(
			423, //room id
			4567 //location id
		); //we dont actually remove this record we just update it from the records
		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached
	}

	/** Inventory Room * */
	function testInventoryRoomAdd()
	{
		//for plants
		$res = $this->thc->inventory_room_add(array(
			'gid' => 1,
			'kind' => 'Inventory',
			'name' => 'Cannabis',
			'location' => 'location'
		));

		//for inventory
		//assert
		//test if all are ok
		if (empty($res)) {
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached
		// && MOre
	}

	function testInventoryRoomModify()
	{
		$res = $this->thc->inventory_room_modify(array(
			'id' => 23,
			'gid' => 1,
			'kind' => 'Inventory',
			'name' => 'Cannabis',
			'location' => 'location'
		));

		//for inventory
		//assert
		//test if all are ok
		if (empty($res)) {
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached
	}

	function testInventoryRoomRemove()
	{
		$res = $this->thc->inventory_room_remove(array(
			'id' => 423
		)); //we dont actually remove this record we just update it from the records
		//test if all are ok

		if (empty($res)) {
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached
	}


}
