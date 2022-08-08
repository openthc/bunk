<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\I_Strains;

class D_Strains_Update_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'strains/v1/update';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id"=> 1,
				"Name"=> "Spring Hill Kush",
				"TestingStatus"=> "InHouse",
				"ThcLevel"=> 0.1865,
				"CbdLevel"=> 0.1075,
				"IndicaPercentage"=> 25.0,
				"SativaPercentage"=> 75.0
				],
				[
				"Id"=> 2,
				"Name"=> "TN Orange Dream",
				"TestingStatus"=> "ThirdParty",
				"ThcLevel"=> 0.075,
				"CbdLevel"=> 0.14,
				"IndicaPercentage"=> 25.0,
				"SativaPercentage"=> 75.0
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
