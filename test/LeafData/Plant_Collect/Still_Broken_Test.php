<?php
/**
 * Test to show that ISO Date's don't work on Harvest?
 * Test to show that 'g' UOM is a failure (they use 'gm')
 */

namespace Test\Plant_Collect;

class Still_Broken_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function test_should_be_201()
	{
		$p0 = $this->find_random_plant();
		// $b0 =
		$this->assertIsArray($p0);
		$this->assertEmpty($p0['global_mother_plant_id']);
		$this->assertEmpty($p0['plant_harvested_at']);
		$this->assertEmpty($p0['plant_harvested_end_at']);

		// Harvest
		$req = [
			'global_area_id' => $p0['global_area_id'],
			'global_flower_area_id' => $p0['global_area_id'],
			'global_other_area_id' => $p0['global_area_id'],
			'global_harvest_batch_id' => null,
			'global_plant_ids' => [
				[ 'global_plant_id' => $p0['global_id'] ]
			],
			'harvested_at' => date('Y-m-d'),
			'flower_wet_weight' => 987.65,
			'other_wet_weight' =>  123.45,
			'uom' =>  'gm',
			'qty_harvest' => 0,
		];
		$res = $this->post('plants/harvest_plants', $req);
		$b1 = $this->assertValidResponse($res, 201, 'Harvest Batch should Return 201');

	}

	/**
	 * Whole Batch Only
	 */
	public function test_collect_one_two()
	{
		$p0 = $this->find_random_plant();
		$this->assertIsArray($p0);
		$this->assertEmpty($p0['global_mother_plant_id']);
		$this->assertEmpty($p0['plant_harvested_at']);
		$this->assertEmpty($p0['plant_harvested_end_at']);
		//var_dump($p0);

		// Harvest
		$req = [
			'global_area_id' => $p0['global_area_id'],
			'global_flower_area_id' => $p0['global_area_id'],
			'global_other_area_id' => $p0['global_area_id'],
			'global_harvest_batch_id' => null,
			'global_plant_ids' => [
				[ 'global_plant_id' => $p0['global_id'] ]
			],
			'harvested_at' => date('Y-m-d'),
			'flower_wet_weight' => 987.65,
			'other_wet_weight' =>  123.45,
			'uom' =>  'gm',
			'qty_harvest' => 0,
		];
		$res = $this->post('plants/harvest_plants', $req);
		$this->assertValidResponse($res, 201, 'KNOWN-BUG: Responds with 200, when should be 201');
	}

	/**
	 *
	 * @return [type] [description]
	 */
	function test_iso_date_fail()
	{
		$p0 = $this->find_random_plant();
		$this->assertIsArray($p0);
		$this->assertEmpty($p0['global_mother_plant_id']);
		$this->assertEmpty($p0['plant_harvested_at']);
		$this->assertEmpty($p0['plant_harvested_end_at']);
		//var_dump($p0);

		// Harvest
		$req = [
			'global_area_id' => $p0['global_area_id'],
			'global_flower_area_id' => $p0['global_area_id'],
			'global_other_area_id' => $p0['global_area_id'],
			'global_harvest_batch_id' => null,
			'global_plant_ids' => [
				[ 'global_plant_id' => $p0['global_id'] ]
			],
			// 'qty_harvest' => '3333333.00',
			'harvested_at' => date(\DateTime::ISO8601), // spec: mm/dd/yyyy hh:mmXM
			'harvested_end_at' => null, // spec says required
			'flower_wet_weight' => 987.65,
			'other_wet_weight' =>  123.45,
			'uom' =>  'g,',
		];
		$res = $this->post('plants/harvest_plants', $req);
		$this->assertValidResponse($res, 200, __METHOD__);

	}

	function test_uom_fail()
	{
		$p0 = $this->find_random_plant();
		$this->assertIsArray($p0);
		$this->assertEmpty($p0['global_mother_plant_id']);
		$this->assertEmpty($p0['plant_harvested_at']);
		$this->assertEmpty($p0['plant_harvested_end_at']);
		//var_dump($p0);

		// Harvest
		$req = [
			'global_area_id' => $p0['global_area_id'],
			'global_flower_area_id' => $p0['global_area_id'],
			'global_other_area_id' => $p0['global_area_id'],
			'global_harvest_batch_id' => null,
			'global_plant_ids' => [
				[ 'global_plant_id' => $p0['global_id'] ]
			],
			// 'qty_harvest' => '3333333.00',
			'harvested_at' => date('Y-m-d'),
			'flower_wet_weight' => 987.65,
			'other_wet_weight' =>  123.45,
			'uom' =>  'g',
		];
		$res = $this->post('plants/harvest_plants', $req);
		$this->assertValidResponse($res, 200, __METHOD__);

	}

	function test_still_requires_deprecated_qty_harvest()
	{
		$p0 = $this->find_random_plant();
		$this->assertIsArray($p0);
		$this->assertEmpty($p0['global_mother_plant_id']);
		$this->assertEmpty($p0['plant_harvested_at']);
		$this->assertEmpty($p0['plant_harvested_end_at']);
		//var_dump($p0);

		// Harvest
		$req = [
			'global_area_id' => $p0['global_area_id'],
			'global_flower_area_id' => $p0['global_area_id'],
			'global_other_area_id' => $p0['global_area_id'],
			'global_harvest_batch_id' => null,
			'global_plant_ids' => [
				[ 'global_plant_id' => $p0['global_id'] ]
			],
			// 'qty_harvest' => '3333333.00',
			'harvested_at' => date('Y-m-d'),
			'flower_wet_weight' => 987.65,
			'other_wet_weight' =>  123.45,
			'uom' =>  'g',
		];
		$res = $this->post('plants/harvest_plants', $req);
		$res = $this->assertValidResponse($res, 500);
		$this->assertTrue($res['error']);
		$this->assertEquals('Undefined index: qty_harvest', $res['error_message']);
		$this->assertTrue(false, 'KNOWN-BUG: MJF/LD Still Requires Deprecated Field');

	}

}
