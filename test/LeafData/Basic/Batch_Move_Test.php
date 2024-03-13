<?php
/**

*/

class Batch_Move_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);

		$res = $this->ghc->get('areas');
		$res = $this->assertValidResponse($res);
		$this->_area_list = $res['data'];

		// $res = $this->ghc->get('batches?f_type=plant');
		// $res = $this->assertValidResponse($res);
		// $this->_batch_list = $res['data'];
		// //var_dump($this->_batch_list);
		//
		// $x = array_rand($this->_batch_list);
		// $B = $this->_batch_list[ $x ];
		// $this->_Batch = $B;
		//
		// $res = $this->_cre->plant()->all(array(
		// 	'f_batch_id' => $this->_Batch['global_id'],
		// ));
		//
		// if ('success' == $res['status']) {
		// 	$this->_plant_list = $res['result']['data'];
		// 	//var_dump($this->_plant_list);
		// }

	}

	function testMove_Batch_Plant_Fails_to_Move()
	{
		$R = $this->_area_list[ array_rand($this->_area_list) ];

		$mod = array(
			'global_id' => $this->_Batch['global_id'],
			'global_area_id' => $R['global_id'],
			'global_strain_id' => $this->_Batch['global_strain_id'],
		);
		//print_r($mod);

		$res = $this->_cre->batch()->update($mod);

		//print_r($res);

		$this->assertEquals('success', $res['status'], 'Successful Update');
		$this->assertEquals($this->_Batch['global_id'], $res['result']['global_id'], 'Batch ID OK');
		$this->assertEquals($this->_Batch['global_strain_id'], $res['result']['global_strain_id'], 'Strain ID OK');
		$this->assertEquals($R['global_id'], $res['result']['global_area_id'], 'Area ID Updated');

		// Now Read the Plant, Notice in the Same Room as Before
		foreach ($this->_plant_list as $p0) {
			//$this->assertNotEquals($R['global_id'], $p0['global_area_id']);
			$p1 = $this->_cre->plant()->one($p0['global_id']);
			$this->assertEquals($R['global_id'], $p1['global_area_id'], 'Plant Not Moved');
		}


	}

}
