<?php
/**
 * Not Sure what to Test Here
 */

namespace Test\Basic;

class Alpha extends \OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function test_get_all_things_full()
	{
		$res = $this->_help_get_general('areas');
		$res = $this->_help_get_general('batches');
		$res = $this->_help_get_general('disposals');
		// $res = $this->_help_get_general('inventory');
		$res = $this->_help_get_general('inventory_types');
		$res = $this->_help_get_general('inventory_adjustments');
		$res = $this->_help_get_general('inventory_transfers');
		$res = $this->_help_get_general('lab_results');
		$res = $this->_help_get_general('plants');
		$res = $this->_help_get_general('sales');
		$res = $this->_help_get_general('strains');
		$res = $this->_help_get_general('users');

	}

	function test_get_all_things_fast()
	{
		$res = $this->_help_get_general('areas');
		$res = $this->_help_get_general('batches');
		$res = $this->_help_get_general('disposals?f_date1=2019-06-01');
		// $res = $this->_help_get_general('inventory?f_date1=2019-06-01');
		$res = $this->_help_get_general('inventory_types');
		$res = $this->_help_get_general('inventory_adjustments?f_date1=2019-06-01');
		$res = $this->_help_get_general('inventory_transfers?f_date1=2019-06-01');
		$res = $this->_help_get_general('lab_results?f_date1=2019-06-01');
		$res = $this->_help_get_general('plants');
		$res = $this->_help_get_general('sales?f_date1=2019-06-01');
		$res = $this->_help_get_general('strains');
		$res = $this->_help_get_general('users');
	}

	function test_get_all_things_page_two()
	{
		$res = $this->_help_get_general('areas?page=2');
		$res = $this->_help_get_general('batches?page=2');
		$res = $this->_help_get_general('disposals?page=2');
		// $res = $this->_help_get_general('inventory?page=2');
		$res = $this->_help_get_general('inventory_types?page=2');
		$res = $this->_help_get_general('inventory_adjustments?page=2');
		$res = $this->_help_get_general('inventory_transfers?page=2');
		$res = $this->_help_get_general('lab_results?page=2');
		$res = $this->_help_get_general('plants?page=2');
		$res = $this->_help_get_general('sales?page=2');
		$res = $this->_help_get_general('strains?page=2');
		$res = $this->_help_get_general('users?page=2');

	}

	function test_get_all_things_page_half()
	{
		$res = $this->_help_get_general('areas?page_size=100');
		$res = $this->_help_get_general('batches?page_size=100');
		$res = $this->_help_get_general('disposals?page_size=100');
		// $res = $this->_help_get_general('inventory?page_size=100');
		$res = $this->_help_get_general('inventory_types?page_size=100');
		$res = $this->_help_get_general('inventory_adjustments?page_size=100');
		$res = $this->_help_get_general('inventory_transfers?page_size=100');
		$res = $this->_help_get_general('lab_results?page_size=100');
		$res = $this->_help_get_general('plants?page_size=100');
		$res = $this->_help_get_general('sales?page_size=100');
		$res = $this->_help_get_general('strains?page_size=100');
		$res = $this->_help_get_general('users?page_size=100');

	}


	function _help_get_general($x)
	{
		$res = $this->get($x);
		// $this->assertValidResponse($res);
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

}
