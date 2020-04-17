<?php
/**
 * Inventory
 */

namespace Test\Lot_Process;

class Split_Test extends \Test\OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-g0-public'],
			'license-secret' => $_ENV['leafdata-g0-secret'],
		]);

		// $zone_id = $_ENV['leafdata-g-zone'];
	}

	/**
	 * Usage:
	 */
	public function testCreateSublot()
	{
		$lot = [];
		$res = $this->get('inventories');
		foreach ($res['data'] as $x) {
			if ($x['qty'] >= 2) {
				$lot = $x;
				break;
			}
		}

		$this->assertNotEmpty($lot, 'Invalid Lot For Split Test');

		$qty = floor($lot['qty'] / 2);

		// Make a Sublot
		// $res = $rbe->inventory()->split($arg);
		// var_dump($res);
		// Test that these fail when missing
		// 'net_weight' => 0,
		// 'cost' => 0, // @deprecated but required, bug reported to MJF /djb 20180204
		$mod = [
			'global_inventory_id' => $lot['global_id'],
			'global_area_id' => $lot['global_area_id'],
			'qty' => $qty,
			'external_id' => 'deprecated', // @deprecated but required, bug reported to MJF /djb 20180204
			'net_weight' => '0', // @deprecated but required, bug reported to MJF /djb 20180204
			'cost' => '0', // @deprecated but required, bug reported to MJF /djb 20180204
		];
		$res = $this->post('split_inventory', $mod);
		$res = $this->assertValidResponse($res, 200);
		$this->assertIsArray($res);
		$this->assertCount(45, $res);
		$this->assertNotEmpty($res['global_id']);
		// $this->assertEquals($lot['global_id'], $res['global_id']);
		$this->assertEquals($qty, $res['qty']);


	}

	public function testCreateSublot_fail()
	{
		$lot = [];
		$res = $this->get('inventories');
		foreach ($res['data'] as $x) {
			if ($x['qty'] >= 2) {
				$lot = $x;
				break;
			}
		}

		$this->assertNotEmpty($lot, 'Invalid Lot For Split Test');

		$qty = floor($lot['qty'] / 2);

		$mod = [
			'global_inventory_id' => $lot['global_id'],
			'global_area_id' => $lot['global_area_id'],
			'qty' => $qty,
		];
		$res = $this->post('split_inventory', $mod);
		$res = $this->assertValidResponse($res, 422);
		$this->assertIsArray($res);
		$this->assertNotEmpty($res['validation_messages']);
		$this->assertEquals('Undefined index: external_id', $res['validation_messages'], 'Validation Has Changed!');

		$mod['external_id'] = 'deprecated';
		$res = $this->post('split_inventory', $mod);
		$res = $this->assertValidResponse($res, 422);
		$this->assertIsArray($res);
		$this->assertNotEmpty($res['validation_messages']);
		$this->assertEquals('Undefined index: net_weight', $res['validation_messages'], 'Validation Has Changed!');
		// print_r($res);


		$mod['net_weight'] = '0';
		$res = $this->post('split_inventory', $mod);
		$res = $this->assertValidResponse($res, 422);
		$this->assertIsArray($res);
		$this->assertNotEmpty($res['validation_messages']);
		$this->assertEquals('Undefined index: cost', $res['validation_messages'], 'Validation Has Changed!');
		// print_r($res);

		$mod['cost'] = '0';
		$res = $this->post('split_inventory', $mod);
		$res = $this->assertValidResponse($res, 200);
		$this->assertIsArray($res);
		$this->assertCount(45, $res);
		$this->assertNotEmpty($res['global_id']);
		$this->assertEquals($qty, $res['qty']);

	}

}
