<?php
/**
 * Test a Harvest.
 * Observe if Plants Move
 * Observe if other Plants Move
 */

namespace Test\Plant_Collect;

class Harvest_Batch_Zone_Test extends \Test\OpenTHC_Bunk_LeafData_Test
{

	public function x_test_collect_wet_area_fail()
	{
		$this->assertTrue(false);

		// Get List of Plants in Batch
		$res = $this->ghc->post('plants/harvest_plants', array(
			// 'area_id' => $_ENV['leafdata-zone-guid'], // @todo Says this is required but the documentation says it's not
			'uom' => 'gm',
			'harvested_at' => date(\DateTime::RFC3339),
			'qty_harvest' => 98765.4321, // Sum of Wet & Dry
			'flower_wet_weight' => (98765.4321 * 0.60),
			'other_wet_weight' => (98765.4321 * 0.40),
			'global_flower_area_id' => $_ENV['leafdata-zone-guid'],
			//'global_other_area_id' => '',
			'global_plant_ids' => array(
				[ 'global_plant_id' => '' ],
			)
		));

		$hsc = $res->getStatusCode();
		$this->assertTrue(404, $hsc, 'They have been sending a 404 on this error, should be 400');

		$res = json_decode($res->getBody(), true);
		$this->assertIsArray($res);
		// @todo Check for "The area id field is required"
		// @todo JSON {"error":true,"error_message":"","validation_messages":{"area_id":["The area id field is required."],"flower_wet_weight":["Measurements for weight based product will be communicated to and displayed to the hundredth."],"other_wet_weight":["Measurements for weight based product will be communicated to and displayed to the hundredth."]}}
		//$this->assert$error=true;
	}

	public function test_collect_wet()
	{
		$plant_list = array(
			'WAGWT.PL8IBT',
			'WAGWT.PL8IBU',
		);

		$buds = 999;
		$trim = 888;


		// Get List of Plants in Batch
		$add = array(
			'global_area_id' => $_ENV['leafdata-zone-guid'], // @todo Says this is required but the documentation says it's not
			'global_flower_area_id' => $_ENV['leafdata-zone-guid'],
			'global_other_area_id' => $_ENV['leafdata-zone-guid'],
			'global_harvest_batch_id' => '',
			'global_plant_ids' => array(),
			'uom' => 'gm',
			'harvested_at' => date('m/d/Y'),
			'qty_harvest' => ($buds + $trim), // Sum of Wet & Dry
			'flower_wet_weight' => $buds,
			'other_wet_weight' => $trim,

		);
		foreach ($plant_list as $p) {
			$add['global_plant_ids'][] = [ 'global_plant_id' => $p ];
		}
		//$add['global_plant_ids'][] = [ 'global_plant_id' => 'WAGWT.PL8IBP' ];

		$res = $this->post('plants/harvest_plants', $add);

		print_r($res);
/*
Array
(
    [created_at] => 05/25/2019 07:07pm
    [updated_at] => 05/25/2019 07:07pm
    [external_id] =>
    [planted_at] => 05/25/2019
    [harvested_at] => 05/26/2019
    [batch_created_at] => 2019-05-25 19:07:40
    [num_plants] => 1
    [status] => open
    [qty_harvest] => 9876543.21
    [uom] => gm
    [is_parent_batch] => 0
    [is_child_batch] => 1
    [type] => harvest
    [harvest_stage] => wet
    [qty_accumulated_waste] => 0.00
    [qty_packaged_flower] => 0.00
    [qty_packaged_by_product] => 0.00
    [est_harvest_at] =>
    [packaged_completed_at] =>
    [origin] => plant
    [source] => inhouse
    [qty_cure] => 0.00
    [plant_stage] => harvested
    [deleted_at] =>
    [flower_dry_weight] => 0.00
    [waste] => 0.00
    [other_waste] => 0.00
    [flower_waste] => 0.00
    [other_dry_weight] => 0.00
    [harvested_end_at] =>
    [flower_wet_weight] => 5925925.93
    [other_wet_weight] => 3950617.28
    [global_id] => WAGWT.BA4N2Z
    [global_mme_id] => WASTATE1.MM1PC
    [global_user_id] => WASTATE1.US2GM
    [global_strain_id] => WAGWT.STCRW
    [global_area_id] => WAGWT.AR1PY9
    [global_mother_plant_id] =>
    [global_flower_area_id] =>
    [global_other_area_id] =>
)
*/
		// Harvest
		// $res = $this->ghc->post('');

	}


	/**
	 * When the field is not present it fail
	 * @return [type] [description]
	 */
	public function x_test_collect_wet_fail_harvest_batch()
	{
		$this->assertTrue(false);

		$hsc = $res->getStatusCode();
		$this->assertTrue(500, $hsc, 'Error Code Changed');

		// Submit w/o this field at all "global_harvest_batch_id"
		// And LeafData will error

		$res = json_decode($res->getBody(), true);
		$this->assertIsArray($res);
		// @todo Check for "The area id field is required"
		// @todo JSON {"error":true,"error_message":"","validation_messages":{"area_id":["The area id field is required."],"flower_wet_weight":["Measurements for weight based product will be communicated to and displayed to the hundredth."],"other_wet_weight":["Measurements for weight based product will be communicated to and displayed to the hundredth."]}}
		//$this->assert$error=true;
	}


	/**
	 * Tricks to allow multiple collections using the 'propagation material' and attaching plants and updating external_id and *_weight fields
	 * @return [type] [description]
	 */

