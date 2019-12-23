<?php

class Alpha extends \Test\OpenTHC_Bunk_LeafData_Test
{
	/**
	 * Makes sure the Retailer can Change the UOM
	 * @return [type] [description]
	 */
	function testRetail_Change_UOM()
	{
		$this->ghc = $this->_api(array(
			'license' => $_ENV['leafdata-license-r'],
			'license-secret' => $_ENV['leafdata-license-r-secret'],
		));

		$L = $this->get('inventories?f_global_id=WARWTR.IN1O0');
		$this->assertIsArray($L);
		$this->assertEquals('gm', $L['uom'], 'Source Inventory should use UOM');

		$P = $this->get('inventory_types?f_global_id=' . $lot['global_inventory_type_id']);
		$this->assertIsArray($P);


		$mod = array(
			'global_id' => $L['global_id'],
			'global_area_id' => $L['global_area_id'],
			'global_batch_id' => $L['global_batch_id'],
			'global_inventory_type_id' => $L['global_inventory_type_id'],
			'qty' => $L['qty'],
			'uom' => 'ea',
		);
		// print_r($mod);

		// $this->assertTrue(false, 'Need to Try to Update Here');
		$res = $this->post('inventories/update', $mod); // '); // $this->_rbe->inventory()->update($update);
		$res = $this->assertValidResponse($res, 200);

		// $this->assertEquals('success', $res['status']);
		// $res = $this->ghc->get('inventories?f_global_id=WARWTR.IN1O0');
		// var_dump($res);
		// $this->assertEquals('ea', $res['uom'], 'Lot UOM did not change');

	}

}
