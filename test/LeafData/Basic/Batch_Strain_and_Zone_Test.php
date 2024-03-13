<?php
/**
 * Try to move Area and Strain at the same time
 */

namespace Test\Batch;

class Batch_Strain_and_Zone_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function test_batch_update_area_and_strain()
	{
		$s_id = getenv('G_STRAIN_0');
		$z_id = getenv('G_ZONE_0');

		$B = $this->find_random_batch_of_type('plant');
		echo "Updating Batch: {$B['global_id']}\n";
		// $batch_id = getenv('G_BATCH_0');
		// $this->assertNotEmpty($plant_id, 'Provide G_BATCH_0 for this Test');
		//
		// $s_id = getenv('G_STRAIN_0');
		// $this->assertNotEmpty($plant_id, 'Provide G_STRAIN_0 for this Test');
		//
		// $z_id = getenv('G_ZONE_0');
		// $this->assertNotEmpty($plant_id, 'Provide G_ZONE_0 for this Test');

		// $res = $this->httpClient->get('batches?f_global_id=' . $batch_id);
		// $res = $this->assertValidResonse($res, 200);

		$mod = array(
			'global_id' => $B['global_id'],
			'global_area_id' => $z_id,
			'global_strain_id' => $s_id, // $this->_Batch['global_strain_id'],'
			'type' => $B['type'],
			'origin' => $B['origin'],
			'num_plants' => $B['num_plants'],
		);
		// var_dump($mod);

		$res = $this->post('batches/update', [ 'batch' => $mod ]);
		$res = $this->assertValidResponse($res, 200, __METHOD__);
		$this->assertIsArray($res);
		$this->assertCount(40, $res);
		$this->assertEquals($s_id, $res['global_strain_id']);
		$this->assertEquals($z_id, $res['global_area_id']);

		// //print_r($res);
		//
		// $this->assertEquals('success', $res['status'], 'Successful Update');
		// $this->assertEquals($this->_Batch['global_id'], $res['result']['global_id'], 'Batch ID OK');
		// $this->assertEquals($this->_Batch['global_strain_id'], $res['result']['global_strain_id'], 'Strain ID OK');
		// $this->assertEquals($R['global_id'], $res['result']['global_area_id'], 'Area ID Updated');
		//
		// // Now Read the Plant, Notice in the Same Room as Before
		// foreach ($this->_plant_list as $p0) {
		// 	//$this->assertNotEquals($R['global_id'], $p0['global_area_id']);
		// 	$p1 = $this->_cre->plant()->one($p0['global_id']);
		// 	$this->assertEquals($R['global_id'], $p1['global_area_id'], 'Plant Not Moved');
		// }


	}

	function x_test_propagation_material_batch_update_area_and_strain_pm()
	{
		// propagation+material
	}

	function x_test_plant_batch_update_area_and_strain()
	{
		// propagation+material
	}

	function x_test_harvest_batch_update_area_and_strain()
	{

	}

	function x_test_intermediate_end_product_batch_update_area_and_strain()
	{

	}

}
		//
		//
		// $res = $this->ghc->area()->all();
		// if ('success' == $res['status']) {
		// 	$z_list = $res['result']['data'];
		// }
		//
		// if ('success' == $res['status']) {
		// 	$b_list = $res['result']['data'];
		// }
		//
		// //var_dump($this->_batch_list);
		//
		// $x = array_rand($this->_batch_list);
		// $B = $this->_batch_list[ $x ];
		// $this->_Batch = $B;
		//
		// $res = $this->ghc->plant()->all(array(
		// 	'f_batch_id' => $this->_Batch['global_id'],
		// ));
		//
		// if ('success' == $res['status']) {
		// 	$this->_plant_list = $res['result']['data'];
		// 	//var_dump($this->_plant_list);
		// }