	public function x_test_collect_wet_twice_workaround()
	{
		$plant_list = array(
			'WAGWT.PL7HPC',
			'WAGWT.PL7HPB',
		);

		// Put First Collection into new Plant Batch called 'Pending Harvest'
		$add = array(
			'type' => 'propagation material',
			'status' => 'open',
			'global_area_id' => $_ENV['leafdata-zone-guid'],
			'global_strain_id' => $_ENV['leafdata-strain-guid'],
			'origin' => 'plant',
			'harvest_stage' => 'wet', // This Fails
			'flower_wet_weight' => 999.99,
			'other_wet_weight' => 888.88,
			// 'harvested_at' => date('Y-m-d'),
			// 'harvested_end_at' => date('Y-m-d', $_SERVER['REQUEST_TIME'] + 86400),
			'num_plants' => 0,
			'external_id' => 'wt:hb:c1',
		);

		$res = $this->post('batches', array('batch' => array(0 => $add)));
		// print_r($res);

		$this->assertIsArray($res);
		$this->assertCount(1, $res);

		$B = $res[0];
		$this->assertRegExp('/^WA\w+\.BA\w+$/', $B['global_id'], 'Invalid batch global id format');
		$this->assertEquals('propagation material', $B['type'], 'Not a plant batch');
		$this->assertEquals(0, $B['num_plants']);
		//$this->assertEquals('wet', $B['harvest_stage'], 'Not harvestable');
		$this->assertEquals(999.99, $B['flower_wet_weight'], 'Flower Weight Not Recorded');
		$this->assertEquals(888.88, $B['other_wet_weight'], 'Other Weight Not Recorded');
		$this->assertEquals('wt:hb:c1', $B['external_id'], 'Lost External ID');


		// Move Plants to this Batch
		foreach ($plant_list as $p) {

			$x = $this->get('plants?f_global_id=' . $p);
			$P = $x['data'][0];
			// var_dump($P);

			$mod = array(
				'global_id' => $p,
				'global_batch_id' => $B['global_id'],
				'plant_created_at' => $P['plant_created_at'],
				'origin' => $P['origin'],
				'stage' => 'harvested',
			);
			if ('inventory' == $mod['origin']) {
				$mod['origin'] = 'plant';
			}

			$res = $this->post('plants/update', array('plant' => $mod));
			//var_dump($res);
			$this->assertIsArray($res);
			$this->assertCount(25, $res); // 25 Attributes
			$this->assertEquals($B['global_id'], $res['global_batch_id'], 'Plant failed to update batch');
		}

		// Now Update The Batch w/Second Collect
		// (and WeedTraQR would re-calculate each plant thing)
		$mod = array(
			'global_id' => $B['global_id'],
			'type' => 'propagation material',
			'status' => 'open',
			'global_area_id' => $_ENV['leafdata-zone-guid'],
			'global_strain_id' => $_ENV['leafdata-strain-guid'],
			'origin' => 'plant',
			// 'harvest_stage' => 'wet', // This Fails
			'flower_wet_weight' => 999.99 + 111.11,
			'other_wet_weight' => 888.88 + 222.22,
			// 'harvested_at' => date('Y-m-d'),
			// 'harvested_end_at' => date('Y-m-d', $_SERVER['REQUEST_TIME'] + 86400),
			'num_plants' => 2,
			'external_id' => 'wt:hb:c2',
		);
		$res = $this->post('batches/update', array('batch' => $mod));
		//var_dump($res);

		$this->assertIsArray($res);
		$this->assertCount(40, $res);

		$B = $res;
		$this->assertRegExp('/^WA\w+\.BA\w+$/', $B['global_id'], 'Invalid batch global id format');
		$this->assertEquals('propagation material', $B['type'], 'Not a plant batch');
		//$this->assertEquals('wet', $B['harvest_stage'], 'Not harvestable');
		$this->assertEquals(999.99 + 111.11, $B['flower_wet_weight'], 'Flower Weight Not Recorded');
		$this->assertEquals(888.88 + 222.22, $B['other_wet_weight'], 'Other Weight Not Recorded');
		$this->assertEquals('wt:hb:c2', $B['external_id'], 'Lost External ID');


		// Now Harvest This Batch Collect Plant Batch
		$add = array(
			'global_area_id' => $_ENV['leafdata-zone-guid'], // @todo Says this is required but the documentation says it's not
			'global_harvest_batch_id' => '',
			'uom' => 'gm',
			'harvested_at' => date(\DateTime::RFC3339),
			'qty_harvest' => $B['flower_wet_weight'] + $B['other_wet_weight'], // Sum of Wet & Dry
			'flower_wet_weight' => $B['flower_wet_weight'],
			'other_wet_weight' => $B['other_wet_weight'],
			'global_flower_area_id' => $_ENV['leafdata-zone-guid'],
			'global_other_area_id' => $_ENV['leafdata-zone-guid'],
			'global_plant_ids' => array(),
		);
		foreach ($plant_list as $p) {
			$add['global_plant_ids'][] = [ 'global_plant_id' => $p ];
		}
		//var_dump($add);

		$res = $this->post('plants/harvest_plants', $add);
		var_dump($res);

		$this->assertIsArray($res);
		$this->assertCount(40, $res);
		$this->assertRegExp('/^WA\w+\.BA\w+$/', $res['global_id'], 'Invalid batch global id format');
		$this->assertEquals(floatval($B['flower_wet_weight']), $res['flower_wet_weight'], 'Flower Weight Not Recorded');
		$this->assertEquals(floatval($B['other_wet_weight']), $res['other_wet_weight'], 'Other Weight Not Recorded');


		//$this->assertIsArray($res);
		//$this->assertCount(40, $res);

	}

}
