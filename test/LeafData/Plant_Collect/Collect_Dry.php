<?php
/**
 * Test a Harvest.
 * Observe if Plants Move
 * Observe if other Plants Move
 */

namespace Test\Plant_Collect;

class Collect_Dry extends \Test\OpenTHC_Bunk_LeafData_Test
{
	/**
	 * Whole Batch Only
	 */
	public function test_collect_dry_v1370()
	{
		// For Version <= 1.37.5
		$buds = floatval($buds);
		$trim = floatval($trim);
		$junk = floatval($junk);

		$arg = array(
			'global_id' => 'WAGWT.BA4N2Z',
			'harvested_end_at' => strftime('%Y-%m-%d'),
			'harvest_stage' => 'cure',
			'flower_dry_weight' => 444.44,
			'other_dry_weight' => 333.33,
			// 'qty_cure' => $buds + $trim,
		);
		$res = $this->ghc->post('batches/update', $arg);
		$hsc = $res->getStatusCode();
		$res = json_decode($res->getBody(), true);

		$this->assertEquals(422, $hsc);
		$this->assertIsArray($res);

		// HTTP/1.1 422 Unprocessable Entity
		// print_r($res);
		// {"error":true,"error_message":"","validation_messages":{"global_id":["You may not modify a harvest batch"],"type":["The type field is required."],"strain_id":["The strain id field is required."],"area_id":["The area id field is required."]}}

	}

	/**
	 * Whole Batch, One Time
	 */
	public function test_collect_dry_v1375()
	{
		$arg = array(
			'global_batch_id' => 'WAGWT.BA4N2Z',
			'global_flower_area_id' => $_ENV['leafdata-zone-guid'],
			'global_other_area_id' => $_ENV['leafdata-zone-guid'],
			'flower_dry_weight' => 444.44,
			'other_dry_weight' => 333.33,
			'flower_waste' => 222.22, // "11.00",
			'other_waste' => 111.11, // "3.00",
		);
		$res = $this->post('batches/cure_lot', $arg);
		print_r($res);

		$this->assertTrue(true);

	}

}
