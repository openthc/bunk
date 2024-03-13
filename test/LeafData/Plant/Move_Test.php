<?php
/**
 * Try to Test the Batch Mess Here
 */

/**
 * When a Plant Moves, it fails
 *   -- Well, LeafData reports success but the values don't don't change (global_area_id)

Have to Move the Batch First
And that Update doesn't modify all the plants.
So, you have to Move a Batch to a new Room, then update all the Plants, manuall.

But if the Batch get's Mangled at all.
Then the Plants all get shuffled around -- scrambling the intentions of the User.

Even after Moving the Batch, the Plant Update request
Still comes back with the Incorrect Zone (global_area_id)

But once you Sync you'll see that the Plant record was actually Updated!
 */

namespace Test\Plant;

//class Batch_Mess_Test extends \OpenTHC\Bunk\Test\LeafData_Test
class Move_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	private $zone_id;

	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);

		$zone_id = $_ENV['leafdata-license-g-zone'];
	}

	public function test_move_plant()
	{
		// Move Batch, What Happens to Plants?

		$plant_id = getenv('PLANT_G0');
		$this->assertNotEmpty($plant_id, 'Provide PLANT_G0 for this Test');


		// $res = $this->get('batches?f_type=plant');
		// $b0 = $res['data'][0];

		$res = $this->get('plants?f_global_id=' . $plant_id);

		$p0 = $res['data'][0];
		$this->assertCount(30, $p0);

		$this->assertNotEquals($this->zone_id, $p0['global_area_id']);

		$mod = [
			'global_id' => $p0['global_id'],
			'global_area_id' => $this->zone_id,
			'global_batch_id' => $p0['global_batch_id'],
			'plant_created_at' => date('m/d/Y'), //  g:i:s a'), // $p0['plant_created_at'],
			'origin' => 'plant', // $p0['origin'],
			'stage' => $p0['stage'],
		];
		$res = $this->post('plants/update', [ 'plant' => $mod ]);
		$res = $this->assertValidResponse($res, 200, 'Plant/Move');
		$this->assertIsArray($res);
		$this->assertCount(25, $res);

		$this->assertEquals($this->zone_id, $res['global_area_id'], 'LeafData Fails to Update Area_ID');

	}

	public function test_move_batch_and_plant()
	{
		// Move Batch, What Happens to Plants?
		$plant_id = getenv('PLANT_G1');
		$this->assertNotEmpty($plant_id, 'Provide PLANT_G1 for this Test');

		// $res = $this->get('batches?f_type=plant');
		// $b0 = $res['data'][0];

		$res = $this->get('plants?f_global_id=' . $plant_id);

		$p0 = $res['data'][0];
		$this->assertCount(30, $p0);
		$this->assertNotEquals($this->zone_id, $p0['global_area_id']);

		$res = $this->get('batches?f_global_id=' . $p0['global_batch_id']);
		$b0 = $res['data'][0];
		$this->assertCount(55, $b0);
		$this->assertNotEquals($this->zone_id, $b0['global_area_id']);

		// Modify Batch
		$mod = [
			'global_id' => $b0['global_id'],
			'global_area_id' => $this->zone_id,
			'global_strain_id' => $b0['global_strain_id'],
			'type' => $b0['type'],
			'origin' => $b0['origin'],
			'num_plants' => $b0['num_plants'],
		];
		$res = $this->post('batches/update', [ 'batch' => $mod ]);
		$res = $this->assertValidResponse($res, 200, 'Plant/Move');
		$this->assertIsArray($res);
		$this->assertCount(40, $res);
		$this->assertEquals($this->zone_id, $res['global_area_id']);

		// Modify Plant
		$mod = [
			'global_id' => $p0['global_id'],
			'global_area_id' => $this->zone_id,
			'global_batch_id' => $p0['global_batch_id'],
			'plant_created_at' => date('m/d/Y'), //  g:i:s a'), // $p0['plant_created_at'],
			'origin' => 'plant', // $p0['origin'],
			'stage' => $p0['stage'],
		];
		$res = $this->post('plants/update', [ 'plant' => $mod ]);
		$res = $this->assertValidResponse($res, 200, 'Plant/Move');
		$this->assertIsArray($res);
		$this->assertCount(25, $res);

		$this->assertEquals($this->zone_id, $res['global_area_id'], 'LeafData Fails to Update Area_ID');

	}


	/**
	 * [test_move_batch_plant_follow description]
	 * @return [type] [description]
	 */
	public function test_move_batch_plant_follow()
	{
		// Move Batch, What Happens to Plants?
		$plant_id = getenv('PLANT_G2');
		$this->assertNotEmpty($plant_id, 'Provide PLANT_G2 for this Test');

		// $res = $this->get('batches?f_type=plant');
		// $b0 = $res['data'][0];

		$res = $this->get('plants?f_global_id=' . $plant_id);

		$p0 = $res['data'][0];
		$this->assertCount(30, $p0);
		$this->assertNotEquals($this->zone_id, $p0['global_area_id']);

		$res = $this->get('batches?f_global_id=' . $p0['global_batch_id']);
		$b0 = $res['data'][0];
		$this->assertCount(55, $b0);
		$this->assertNotEquals($this->zone_id, $b0['global_area_id']);

		// Modify Batch
		$mod = [
			'global_id' => $b0['global_id'],
			'global_area_id' => $this->zone_id,
			'global_strain_id' => $b0['global_strain_id'],
			'type' => $b0['type'],
			'origin' => $b0['origin'],
			'num_plants' => $b0['num_plants'],
		];
		$res = $this->post('batches/update', [ 'batch' => $mod ]);
		$res = $this->assertValidResponse($res, 200, 'Plant/Move');
		$this->assertIsArray($res);
		$this->assertCount(40, $res);
		$this->assertEquals($zone_id, $res['global_area_id']);

		// Modify Plant
		$mod = [
			'global_id' => $p0['global_id'],
			'global_area_id' => $this->zone_id,
			'global_batch_id' => $p0['global_batch_id'],
			'plant_created_at' => date('m/d/Y'), //  g:i:s a'), // $p0['plant_created_at'],
			'origin' => 'plant', // $p0['origin'],
			'stage' => $p0['stage'],
		];
		$res = $this->post('plants/update', [ 'plant' => $mod ]);
		$res = $this->assertValidResponse($res, 200, 'Plant/Move');
		$this->assertIsArray($res);
		$this->assertCount(25, $res);

		$this->assertEquals($this->zone_id, $res['global_area_id'], 'LeafData Fails to Update Area_ID');

	}

}
