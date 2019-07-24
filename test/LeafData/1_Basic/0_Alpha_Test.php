<?php
/**
 * Not Sure what to Test Here
 */

namespace Basic;

class Alpha extends \OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function test_get_all_things()
	{
		$res = $this->_help_get_general('areas?f_date1=2019-06-01');
		$res = $this->_help_get_general('batches?f_date1=2019-06-01');
		$res = $this->_help_get_general('disposals?f_date1=2019-06-01');
		$res = $this->_help_get_general('inventory_types?f_date1=2019-06-01');
		$res = $this->_help_get_general('inventory_adjustments?f_date1=2019-06-01');
		$res = $this->_help_get_general('inventory_transfers?f_date1=2019-06-01');
		$res = $this->_help_get_general('lab_results?f_date1=2019-06-01');
		$res = $this->_help_get_general('plants?f_date1=2019-06-01');
		$res = $this->_help_get_general('sales?f_date1=2019-06-01');
		$res = $this->_help_get_general('strains?f_date1=2019-06-01');
		$res = $this->_help_get_general('users?f_date1=2019-06-01');

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

}
