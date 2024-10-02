<?php
/**
 * Test the Sale Actions on the BioTrackTHC API
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class B2C_Test extends \OpenTHC\Bunk\Test\BioTrack\Base
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('r');
	}

	function testSaleDispense()
	{
		//this should be a parameter or arguments
		$res = $this->cre->sale_dispense('1234567890ABCDEF', 1, 10);
		// $res = $this->assertValidResponse($res);
		$this->assertValidResponse($res);
	}

	function testSaleVoid()
	{
		//this should be a parameter or arguments
		$res = $this->cre->sale_void('123456789');
		$this->assertValidResponse($res);
	}

	function testSaleModify()
	{
		//this should be a parameter or arguments
		$res = $this->cre->sale_modify('123456789', '1235646', '2.00');
		$this->assertValidResponse($res);
	}

	function testSaleRefund()
	{
		//this should be a parameter or arguments
		$inv_list = [];
		$inv_list[] = [
			'barcodeid' => 12356789,
			'quantity' => 1,
			'price' > 10.50
		];
		$res = $this->cre->sale_refund('123456789', $inv_list);
		$this->assertValidResponse($res);
	}

}
