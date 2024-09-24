<?php
/**
 * Try to Test the Batch Mess Here
 */

namespace OpenTHC\Bunk\Test\LeafData\Plant;

class Waste_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);

		// $zone_id = $_ENV['leafdata-license-g-zone'];
	}

	function test_daily_waste()
	{
		// Enter A Number
		$res = $this->post('disposals', [ 'disposal' => [
			[
				'source' => 'daily_plant_waste',
				'reason' => 'daily_waste',
				'global_area_id' => $_ENV['leafdata-license-g-zone'],
				'qty' => 1234.56,
				'uom' => 'gm',
			]
		]]);
		$res = $this->assertValidResponse($res, 200);
		$this->assertIsArray($res);
		$this->assertCount(1, $res);
		$res = $res[0];
		$this->assertCount(15, $res);

		$D = $res;
		$this->assertEquals('daily_plant_waste', $D['source']);
		$this->assertEquals('daily_waste', $D['reason']);
		$this->assertEquals(123.45, $D['qty']);
		$this->assertEquals('gm', $D['uom']);
		$this->assertEmpty($D['global_plant_id']);
		$this->assertNotEmpty($D['global_id']);
		$this->assertNotEmpty($D['global_mme_id']);
		$this->assertNotEmpty($D['global_user_id']);
		$this->assertNotEmpty($D['global_batch_id']);
		$this->assertNotEmpty($D['global_area_id']);
		$this->assertNotEmpty($D['global_inventory_id']);
		// Also
		// "hold_starts_at": "07\/28\/2019 11:52am",
		// "hold_ends_at": "07\/31\/2019 11:52am",
		// "updated_at": "07\/28\/2019 11:52am",
		// "created_at": "07\/28\/2019 11:52am",

		// Get Disposal Record
		// $res = $this->get('disposals?f_global_id=' . $D['global_id']);
		// $res = $this->assertValidResponse($res);
		// // More?
		// $this->assertIsArray($res);
		// $this->assertCount(9, $res);
		// $this->assertIsArray($res['data']);
		// $this->assertCount(1, $res['data']);
		// $D1 = $res['data'][0];
		// $this->assertCount(15, $res);

		// Get Lot
		$res = $this->get('inventories?f_global_id=' . $D['global_inventory_id']);
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res);
		$this->assertCount(9, $res);
		$this->assertIsArray($res['data']);
		$this->assertCount(1, $res['data']);
		$I = $res['data'][0];
		// $this->assertCount(15, $res);

		// Get Product
		$res = $this->get('inventory_types?f_global_id=' . $I['global_inventory_type_id']);
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res);
		$this->assertCount(9, $res);
		$this->assertIsArray($res['data']);
		$this->assertCount(1, $res['data']);
		$P = $res['data'][0];

		//

		var_dump($D);
		var_dump($I);
		var_dump($P);

	}

	function test_daily_waste_201_fail()
	{
		// Enter A Number
		$res = $this->post('disposals', [ 'disposal' => [
			[
				'source' => 'daily_plant_waste',
				'reason' => 'daily_waste',
				'global_area_id' => $_ENV['leafdata-license-g-zone'],
				'qty' => 1234.56,
				'uom' => 'gm',
			]
		]]);
		$this->assertEquals(201, $res->getStatusCode(), 'KNOWN-BUG: MJF/LD Returns Invalid Response');

		// Get a Invalid Product

		// Get a Disposal Record

		//
	}

	function test_daily_waste_uom_fail()
	{
		// Enter A Number
		$res = $this->post('disposals', [ 'dispoal' => [
			[
				'source' => 'daily_plant_waste',
				'reason' => 'daily_waste',
				'global_area_id' => '',
				'qty' => 1234.56,
				'uom' => 'g',
			]
		]]);
		$this->assertEquals(422, $res->getStatusCode(), 'KNOWN-BUG: MJF/LD Uses Invalid UOM');

		$res = $this->assertValidResponse($res);

	}

}
