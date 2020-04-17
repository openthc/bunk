<?php
/**
 * Testing the Lag on Transfer Data State
 */

namespace Test\LeafData\B2B;

class Lag extends \Test\OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = null;
		// $this->ghc = $this->_api([
		// 	'license' => $_ENV['leafdata-g0-public'],
		// 	'license-secret' => $_ENV['leafdata-g-secret'],
		// ]);

		// $zone_id = $_ENV['leafdata-g-zone'];

		// $this->cre_source = $this->_api([
		// 	'license' => $_ENV['leafdata-g0'],
		// 	'license-secret' => $_ENV['leafdata-g0-secret'],
		// ]);

		// $this->cre_source = $this->_api([
		// 	'license' => $_ENV['leafdata-p0'],
		// 	'license-secret' => $_ENV['leafdata-p0-secret'],
		// ]);

	}

	/**
	 * Flower to Flower Lot in MJF/LD
	 */
	function test_lag_g_to_p()
	{

		$this->cre_source = $this->_api([
			'license' => $_ENV['leafdata-g0-public'],
			'license-secret' => $_ENV['leafdata-g0-secret'],
		]);

		$res = $this->cre_source->get('inventories?f_global_id=WAGWT.IN4HPP');
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$l0 = $res['data'][0];
		// var_dump($l0);

		// File Transfer
		$t0 = [
			'manifest_type' => 'delivery',
			'multi_stop' => '0', // if missing throws: {"error":true,"error_message":"Undefined index: multi_stop","validation_messages":[]}
			'est_departed_at' => date('m/d/Y', time()),
			'est_arrival_at' => date('m/d/Y', time() + 3600),
			//'route' => 'Best Route Possible',
			//'stops' => '0',
			'vehicle_description' => 'TEST vehicle_description',
			'vehicle_license_plate' => 'TEST vehicle_license_plate',
			//'vehicle_color' => $V['color'],
			//'vehicle_year' => $V['year'],
			'vehicle_vin' => $V['vin'],
			//'notes' => 'Talk to Sammy',
			//'type' => 'inventory',
			'transfer_type' => 'transfer',
			'global_from_mme_id' => $_ENV['leafdata-g0-global'],
			'global_to_mme_id' => $_ENV['leafdata-p0-global'],
			'transporter_name1' => 'TEST transporter_name1',
			'transporter_name2' => 'TEST transporter_name2',
			'inventory_transfer_items' => [],
		];

		$t0['inventory_transfer_items'][] = [
			'is_sample' => '0',
			'sample_type' => '',
			'product_sample_type' => '',
			'retest' => '',
			'is_for_extraction' => '',
			'global_batch_id' => $l0['global_batch_id'],
			'global_inventory_id' => $l0['global_id'],
			'qty' => $l0['qty'],
			'uom' => $l0['uom'],
			'price' => 1 * $l0['qty'],
		];

		// Make Transfer
		$res = $this->cre_source->post('inventory_transfers', [ 'json' => [ 'inventory_transfer' => [ $t0 ] ] ]);
		$res = $this->assertValidResponse($res);
		$this->assertCount(1, $res);
		$t1 = $res[0];
		$this->assertCount(40, $t1);

		// Check Status from Source Search
		$res = $this->cre_source->get('inventory_transfers');
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$this->assertCount(9, $res);
		$this->assertNotEmpty($res['data']);
		foreach ($res['data'] as $tX) {
			if ($tX['global_id'] == $t1['global_id']) {
				$t2 = $tX;
				break;
			}
		}
		$this->assertEquals($t1['global_id'], $t2['global_id']);
		$this->assertEquals($t1['status'], $t2['status']);

		// Check Status from Source Single
		$res = $this->cre_source->get('inventory_transfers?f_global_id=' . $t1['global_id']);
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$this->assertCount(9, $res);
		$this->assertNotEmpty($res['data']);
		$this->assertCount(1, $res['data']);
		$t2 = $res['data'][0];

		$this->assertEquals($t1['global_id'], $t2['global_id']);
		$this->assertEquals($t1['status'], $t2['status']);


		// Connect Target License
		$this->cre_target = $this->_api([
			'license' => $_ENV['leafdata-p0-public'],
			'license-secret' => $_ENV['leafdata-p0-secret'],
		]);

		// Get Transfer Data
		// Find Transfer and verify Status
		$res = $this->cre_target->get('inventory_transfers?f_global_id=' . $t1['global_id']);
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$this->assertCount(9, $res);
		$this->assertNotEmpty($res['data']);
		$this->assertCount(1, $res['data']);
		$t3 = $res['data'][0];
		$this->assertEquals($t2['global_id'], $t3['global_id']);
		$this->assertEquals($t2['status'], $t3['status']);

		// Now Relase
		$res = $this->cre_source->post('inventory_transfers/api_in_transit', [ 'json' => [ 'global_id' => $t1['global_id'] ] ]);
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$t1 = $res;

		// Check Status Source Search
		$res = $this->cre_source->get('inventory_transfers');
		$res = $this->assertValidResponse($res);
		$this->assertCount(9, $res);
		$this->assertNotEmpty($res['data']);
		foreach ($res['data'] as $tX) {
			if ($tX['global_id'] == $t1['global_id']) {
				$t2 = $tX;
				break;
			}
		}
		$this->assertEquals($t1['global_id'], $t2['global_id']);
		$this->assertEquals($t1['status'], $t2['status']);

		// Check Status Source Single
		$res = $this->cre_source->get('inventory_transfers?f_global_id=' . $t1['global_id']);
		$res = $this->assertValidResponse($res);
		$this->assertCount(9, $res);
		$this->assertNotEmpty($res['data']);
		$this->assertCount(1, $res['data']);
		$t2 = $res['data'][0];

		$this->assertEquals($t1['global_id'], $t2['global_id']);
		$this->assertEquals($t1['status'], $t2['status']);

		// Check Status Target Search
		$t3 = null;
		$res = $this->cre_target->get('inventory_transfers');
		$res = $this->assertValidResponse($res);
		$res = $this->assertValidResponse($res);
		$this->assertCount(9, $res);
		$this->assertNotEmpty($res['data']);
		foreach ($res['data'] as $tX) {
			if ($tX['global_id'] == $t1['global_id']) {
				$t3 = $tX;
				break;
			}
		}
		$this->assertEquals($t1['global_id'], $t3['global_id']);
		$this->assertEquals($t1['status'], $t3['status']);

		// Check Status Target Single
		$t3 = null;
		$res = $this->cre_target->get('inventory_transfers?f_global_id=' . $t1['global_id']);
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$this->assertCount(9, $res);
		$this->assertNotEmpty($res['data']);
		$this->assertCount(1, $res['data']);
		$t3 = $res['data'][0];
		$this->assertEquals($t1['global_id'], $t3['global_id']);
		$this->assertEquals($t1['status'], $t3['status']);

	}

	function test_lag_p_to_r()
	{

		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-p0-public'],
			'license-secret' => $_ENV['leafdata-p0-secret'],
		]);		// $l0 = $this->find_random_lot();
		// $res = $this->ghc->get('inventories?f_global_id=WAGWT.IN4HPN');
		// $res = $this->assertValidResponse($res);
		// // var_dump($res);
		// $l0 = $res['data'][0];
		// var_dump($l0);

		// $l0 = $this->find_random_lot();
		$res = $this->ghc->get('inventories?f_global_id=WAMWTP.IN5BA6');
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$l0 = $res['data'][0];
		// var_dump($l0);

		// File Transfer
		$t0 = [
			'manifest_type' => 'delivery',
			'multi_stop' => '0', // if missing throws: {"error":true,"error_message":"Undefined index: multi_stop","validation_messages":[]}
			'est_departed_at' => date('m/d/Y', time()),
			'est_arrival_at' => date('m/d/Y', time() + 3600),
			//'route' => 'Best Route Possible',
			//'stops' => '0',
			'vehicle_description' => 'TEST vehicle_description',
			'vehicle_license_plate' => 'TEST vehicle_license_plate',
			//'vehicle_color' => $V['color'],
			//'vehicle_year' => $V['year'],
			'vehicle_vin' => $V['vin'],
			//'notes' => 'Talk to Sammy',
			//'type' => 'inventory',
			'transfer_type' => 'transfer',
			'global_from_mme_id' => $_ENV['leafdata-p0-global'],
			'global_to_mme_id' => $_ENV['leafdata-r0-global'],
			'transporter_name1' => 'TEST transporter_name1',
			'transporter_name2' => 'TEST transporter_name2',
			'inventory_transfer_items' => [],
		];

		$t0['inventory_transfer_items'][] = [
			'is_sample' => '0',
			'sample_type' => '',
			'product_sample_type' => '',
			'retest' => '',
			'is_for_extraction' => '',
			'global_batch_id' => $l0['global_batch_id'],
			'global_inventory_id' => $l0['global_id'],
			'qty' => $l0['qty'],
			'uom' => $l0['uom'],
			'price' => 1 * $l0['qty'],
		];

		// Make Transfer
		$res = $this->post('inventory_transfers', [ 'inventory_transfer' => [ $t0 ] ] );
		$res = $this->assertValidResponse($res);
		$this->assertCount(1, $res);
		$t1 = $res[0];
		$this->assertCount(40, $t1);

	}


}
