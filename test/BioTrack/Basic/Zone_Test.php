<?php
/**
 * Tests for BioTrack "Inventory Rooms" and "Plant Rooms" (Zones)
 */
namespace Test\Basic;

class Zone_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function testRoom_Inventory_Room_Read()
	{
		$res = $this->rbe->inventory_room();
	}

	function testRoom_Inventory_Add()
	{
		$res = $this->rbe->inventory_room_add(array(
                        'id' => $this->Room['12345'],
                        'name' => $this->Room['inventory room'],
                        'location' => $this->Room['980027'],)
					);
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function testRoom_Inventory_Modify()
	{
		$res = $this->rbe->inventory_room_modify('12345', 'inventory room', '980027', '0');
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function testRoom_Inventory_Remove()
	{
		$res = $this->rbe->inventory_room_remove('980027', '12345');
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function testPlant_Room_Add()
	{
		// location number: 980027: main
		$res = $this->rbe->plant_room_add(array(
						'id' => $this->Room['12345'],
                        'name' => $this->Room['test room'],
                        'location' => $this->Room['980027'])
					);
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function testPlant_Room_Modify()
	{
		$res = $this->rbe->plant_room_modify('1234', 'test room', '980027');
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function testPlant_Room_Remove()
	{
		$res = $this->rbe->plant_room_remove('980027', '12345');
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	// function testInventory_Room_Add()
	// {
	// 	$res = $this->rbe->inventory_room_add(array_merge(array(
	// 					'action' => 'inventory_room_add'
	// 	)))
	// }
	//
	// function testInventory_Room_Modify()
	// {
	//
	// }
	//
	// function testInventory_Room_Remove()
	// {
	//
	// }
}
