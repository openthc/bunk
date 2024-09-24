<?php
/**
 * Test a Harvest.
 * Observe if Plants Move
 * Observe if other Plants Move
 */

namespace OpenTHC\Bunk\Test\LeafData\Lot_Package;

class Test_Sub_Lot_Gets_Fuct extends \OpenTHC\Bunk\Test\LeafData_Test
{
	public function test_shit()
	{
		// Given Bulk Lot_A, of Strain_A, Product_A
		// Convert to Lot_B, Strain_A, Product_B (Retail)
		// Modify Lot_B, modify to Strain_B
		// SubLot Lot_B
		// !! Expect: Lot_B of Strain_B, Product_B
		// !! Actual: Lot-B of Strain_A, Product_B

	}

}
