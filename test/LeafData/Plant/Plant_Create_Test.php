<?php
/**


*/

class Plant_Create_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function testMake_Plants_Strain_Wrong()
	{
		$z_id = getenv('G_ZONE_0');

		$add = array(
			'global_area_id' => $z_id, // $R['guid'],
			'global_batch_id' => $b_id, // $B['guid'],
			'global_strain_id' => $s_id, // $S['guid'],
			'plant_created_at' => strftime('%Y-%m-%d'),
			//'origin' => 'none',
			'stage' => 'veg', // $_POST['plant_stage'],
			'is_mother' => 1,
		);

		$res = $this->post('plants', $add);
		$res = $this->assertValidResponse($res, 201, __METHOD__);

		$this->assertEquals('success', $res['status'], 'Failed to Create Plant');

		// $this->assertEquals($s_id, $res['result'][0];

	}

}
