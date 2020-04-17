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

		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-g0-public'],
			'license-secret' => $_ENV['leafdata-g0-secret'],
		]);

		$l0 = $this->find_random_lot();

		// File Transfer
		$t0 = [
			'manifest_type' => 'delivery',
			// 'multi_stop' => 0, // Throws:  {"error":true,"error_message":"Undefined index: multi_stop","validation_messages":[]}
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

		// Check Status from Soruce Side


		// Connect Target License
		$this->cre_target = $this->_api([
			'license' => $_ENV['leafdata-p0-public'],
			'license-secret' => $_ENV['leafdata-p0-secret'],
		]);

		// Make Transfer
		$res = $this->cre_target->post('/inventory_transfers', [ 'inventory_transfer' => [ $t0 ] ]);
		$this->assertValidResponse($res);
		var_dump($res);

		// Get Transfer Data
		$res = $this->cre_target->get('/inventory_transfers');
		$this->assertValidResponse($res);

		// Find Transfer and verify Status
		var_dump($res);
		// Foreach ....

		// Sleep?

		// Find A Gain?




	}

	function test_lag_p_to_r()
	{

	}


}
