<?php
/**
  @todo Needs the right function names -
  @todo Use Tabs, not spaces
  @todo Nice Indent
 *
 */

//the room for inventory and plants are combined here

class WA_API_Room_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{

	protected function setUp() : void
	{
		//$this->thc = new RBE_BioTrack_WA();
		$cfg = \OpenTHC\CRE::getEngine('biotrack');
		$this->thc = new \OpenTHC\CRE\BioTrack($cfg);
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
