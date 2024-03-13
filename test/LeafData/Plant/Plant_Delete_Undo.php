<?php
/**
 * Test a Harvest.
 * Observe if Plants Move
 * Observe if other Plants Move
 */

namespace Plant_Collect;

class Collect_Dry extends \Test\OpenTHC_Bunk_LeafData_Test
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
	public function test_plant_deleted_to_veg()
	{
		$b_id = getenv('G_BATCH_0');
		$p_id = getenv('G_PLANT_0');

		$arg = array('plant' => array(array(
			'global_id' => $p_id,
			'global_batch_id' => $b_id,
			'plant_created_at' => _date('m/d/Y g:i a', time()),
			'origin' => 'clone',
			'stage' => 'growing',
		)));

		$res = $this->ghc->post('plants/update', array('json' => $arg));
		$res = $this->assertValidResponse($res);

		$this->assertTrue(false);
	}

}
