<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\E_Packages;

class C_Packages_Adjust_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'packages/v1/adjust';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body =  array(
			[
				"Label"=> "ABCDEF012345670000010041",
				"Quantity"=> -2.0,
				"UnitOfMeasure"=> "Ounces",
				"AdjustmentReason"=> "Drying",
				"AdjustmentDate"=> "2015-12-15",
				"ReasonNote"=> null
			],
			[
				"Label"=> "ABCDEF012345670000010042",
				"Quantity"=> 1.0,
				"UnitOfMeasure"=> "Ounces",
				"AdjustmentReason"=> "Scale Variance",
				"AdjustmentDate"=> "2015-12-15",
				"ReasonNote"=> "We are obtaining a new certified scale"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
