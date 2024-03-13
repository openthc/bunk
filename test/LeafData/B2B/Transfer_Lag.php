<?php
/**
 * Test Transfer Lag, the object is cached by LeafData poorly
 */

namespace Test\LeafData\B2B;

class Transfer_Lag extends \Test\OpenTHC_Bunk_LeafData_Test
{
	/**
	 * Intentionally use the wrong values when submitting the transfer accept
	 * Then observe the data in the supply side license being scrambled
	 * @return [type] [description]
	 */
	function test_transfer_lag()
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-p'],
			'license-secret' => $_ENV['leafdata-license-p-secret'],
		]);

		// Create Manifest

		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-r'],
			'license-secret' => $_ENV['leafdata-license-r-secret'],
		]);

		// Accept Manifest
		$transfer_id = '';
		$transfer_accept_zone_id = getenv('R_ZONE_0');
		$res = $this->get('inventory_transfers?f_global_id=' . $transfer_id);
		$transfer_obj = $res['data'][0];
		$this->assertNotEmpty($transfer_obj['global_id']);
		$this->assertEquals($transfer_id, $transfer_obj['global_id']);

		// // Accept Manifest
		// $arg = array(
		// 	'global_id' => $transfer_id,
		// 	'inventory_transfer_items' => array(),
		// );

		//
		// foreach ($transfer_obj['inventory_transfer_items'] as $iti_incoming) {
		// 	$iti_accepted = array(
		// 		'global_id' => $iti_incoming['global_id'],
		// 		'received_qty' => floatval($iti_incoming['qty']),
		// 		'global_received_area_id' => $transfer_accept_zone_id,
		// 		//'global_received_strain_id' => $S_want,
		// 		//'global_received_inventory_type_id' => $P_want,
		// 	);
		// 	$arg['inventory_transfer_items'][] = $iti_accepted;
		// }
		//
		// var_dump($arg);
		//
		// $res = $this->post('inventory_transfers/api_receive', $arg);
		// // Now this is an Object
		// $transfer_obj1 = $res;
		// $this->assertNotEmpty($transfer_obj1['global_id']);
		// $this->assertEquals($transfer_id, $transfer_obj1['global_id']);
		// $this->assertEquals('received', $transfer_obj1['status']);
		//
		// @todo Verify All are Received QTY Match

		// Time how long it takes for LeafData to recognize
		// Wait 5 Minutes
		$t0 = microtime(true);
		$try_idx = 0;
		$try_max = 600;
		do {

			$try_idx++;

			// Pull Object
			// It's not Updated Yet
			$res = $this->get('inventory_transfers?f_global_id=' . $transfer_id);
			$transfer_obj2 = $res['data'][0];
			$this->assertNotEmpty($transfer_obj2['global_id']);
			$this->assertEquals($transfer_id, $transfer_obj2['global_id']);

			switch ($transfer_obj2['status']) {
			case 'in-transit':
				// Still broken
				$tx = microtime(true) - $t0;
				echo "Lag: $tx\n";
				break;
			case 'received':
				// Finally!
				$try_idx = $try_max + 1;
			}

			sleep(1);

		} while ($try_idx < $try_max);

		// Now it's Updated
		// But! During this time it's already updated on the SENDER side

		$tx = microtime(true) - $t0;
		echo "Cache Busted: $tx\n";

		// Pull Object
		// It's not Updated Yet
		$res = $this->get('inventory_transfers?f_global_id=' . $transfer_id);
		$transfer_obj2 = $res['data'][0];
		$this->assertNotEmpty($transfer_obj2['global_id']);
		$this->assertEquals($transfer_id, $transfer_obj2['global_id']);
		$this->assertEquals('received', $transfer_obj2['status']);

		// Looks like a cache-invalidation issue

		// Also of note, if you fetch all Transfers, the listed objects will have a different status
		// than the object when directly queried

	}

}
