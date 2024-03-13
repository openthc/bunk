<?php
/**
 * Try to move Area and Strain at the same time
 */

namespace Test\Basic;

class Lot_Search extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function test_filter_external_id()
	{
		$res = $this->ghc->get('inventories?f_external_id=');
		$res = $this->assertValidResponse($res);
	}

	function test_filter_batch_id()
	{
		$res = $this->ghc->get('inventories?f_batch_id=WAGWT.BA569W');
		$res = $this->assertValidResponse($res);
		var_dump($res);
	}

	function test_filter_id()
	{
		$res = $this->ghc->get('inventories?f_global_id=');
		$res = $this->assertValidResponse($res);

	}

	function test_filter_type()
	{
		$res = $this->ghc->get('inventories?f_type=');
		$res = $this->assertValidResponse($res);

	}

	// created_at ?={mm/dd/yyyy}&f_date2={mm/dd/yyyy}
	function test_filter_created_at()
	{
		$res = $this->ghc->get('inventories?f_date1=');
		$res = $this->assertValidResponse($res);

	}

}
