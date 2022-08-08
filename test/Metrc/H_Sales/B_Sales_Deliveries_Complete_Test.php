<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\H_Sales;

class B_Sales_Deliveries_Complete_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'sales/v1/deliveries/complete';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body =  array(
			[
				"Id"=> 6,
				"ActualArrivalDateTime"=> "2017-04-04T13:00:00.000",
				"AcceptedPackages"=> [
					"ABCDEF012345670000000001"
				],
				"ReturnedPackages"=> [
					[
					"Label"=> "ABCDEF012345670000000002",
					"ReturnQuantityVerified"=> 1.0,
					"ReturnUnitOfMeasure"=> "Ounces",
					"ReturnReason"=> "Spoilage",
					"ReturnReasonNote"=> ""
					]
				]
			]
		);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
