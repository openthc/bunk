<?php
/**
 * Collect from a Plant Twice
 */

namespace Test\Plant_Collect;

class Collect_Twice_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	/**
	 * Whole Batch Only
	 */
	public function test_collect_one_two()
	{
		$p0 = $this->find_random_plant();
		// $b0 =
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
		$b1 = $this->assertValidResponse($res, 200);
		$this->assertIsArray($b1);
		$this->assertCount(40, $b1);
		$this->assertEmpty($b1['global_flower_area_id']);
		$this->assertEmpty($b1['global_other_area_id']); // we set them, but they are not used
		$this->assertEquals('open', $b1['status']);
		$this->assertEquals('harvest', $b1['type']);
		$this->assertEquals('harvested', $b1['plant_stage']);
		// var_dump($b1);


		//$b2 = $this->get('batches?f_global_id=' . $b0['global_id']);
		$res = $this->get('plants?f_global_id=' . $p0['global_id']);
		$this->assertIsArray($res);
		$this->assertIsArray($res['data']);
		$p1 = $res['data'][0];
		$this->assertCount(30, $p1);
		$this->assertEquals('harvested', $p1['stage']);
		$this->assertNotEmpty($p1['plant_harvested_at']);
		$this->assertNotEquals($p0['global_batch_id'], $p1['global_batch_id']);


		// Reset to Veg
		$mod = array(
			'global_id' => $p0['global_id'],
			'global_area_id' => $p0['global_area_id'],
			'global_batch_id' => $p0['global_batch_id'],
			'global_strain_id' => $p0['global_strain_id'],
			'plant_created_at' => $p0['plant_created_at'],
			'origin' => 'plant', //  $p0['origin'],
			'stage' => 'growing',
		);
		$res = $this->post('plants/update', [ 'plant' => $mod ]);
		$res = $this->assertValidResponse($res, 200);


		// Harvest a Second Time
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
			'flower_wet_weight' => 222.22,
			'other_wet_weight' => 111.11,
			'uom' =>  'gm',
			'qty_harvest' => 0,
		];
		$res = $this->post('plants/harvest_plants', $req);
		$res = $this->assertValidResponse($res, 200);

		//$b2 = $this->get('batches?f_global_id=' . $b0['global_id']);

	}
}
