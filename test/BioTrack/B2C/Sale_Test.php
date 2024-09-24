<?php
/**
 * Test the Sale Actions on the BioTrackTHC API
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack\B2C;

class Sale_Test extends \OpenTHC\Bunk\Test\BioTrack\Base
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('r');
	}

	function testSaleDispense()
	{
		//this should be a parameter or arguments
		$res = $this->thc->sale_dispense(array(
			'barcodeid' => 123456789,
			'quantity' => 1,
			'price' => 10
		));
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);

		$this->assertEquals($res['success'], 1);
	}

	function testSaleVoid()
	{
		//this should be a parameter or arguments
		$res = $this->thc->sale_void(array(
			'transactionid' => 123456789
		));
		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached

	}

	function testSaleModify()
	{
		//this should be a parameter or arguments
		$res = $this->thc->sale_modify(array(
			'transactionid' => 123456789,
			'barcodeid' => 1235646,
		));
		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached

	}

	function testSaleRefund()
	{
		//this should be a parameter or arguments
		$res = $this->thc->sale_refund(array(
			'barcodeid' => 12356789,
			'quantity' => 1,
			'price' > 10.50
		));

		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached

	}

	// && MOre
}
