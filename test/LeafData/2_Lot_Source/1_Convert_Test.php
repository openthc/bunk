<?php
/**
 *
 */

namespace Test\LeafData\2_Lot_Source;

class Convert_Test
{
	protected function setUp() : void
	{
		// Reset API Connection to Lab
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-g0-public'],
			'license-secret' => $_ENV['leafdata-g0-secret'],
		]);
	}

	/**
	 * Conversion Test of Clone Type to Clone Type
	 */
	function test_clone_to_clone()
	{
		// $lot = $this->_find_random_lot([ type = clone ]);

	}

	function test_clone_to_plant()
	{
	}

	function test_clone_to_seed()
	{
	}

	function test_tissue_to_clone()
	{
	}

	function test_tissue_to_plant()
	{
	}

	function test_tissue_to_tissue()
	{
	}

	function test_tissue_to_seed()
	{
	}

	function test_seed_to_clone()
	{
	}

	function test_seed_to_plant()
	{
	}

	function test_seed_to_seed()
	{
	}

}
