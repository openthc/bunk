<?php
/**
 * Test Transfer Lag, the object is cached by LeafData poorly
 */

namespace Test\LeafData\B2B;

class Transfer_Lag extends \OpenTHC\Bunk\Test\LeafData_Test
{
	/**
	 * Intentionally use the wrong values when submitting the transfer accept
	 * Then observe the data in the supply side license being scrambled
	 * @return [type] [description]
	 */
	function test_transfer_lag()
	{
		// Connect as P
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-p'],
			'license-secret' => $_ENV['leafdata-license-p-secret'],
		]);

		// Create Transfer
		$res = $this->ghc->post('//', [
			'' => $_ENV['leafdata-license-r-guid'],
			// '' => ,
		]);


		// Connect as R
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-r'],
			'license-secret' => $_ENV['leafdata-license-r-secret'],
		]);

		// Get Transfer


		// Accept Transfer
		$transfer_accept_zone_id = $_ENV['leafdata-r-zone-guid'];
		$res = $this->get('inventory_transfers?f_global_id=' . $T0['global_id']);
		$transfer_obj = $res['data'][0];
		$this->assertNotEmpty($transfer_obj['global_id']);
		$this->assertEquals($T0['global_id'], $transfer_obj['global_id']);
		var_dump($T0);

		// Back to P


		// Verify Inventory was Decremented


		// Find Adjustment Record?

	}

}
