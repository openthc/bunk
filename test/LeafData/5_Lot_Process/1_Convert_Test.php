<?php
/**
 * Conversions
 * Taking Net Materials into Processed Lots of "intermediate" materials.
 */

namespace Test\LeafData\Lot_Process;

class Convert extends \Test\OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-g0-public'],
			'license-secret' => $_ENV['leafdata-g0-secret'],
		]);

		// $zone_id = $_ENV['leafdata-g0-zone'];
	}

	/**
	 * Flower to Flower Lot in MJF/LD
	 */
	function test_flower_bulk_to_production_lot()
	{

	}

	/**
	 * Flower to Other | Other Material Lot
	 */
	function test_flower_net_to_other()
	{
		// Test Both
	}

	function test_flower_net_to_middle()
	{
		// Test Flower Directly into An Processed Oil or Extract Like Thing
		// CO2 Concentrate | Ethanol Concentrate | Food Grade Solvent Concentrate | Hydrocarbon Concentrate | Infused Cooking Medium | Marijuana Mix | Non-Solvent Based Concentrate
	}

	function test_gradeb_to_gradea()
	{
		// Upscale Other to FLower!? or Flower Lot
	}

	function test_gradeb_to_lot()
	{

	}

	function test_gradeb_to_extract()
	{

	}

}
