<?php
/**
 * Not Sure what to Test Here
 */

namespace Basic;

class Fire_Test extends \OpenTHC_Bunk_LeafData_Test
{
	function test_get_all_things()
	{
		$res = $this->_help_get_general('areas');
		$res = $this->_help_get_general('batches');
		$res = $this->_help_get_general('disposals');
		$res = $this->_help_get_general('inventory_types');
		$res = $this->_help_get_general('inventory_adjustments');
		$res = $this->_help_get_general('inventory_transfers');
		$res = $this->_help_get_general('lab_results');
		$res = $this->_help_get_general('plants');
		$res = $this->_help_get_general('sales');
		$res = $this->_help_get_general('strains');
		$res = $this->_help_get_general('users');

		//var_dump($res);
		// this one "gets" different, just one big array
		// no paging or meta structure
		$res = $this->get('mmes');
		$this->assertIsArray($res);
		$this->assertGreaterThan(1000, count($res));

	}

	function _help_get_general($x)
	{
		$res = $this->get($x);
		$this->assertArrayHasKey('total', $res);
		$this->assertArrayHasKey('per_page', $res);
		$this->assertArrayHasKey('current_page', $res);
		$this->assertArrayHasKey('last_page', $res);
		$this->assertArrayHasKey('next_page_url', $res);
		$this->assertArrayHasKey('prev_page_url', $res);
		$this->assertArrayHasKey('from', $res);
		$this->assertArrayHasKey('to', $res);
		$this->assertArrayHasKey('data', $res);
		$this->assertIsArray($res['data']);
		return $res;
	}

	public function x_testAuth()
	{
		// $this->assertEquals('none', 'none');

		// Assert they do the wrong thing here
		$res = $this->ghc->post('/batches', array('form_params' => array(
			'global_area_id' => $_ENV['leafdata-zone-guid'],
			// 'global_batch_id' => $_ENV['leafdata-batch-guid'], // Make a new One
			'global_strain_id' => $_ENV['leafdata-strain-guid'],
			'global_inventory_type_id' => $P['global_id'],
			'qty' => '',
			'uom' => '',
		)));

		$this->assertEquals(302, $res->getStatusCode());

		// Let's try to do the right thing.
		$res = $this->ghc->post('/batches', array('form_params' => array(
			'global_area_id' => $_ENV['leafdata-zone-guid'],
			// 'global_batch_id' => $_ENV['leafdata-batch-guid'], // Make a new One
			'global_strain_id' => $_ENV['leafdata-strain-guid'],
			'global_inventory_type_id' => $P['global_id'],
			'qty' => '1',
			'uom' => 'ea',
		)));

		print_r($res->getBody()->getContents());

		// , array(
		// 	'global_area_id' => $_ENV['leafdata-zone-guid'],
		// 	// 'global_batch_id' => $_ENV['leafdata-batch-guid'], // Make a new One
		// 	'global_strain_id' => $_ENV['leafdata-strain-guid'],
		// 	'global_inventory_type_id' => $P['global_id'],
		// 	'qty' => '',
		// 	'uom' => '',
		// ));

	}

}
