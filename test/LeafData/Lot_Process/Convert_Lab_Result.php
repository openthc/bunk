<?php
/**
 * Inventory
 */

namespace OpenTHC\Bunk\Test\LeafData\Lot_Process;

class Convert_Lab_Result extends \Test\OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	/**
	 * Convert 1 Source to 1 Output, Linking QA
	 */
	public function test_1s_1o_link()
	{
		$res = $this->post('conversions/create', [ 'conversion' => [
			'global_area_id' => 'WAGWT.AR1PY9',
			'global_strain_id' => 'WAGWT.ST1H31',
			'global_inventory_type_id' => 'WAGWT.TY54YD',
			'qty' => 2,
			'uom' => 'ea',
			'qty_waste_total' => 0, // required
			'product_not_altered' => 1,
			'medically_compliant' => 0, // You must submit a valid value for medically_compliant
			'inventories' => [
				[
					'global_from_inventory_id' => 'WAGWT.IN2SA2',
					'qty' => 2,
				]
			]
		]]);

		$res = $this->assertValidResponse($res, 200); // Should be 201
		//unset($res['inventories']);
		// var_dump($res);

		$this->assertIsArray($res);
		$this->assertCount(1, $res);

		$res = $res[0];
		$this->assertIsArray($res);
		$this->assertCount(25, $res);
		$this->assertNotEmpty($res['global_id']);
		$this->assertNotEmpty($res['global_lab_result_id']);

		$output_lot_id = $res['global_id'];

		$Source = $this->get('inventories?f_global_id=' . $source_lot_id);
		$Output = $this->get('inventories?f_global_id=' . $source_lot_id);


		// print_r($Source);
		// print_r($Output);

	}

	/**
	 * Convert 1 Source to 1 Output, Linking QA
	 */
	public function test_1s_1o_drop_link()
	{
		$res = $this->post('conversions/create', [ 'conversion' => [
			'global_area_id' => 'WAGWT.AR1PY9',
			'global_strain_id' => 'WAGWT.ST1H31',
			'global_inventory_type_id' => 'WAGWT.TY54YD',
			'qty' => 2,
			'uom' => 'ea',
			'qty_waste_total' => 0, // required
			'product_not_altered' => 0,
			'medically_compliant' => 0, // You must submit a valid value for medically_compliant
			'inventories' => [
				[
					'global_from_inventory_id' => 'WAGWT.IN2SA2',
					'qty' => 2,
				]
			]
		]]);

		$res = $this->assertValidResponse($res, 200); // Should be 201

		$this->assertIsArray($res);
		$this->assertCount(1, $res);

		$res = $res[0];
		$this->assertIsArray($res);
		// unset($res['inventories']);
		//var_dump($res);
		//var_dump(array_keys($res));
		$this->assertCount(25, $res);
		$this->assertNotEmpty($res['global_id']);
		$this->assertEmpty($res['global_lab_result_id'], 'Should NOT have Lab Result');

		$output_lot_id = $res['global_id'];

		$Source = $this->get('inventories?f_global_id=' . $source_lot_id);
		$Output = $this->get('inventories?f_global_id=' . $source_lot_id);

		// print_r($Source);
		// print_r($Output);

	}

}
