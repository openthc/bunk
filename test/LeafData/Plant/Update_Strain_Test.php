<?php
/**
 * Try to Test the Batch Mess Here
 */

namespace Test\Plant;

class Update_Strain_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	public function test_update_strain_fail()
	{
		$p = $this->find_random_plant();
		$s = $this->find_random_strain();

		// $res = $this->get('strains');
		// $this->assertIsArray($res);
		// $this->assertIsArray($res['data']);

		$res = $this->get('plants?f_global_id=' . $p['global_id']);
		$this->assertIsArray($res);
		$this->assertIsArray($res['data']);
		$p0 = $res['data'][0];
		$this->assertNotEmpty($p0['origin']);
		// var_dump($p0);

		$res = $this->post('plants/update', [ 'plant' => [
			'global_id' => $p['global_id'],
			'global_batch_id' => $p0['global_batch_id'],
			'global_strain_id' => $s['global_id'],
			'origin' => $p0['origin'],
			'stage' => $p0['stage'],
		]]);
		$res = $this->assertValidResponse($res, 200);
		$this->assertIsArray($res);

		$this->assertEquals($s['global_id'], $res['global_strain_id'], 'LeafData does not update strain');

	}


	public function test_update_strain_batch_first()
	{
		$p = $this->find_random_plant();
		$s = $this->find_random_strain();

		// $res = $this->get('strains');
		// $this->assertIsArray($res);
		// $this->assertIsArray($res['data']);

		$res = $this->get('plants?f_global_id=' . $p['global_id']);
		$this->assertIsArray($res);
		$this->assertIsArray($res['data']);
		$p0 = $res['data'][0];
		$this->assertNotEmpty($p0['origin']);
		$this->assertNotEquals($s['global_id'], $p0['global_strain_id']);

		$res = $this->get('batches?f_global_id=' . $p0['global_batch_id']);
		$this->assertIsArray($res);
		$this->assertIsArray($res['data']);
		$b0 = $res['data'][0];
		$this->assertNotEmpty($b0['origin']);
		$this->assertNotEquals($s['global_id'], $b0['global_strain_id']);

		$res = $this->post('batches/update', [ 'batch' => [
			'global_id' => $b0['global_id'],
			'global_area_id' => $b0['global_area_id'],
			'global_strain_id' => $s['global_id'],
			'type' => $b0['type'],
			'origin' => $b0['origin'],
			'num_plants' => $b0['num_plants'],
		]]);
		$res = $this->assertValidResponse($res, 200);
		$this->assertIsArray($res);

		// Verify that Plant didn't Change
		$res = $this->get('plants?f_global_id=' . $p['global_id']);
		$this->assertIsArray($res);
		$this->assertIsArray($res['data']);
		$p1 = $res['data'][0];
		$this->assertNotEquals($s['global_id'], $p1['global_strain_id']);

		// Now Modify Plant
		$res = $this->post('plants/update', [ 'plant' => [
			'global_id' => $p['global_id'],
			'global_batch_id' => $p0['global_batch_id'],
			'global_strain_id' => $s['global_id'],
			'origin' => $p0['origin'],
			'stage' => $p0['stage'],
		]]);
		$res = $this->assertValidResponse($res, 200);
		$this->assertIsArray($res);

		// Strain Changed Right?
		$this->assertEquals($s['global_id'], $res['global_strain_id'], 'LeafData did not update strain');

	}

}
